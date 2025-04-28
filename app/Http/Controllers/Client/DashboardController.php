<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Affiche le tableau de bord du client.
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Récupérer les informations nécessaires pour le tableau de bord client
        return view('client.dashboard');
    }
}
