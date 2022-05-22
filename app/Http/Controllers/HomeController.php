<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Abbonement_type;
use App\Models\Abbonement;



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
        $abbonementen = Abbonement::All();
        $abbonementTypes = Abbonement_type::All();

        return view('home', [
            'abbonementen' => $abbonementen,
            'abbonementTypes' => $abbonementTypes,
        ]);
    }

    public function createAbbonment(Request $request) {
        $newAbbo = new Abbonement;

        $newAbbo->user_id = Auth::user()->id;
        $newAbbo->type_id = $request->input('abbonement-keuze');
        $newAbbo->save();

        return redirect()->route('home');
    }
}