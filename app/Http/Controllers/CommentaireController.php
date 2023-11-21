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
    

   

    /**
     * Display the specified resource.
     */
    public function show(Commentaire $commentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commentaire $commentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentaireRequest $request, Commentaire $commentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commentaire $commentaire)
    {
        //
    }
}
