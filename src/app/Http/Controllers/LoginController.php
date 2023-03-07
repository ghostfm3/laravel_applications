<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\account_data;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Session;

class LoginController extends Controller
{

    public function __construct(){
        $this->middleware('web');
      }

    //
    public function index() {
        return view('hearth_supp_app.login');
    }



    public function logincheck(Request $request)
    {

        $credentials = $request->validate([
            'userid' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // return redirect()->intended('mainindex');
            return view('hearth_supp_app.main_manu');
        };

        return back()->withErrors([
            'userid' => 'IDまたはパスワードが間違っています',
        ])->onlyInput('userid');
    
    }

    public function after_index() {
        return view('hearth_supp_app.main_manu');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/hlogin');
    }
}
