<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Abbiamo cambiato la view restituita da 'home' a 'dashboard.info', sicuramente
        // c'è un modo migliore per farlo ma è l'unico modo che abbiamo trovato per poter lavorare effettivamente
        // sulla dashboard
        $loggedUser = Auth::user();
        return view('users.dashboard_home', compact('loggedUser'));
    }

    // Per mostrare le statistiche, soluzione molto probabilmente temporanea
    // Le statistiche potrebbero richiedere il proprio controller se diventano troppo complesse
    public function statistics(){
        $loggedUser = Auth::user();

        $yearsRegistered= Carbon::now()->diffInYears($loggedUser->created_at) + 1;
        $yearsArray=[];
        for($i=0; $i<$yearsRegistered; $i++){
            $currentYear= Carbon::now()->year;
            array_push($yearsArray, $currentYear-$i);
        }
        // dd($yearsArray);
        return view('users.statistics', compact('loggedUser'), compact('yearsArray'));
    }
}
