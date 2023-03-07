<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\t_hearth_satus;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class HearthRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('hearth_supp_app.input_hearth');
    }

    public function store(Request $request) {
        
        $request->validate([
            'date' => 'required',
            'Bodytemp' => 'required',
            'Bodytemptime' => 'required',
            'subjective_symptoms' => 'required',
            
        ]);

        $p = new t_hearth_satus();
        $p -> date = $request->date;
        $p -> bodytemp = $request->Bodytemp;
        $p -> bodytemptime = $request->Bodytemptime;
        $p -> cough = $request->cough;
        $p -> headache = $request->headache;
        $p -> dulness = $request->dulness;
        $p -> hearthlessness = $request->hearthlessness;
        $p -> abnormal_taste = $request->abnormal_taste;
        $p -> cold_sympotoms = $request->cold_sympotoms;
        $p -> subjective_symptoms = $request->subjective_symptoms;
        $p -> userid = Auth::user()->userid;
        $p -> save();

        return redirect("/mainindex");
    }
}