<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use App\Models\User;
use App\Models\Commentaire;
use Illuminate\Http\Request;
use App\Notifications\EnvoiEmail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class BienController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $biens = Bien::all();
        return view('biens.liste', compact('biens'));
    }
    public function listeBien()
    {
        $biens = Bien::all();
        return view('biens.listeUser', compact('biens'));
    }
   


    public function create()
    {

        return view('biens.ajout');
    }
    public function Ajouter(Request $request)
    {

// dd($request);
        $request->validate([
            'nom' => 'required',
            'categorie' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,avif',
            'adresse' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $bien = new Bien();
        $bien->nom = $request->get('nom');
        $bien->categorie = $request->get('categorie');
        $bien->image = $this->storeImage($request->file('image'));
        $bien->description = $request->get('description');
        $bien->adresse = $request->get('adresse');
        $bien->status = $request->get('status');

        $bien->user_id = auth()->user()->id;

        if ($bien->save()) {
            $users=User::where('role', 'user')->get();
            foreach($users as $user){
                $user->notify(new EnvoiEmail());
            }
           
            return redirect('/biens/liste');
        } else {
            return 'bonjour';
        }

        if($bien){
           
        }
    }

    private function storeImage($image): string
    {
        return $image->store('images', 'public');
    }



    public function UpdateBien($id)
    {
        $bien = Bien::find($id);
        return view('biens.modifier', compact('bien'));
    }

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

    public function DeleteBien($id)
    {
        $biens = Bien::find($id);
        if ($biens->delete()) {
            return redirect('/biens/liste');
        }
    }



    public function show($id)
    {
        $bien = Bien::find($id);

        $commentaires = Commentaire::with('user')->where('bien_id', $id)->get();

        return view('commentaires.liste', compact('bien', 'commentaires'));
    }
    public function supprimerCommentaire($commentaireId)
    {
        $commentaire = Commentaire::find($commentaireId);
        $commentaire->delete();

        return redirect()->back()->with('success', 'Le commentaire a été supprimé avec succès.');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bien $bien)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bien $bien)
    {
        //
    }
}
