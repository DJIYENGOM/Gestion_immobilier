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
        $users = User::all();
        $biens = Bien::all();
        $comments = new Commentaire();
        return view('commentaires.create',compact('users', 'biens','comments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'message'=> 'required|'
        ]);
        Commentaire::create($data);
        return back();
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
        $this->authorize('delete', $commentaire);
        $commentaire->delete();
        // return redirect('/commentaire');
        return redirect('/commentaires')->with('success', 'Commentaire supprimé avec succès.');

    }
}
