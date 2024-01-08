<?php

namespace App\Http\Controllers;

use App\Models\Bien;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function index()
    {
        $biens = Bien::all();
        return view('Accueil', compact('biens'));
    }
}