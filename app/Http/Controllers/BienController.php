<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\User;
use App\Models\Commentaire;
use App\Notifications\EnvoiEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){ // list 
        
        $biens  = Bien::all();

        return view('biens.index', compact('biens'));
    }

    // public function index()
    // {
    //     $biens = Bien::all();
    //     return view('biens.liste', compact('biens'));
    // }
    public function listeBien()
    {
        
        if (Gate::allows('viewAny', Bien::class)) {
            $biens = Bien::all();
            return view('biens.listeUser', compact('biens'));
        } //else {
        //     abort(403, 'Unautho0rized action.');
        // }
        // $biens = Bien::all();
        // return view('biens.listeUser', compact('biens'));
    }
   
    public function create()
    {
        $bien = new Bien();
        return view('biens.create', compact('bien'));
    }
    // public function create()
    // {

    //     return view('biens.ajout');
    // }
    public function store(Request $request)
    {
       
        // Validation des données du formulaire
        $data = $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'nombre_chambre' => 'required|integer',
            'surface' => 'required|numeric',
            'status' => 'required|in:0,1',
            'categorie' => 'required|in:0,1,2',
            'toillette' => 'required|in:0,1,2',
            'balcons' => 'required|in:0,1',
            'espace_vert' => 'required|in:0,1',
            'image_biens' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'user_id',
        ]);
        $data['user_id'] = auth()->user()->id;        
        // Gérer l'upload de l'image
        if ($request->hasFile('image_biens')) {
            $imagePath = $this->storeImage($request->file('image_biens'));
            $data['image_biens'] = $imagePath;
        }
    
        Bien::create($data);
    
            return redirect('/biens');
    }
    
    private function storeImage($image)
    {
        // Gérer le stockage de l'image
        return $image->store('images', 'public');
    }
    public function show($id)
    {
        $bien = Bien::find($id);
    
        // Vérifiez si le bien a été trouvé
        if (!$bien) {
            abort(404); // Affiche une page 404 si le bien n'est pas trouvé
        }
    
        return view('biens.show', compact('bien'));
    }
     /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bien $bien)
    {
        // $commentaires = Commentaire::all();
        return view('biens.edit', compact('bien'));
    }

    public function update(Request $request, Bien $client)
    {
        $data = $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'nombre_chambre' => 'required|integer',
            'surface' => 'required|numeric',
            'status' => 'required|in:0,1',
            'categorie' => 'required|in:0,1,2',
            'toillette' => 'required|in:0,1,2',
            'balcons' => 'required|in:0,1',
            'espace_vert' => 'required|in:0,1',
            'image_biens' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'user_id',
        ]);

        $bien->update($data);

        return redirect('biens/' . $bien->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bien $bien)
    {
        $bien->delete();

        return redirect('/biens');
    }

    // public function show($id)
    // {
    //     dd('ok');
    //     $bien = Bien::find($id);

    //     $commentaires = Commentaire::with('user')->where('bien_id', $id)->get();

    //     return view('commentaires.liste', compact('bien', 'commentaires'));
    // }


    // public function UpdateBien($id)
    // {
    //     $bien = Bien::find($id);
    //     return view('biens.modifier', compact('bien'));
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function UpdatebienTraitement(Request $request)
    {
        $bienreq = $request->validate([
            'nom' => 'required',
            'image' => 'required',
            'categorie' => 'required',
            'adresse' => 'required',
            'status' => 'required',
        ]);
        $bien = bien::find($request->id);
        $bien->nom = $request->get('nom');
        $bien->image = $request->get('image');
        $bien->categorie = $request->get('categorie');
        $bien->description = $request->get('description');
        $bien->adresse = $request->get('adresse');
        $bien->status = $request->get('status');

        $bien->Update();
        return redirect('/biens/liste');
    }

    // public function DeleteBien($id)
    // {
    //     $biens = Bien::find($id);
    //     if ($biens->delete()) {
    //         return redirect('/biens/liste');
    //     }
    // }



    public function supprimerCommentaire($commentaireId)
    {
        $commentaire = Commentaire::find($commentaireId);
        $commentaire->delete();

        return redirect()->back()->with('success', 'Le commentaire a été supprimé avec succès.');
    }

}
