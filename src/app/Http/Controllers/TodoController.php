<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
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
        $todos = Todo::orderByRaw('deadline IS NULL ASC')->orderBy('deadline')->get();
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

        $data = Todo::create([
            'todo' => $request->newTodo,
            'deadline' => $request->newDeadline,
        ]);
        session()->flash('message', '新しいタスクが追加されました');

        $storeSuccess = array('status' => 'success', 'id' => $data->id);
        return json_encode($storeSuccess);
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
        $todo = Todo::find($id);
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
        $todo = Todo::find($id);
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
        $todo = Todo::find($id);
        $todo->delete();
        $arr = array('status' => 'success', 'message' => '削除が完了しました');
        return json_encode($arr);
    }

    public function loginfo($str)
    {
        Log::info($str.'メソッド');
    }
}
