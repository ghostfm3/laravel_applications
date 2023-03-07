<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account_data;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Session;

class SignUpController extends Controller
{
    public function index()
    {
        //
        return view('hearth_supp_app.sign_up');
    }
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
            'id' => 'required',
            'password' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
        ]);
        $p = new account_data();
        $p -> userid = $request->id;
        $p -> password = Hash::make($request->password);
        $p -> firstname = $request->firstname;
        $p -> lastname = $request->lastname;
        $p -> admin = "f";
        $p -> save();
        
        return redirect('/signup');
    }
}
