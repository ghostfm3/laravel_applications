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
    
        // なんかの残骸
        // $userId = account_data::select('userid')->where('userid',$request->userid)->get();
        // $firstName = account_data::select('firstname')->where('userid',$request->userid)->get();
        // $id = $userId->toArray();
        // $fname = $firstName->toArray();
        // Log::info($id[0]['userid']);

        // session_start();
        // Session::put('loginid', $userid);
        // Session::put('firstname', $firstName[0]['firstname']);
        // return view('hearth_supp_app.main_manu',['id' => $userId[0]['userid'], 'firstname' => $firstName[0]['firstname']]);
        // return view('hearth_supp_app.main_manu');
        // };

        

        //login validatior残骸
                // $validator = Validator::make($request->all(), [
        //     'userid'  => 'required|nullable',
        //     'password'  => 'required|nullable',
        // ]);

        // $userid = $request->userid;
        // $password = $request->password; 
        // $validator->validate();
        
        // Log::info($userid);
        // Log::info($password);
        // Log::info(Hash::make($password));
        // $takeid = account_data::select('userid')->where('userid', $userid)->get()->toArray();
        // $takepass = account_data::select('password')->where('userid', $userid)->get()->toArray();
        // Log::info($takepass[0]['password']);
        // Log::info(Hash::check($password, $takepass[0]['password']));
        // if (empty($takeid) or Hash::check($password, $takepass[0]['password'])){
        //     $validator->errors()->add('userid', 'IDの認証に失敗しました');
        //     $validator->errors()->add('password', 'パスワードの認証に失敗しました');
        //     return back()->withInput()->withErrors($validator);
        // };
        // Log::info($takeid);
        // Log::info($takepass);
        

    
    
}
