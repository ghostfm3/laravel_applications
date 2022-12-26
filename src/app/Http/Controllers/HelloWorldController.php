<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Winschool;
use App\Models\test;

class HelloWorldController extends Controller
{
    //move メソッド定義
    public function move() {
        return view('move');
    }

    public function check(){
        return view('test', ['tests' => test::all()]);
    }
    
}
