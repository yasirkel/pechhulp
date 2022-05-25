<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Abbonement_type;
use App\Models\Abbonement;
use App\Models\Area;
use App\Models\Garage;
use App\Models\Melding;

class pechMeldingController extends Controller
{
    public function index() {
        $areas = Area::all();
        $garages = Garage::All();
        $meldingen = Melding::All();

        return view('pechmelding', [
            'areas' => $areas,
            'garages' => $garages,
            'meldingen' => $meldingen,
        ]);
    }

    public function createMelding(Request $request) {
        $garages = Garage::All();
        $newMelding = new Melding;

        $newMelding->user_id = $request->input('user-id');
        $newMelding->area_id = $request->input('area-id');
        foreach ($garages as $garage) {
            $newMelding->garage_id = $newMelding->area_id == $garage->area_id;
        }
        
        $newMelding->save();

        return redirect()->route('home');
    }
}
