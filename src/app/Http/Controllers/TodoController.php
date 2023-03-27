<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\n_post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = n_post::where('userid',Auth::user()->userid)->orderByRaw('deadline IS NULL ASC')->orderBy('deadline')->get();
        return view('todos.index', [
            'todos' => $todos,
        ]);

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
            'newTodo' => 'required|max:100',
            'newDeadline' => 'nullable|after:now',
        ]);
        Log::info(Auth::user()->userid);
        $data = n_post::create([
            'todo' => $request->newTodo,
            'userid' => Auth::user()->userid,
            'deadline' => $request->newDeadline,          
        ]);
        // $t = new Todo();
        // $t -> userid = Auth::user()->userid;
        // $p -> save();

        session()->flash('message', '新しいタスクが追加されました');

        $storeSuccess = array('status' => 'success', 'id' => $data->id);
        return json_encode($storeSuccess);
        // return redirect("/todos");
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
        $todo = n_post::find($id);
        return view('todos.edit', [
            'todo' => $todo,
        ]);
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
        $request->validate([
            'updateTodo' => 'required|max:100',
            'updateDeadline' => 'nullable|after:row',
        ]);
        $todo = n_post::find($id);
        $todo->todo = $request->updateTodo;
        $todo->deadline = $request->updateDeadline;

        $todo->save();
        session()->flash('message','タスクが変更されました');
        return redirect()->route('todos.index');
        
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
        $todo = n_post::find($id);
        $todo->delete();
        $arr = array('status' => 'success', 'message' => '削除が完了しました');
        return json_encode($arr);
        // return redirect("/todos");
    }

    public function loginfo($str)
    {
        Log::info($str.'メソッド');
    }
}
