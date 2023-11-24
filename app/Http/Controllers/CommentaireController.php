<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCommentaireRequest;
use App\Http\Requests\UpdateCommentaireRequest;
use Illuminate\Support\Facades\Redirect;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
   
    public function creer($bienId)
    {
        $bien = Bien::find($bienId);
        return view("commentaires.ajout", compact("bien"));
    }
    public function create($bienId)
    {
        $bien = Bien::find($bienId);
        return view("commentaires.ajoutCommentaire", compact("bien"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contenue' => 'required|string',
            'bien_id' => 'required|numeric',
            'user_id' => 'required|numeric',

        ]);
    
        $currentDate = now();
        $commentaires = new Commentaire([
            'contenue'=> $request->input('contenue'),
            // 'user_id' => $request->input('user_id'),
            'user_id' => Auth::id(),
        ]);
        
        $bien = Bien::findOrFail($request->input('bien_id'));
        $bien->commentaires()->save($commentaires);

        return back()->with('success', 'Commentaire ajouté avec succès');
    
    }
    

    public function edit($id)
    {
        $commentaire = Commentaire::findOrFail($id);

        if (auth()->id() !== $commentaire->user_id) {
            abort(403, 'Unauthorized action.');
        }
        return view('commentaires.modifie', compact('commentaire'));
    }

    public function update(Request $request, $id)
    {
        $commentaire = Commentaire::findOrFail($id);
        if (auth()->id() !== $commentaire->user_id) {
            abort(403, "Vous n'etes pas autorisé à faire cette action.");
        }
        // Validate the request
        $request->validate([
            'contenue' => 'required',
        ]);
        // Update the comment
        $commentaire->update([
            'contenue' => $request->input('contenue'),
        ]);
        $bienId=$commentaire->bien_id;
        //dd($bienId);

        return Redirect::route('modifieCommentaire', ['bienId'=>$bienId])->with('success','');
    }


    
    public function destroy($id)
    {
        $commentaire = Commentaire::findOrFail($id);
        // Check if the logged-in user is the owner of the comment
        if (auth()->id() !== $commentaire->user_id) {
            abort(403, "Vous n'etes pas autorisé à faire cette action.");
        }
        // Delete the comment
        $commentaire->delete();
        return redirect()->back()->with('success', 'Comment deleted successfully.');
    }
}
