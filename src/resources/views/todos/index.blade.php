<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todoリスト</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- <script src="/js/jquery-3.6.1.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="/js/todo/deleteconfirm.js"></script>
    <script src="/js/todo/adddb.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="container mt-3">
        <h1>{{Auth::user()->firstname}}さんのTodoリスト</h1>
    </div>
    <div class="container mt-3">
        <div class="container mb-4">
             <input name="_token" type="hidden" value="ot52rZ2y2ijSa76VnmCvZrLVviSB5ageNOmGVY5Z">
            {{ csrf_field() }}
                <div class="row">
                    {{ Form::text('newTodo', null, ['class' => 'form-control col-8 mr-5', 'id' => 'text']) }}
                    {{ Form::date('newDeadline', null, ['class' => 'mr-5', 'id'=> 'date']) }}
                    <button id="submit_button" class="btn btn-primary" href="http://localhost:8080/todos" >新規追加</button>
                </div>
        </div>
        {{-- エラー表示 ここから --}}
        @if ($errors->has('newTodo'))
            <p class="alert alert-danger">{{ $errors->first('newTodo') }}</p>
        @endif
        @if ($errors->has('newDeadline'))
            <p class="alert alert-danger">{{ $errors->first('newDeadline') }}</p>
        @endif
        {{-- エラー表示 ここまで --}}

    

        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="width: 60%">Todo</th>
                    <th scope="col">期限</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <br>
            <tbody id="add_tag">
                @foreach ($todos as $todo)
                    <tr>
                        <th scope="row" class="todo">{{ $todo->todo }}</th>
                        <td>{{ $todo->deadline }}</td>
                        <td><a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-primary">編集</a></td>
                        <td><button name="delete_button" id="delete_button_{{ $todo->id }}"
                             class ="btn btn-danger">削除</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <center>
    <a href="http://localhost:8080/mainindex" class="btn btn-link">戻る</a>

    <footer>
        <small>copyrights &copy; 2022 PHP, Laravel Studing Group All rights Reserved.</small>
        </footer>
    </center>
</body>
</html>
