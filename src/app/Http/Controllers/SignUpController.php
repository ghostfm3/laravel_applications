<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignUpController extends Controller
{
    
    //
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id' => 'required|max:100',
            'password' => 'nullable|after:now',
            'password2' => 'nullable|after:now',
            'headache' => 'nullable|after:now',
            'firstname' => 'nullable|after:now',
            'lastname' => 'nullable|after:now',
        ]);

        Todo::create([
            'date' => $request->date,
            'Bodytemp' => $request->Bodytemp,
            'Bodytemptime' => $request->Bodytemptime,
            
        ]);

        return view('hearth_supp_app.main_manu');
    }
}
