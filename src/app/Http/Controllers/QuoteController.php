<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    //
    public function index() {
        //DB:quotesからデータを全件取得しviewファイルにデータを渡す
        return view('index', ['quotes' => Quote::all()]);
    }

}
