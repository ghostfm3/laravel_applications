<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class NextController extends Controller
{
    //
    public function index(Request $request) {
        // 遷移元のページのテキストボックスで入力されたschoolの値がこちらに格納され、変数$schoolに代入するという処理
        $char = $request->input('char');
        // schoolの値をbladeファイルに渡す
        return view('next', compact('char'));
    }

}
