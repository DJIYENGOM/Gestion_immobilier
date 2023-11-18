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
   
     public function ListeBien()
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
        //dd($request->all()); 
     
         $request->validate([
             'nom' => 'required',
             'categorie' => 'required',
             'adresse' => 'required',
             'status' => 'required',
             'date' => 'required',
         ]);
     
         
             // Créer une nouvelle instance de Bien
             $bien = new Bien();
             $bien->nom = $request->get('nom');
             $bien->categorie = $request->get('categorie');
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
     
    
    /**
     * Display the specified resource.
     */
    public function show(Bien $bien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bien $bien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( $request, Bien $bien)
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
