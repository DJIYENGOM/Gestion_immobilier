<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Http\Request;
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

 
     public function create()
     {
       
         return view('biens.ajout');
     }
     public function Ajouter(Request $request)
     {

        
         $request->validate([
             'nom' => 'required',
             'categorie' => 'required',
             'image' => 'required|image|mimes:jpeg,png,jpg,gif',
             'adresse' => 'required',
             'status' => 'required',
             'date' => 'required',
         ]);
     
         
         // Stocker l'image sur le serveur
            $imagePath = $request->file('image')->store('image');

             $bien = new Bien();
             $bien->nom = $request->get('nom');
             $bien->categorie = $request->get('categorie');
             $bien->image = $imagePath; 
             $bien->description = $request->get('description'); 
             $bien->adresse = $request->get('adresse');
             $bien->status = $request->get('status');
             $bien->date_enregistrement = $request->get('date');

             $bien->user_id = auth()->user()->id;

             if ($bien->save()) 
             {
              //  dd($bien); 
                 return redirect('/biens/liste');

             } else {
                return 'bonjour';
             }
    }

    // private function storeImage($image):string{
    //     return $image-> Ajouter('images',storage) ;


    // }
     
    

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
            'categorie' => 'required',
            'adresse' => 'required',
            'status' => 'required',
            'date' => 'required',
        ]);
        $bien = bien::find($request->id);
        $bien->nom = $request->get('nom');
             $bien->categorie = $request->get('categorie');
             $bien->description = $request->get('description'); 
             $bien->adresse = $request->get('adresse');
             $bien->status = $request->get('status');
             $bien->date_enregistrement = $request->get('date');

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
