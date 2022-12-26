<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\t_hearth_satus;
use Illuminate\Support\Facades\Auth;

class InputHearthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hearth_supp_app.input_hearth');

    }

    public function viewindex() {
        $HearthState = t_hearth_satus::where('userid',Auth::user()->userid)->get();
        return view('hearth_supp_app.viewhearth', ['hearthstate' => $HearthState]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
            'date' => 'required|max:100',
            'Bodytemp' => 'nullable|after:now',
            'Bodytemptime' => 'nullable|after:now',
            'headache' => 'nullable|after:now',
            'dulness' => 'nullable|after:now',
            'hearthlessness' => 'nullable|after:now',
            'abnormal_taste' => 'nullable|after:now',
            'cold_sympotoms' => 'nullable|after:now',
            'subjective_symptoms' => 'nullable|after:now',
            
        ]);

        Todo::create([
            'date' => $request->date,
            'Bodytemp' => $request->Bodytemp,
            'Bodytemptime' => $request->Bodytemptime,
            
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
