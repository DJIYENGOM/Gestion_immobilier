<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Http\Requests\StoreCommentaireRequest;
use App\Http\Requests\UpdateCommentaireRequest;

class CommentaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        $commentaires  = Commentaire::all();

        return view('commentaires.index', compact('commentaires'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $biens = Bien::all(); 
        return view('commentaires.create', compact('biens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'bien_id' => 'required|exists:biens,id',
            'contenue' => 'required',
         ]);
    
        Commentaire::create([
        'user_id' => auth()->id(),
        'bien_id' => $request->bien_id,
        'contenue' => $request->contenue,
        ]);
        return redirect('/commentaires')->with('success', 'Commentaire créé avec succès.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Commentaire $commentaire)
    {
        return view('commentaires.show', compact('commentaire'));
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
        // $this->authorize('delete', $commentaire);
        $commentaire->delete();
        // return redirect('/commentaire');
        return redirect('/commentaires')->with('success', 'Commentaire supprimé avec succès.');

    }
}
