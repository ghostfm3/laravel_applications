<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post_test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    //
    public function index(){
        $post_test = post_test::all();
        return view("post",["post_test"=>$post_test]);
    }

    public function store(Request $request){
        $request->validate([
            'messages' => 'required|spam'
        ]);
        // $validator->errors()->add('message', 'スパムメッセージの疑いがあるため投稿を削除しました。');
        // array_search('spam', $outputs)
        $username = isset($_POST["username"]) ? $_POST["username"] : "";
        $messages = isset($_POST["messages"]) ? $_POST["messages"] : "";
        $nowTime = date('Y-m-d H:i:s');

        $p = new post_test();
        $p -> messages = $messages;
        $p -> username = Auth::user()->userid;
        $p -> created_at = $nowTime;
        $p -> updated_at = $nowTime;
        $p -> save();

        $storeSuccess = array('status' => 'success', 'created_at' => $nowTime );
        return redirect("/add");
        // return json_encode($storeSuccess);
    }
}
