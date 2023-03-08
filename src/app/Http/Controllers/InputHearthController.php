<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\t_hearth_satus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        if(Auth::user()->admin == "True" ){
            $HearthState = t_hearth_satus::orderByRaw('date ASC')->get();
        }else{
            $HearthState = t_hearth_satus::where('userid',Auth::user()->userid)->orderByRaw('date ASC')->get();
        };
        return view('hearth_supp_app.viewhearth', ['hearthstate' => $HearthState]);
    }
}