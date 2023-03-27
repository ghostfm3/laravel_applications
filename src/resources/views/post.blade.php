<html>
<head>
    <title>健康状態管理アプリ</title>
    <!-- <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/addDB.js"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="stylesheet" href="{{ asset('sytle.css') }}"> -->
</head>
    <body>
        <h2>掲示板</h2>
        <form method="POST">
            @csrf
            <!-- <label>User ID</lavel>
            <input type="text" id="id" name="username"/> -->
            <label>メッセージ</label>
            <input type="text" id="msg" name="messages"/>
            <button type="submit" id="submit_button" class="btn btn-primary btn-sm">投稿</button>            
            @foreach ($errors->all() as $error)
                <div class="alert alert-secondary">
                <p class="validation"> <svg xmlns="http://www.w3.org/2000/svg" width="1rem" height="1rem" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="警告:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg> {{$error}}</p>
                </div>
            @endforeach           
        </form>
        <hr>
        <dev id="add_tag">
        @foreach ($post_test as $post)
            <p><b>[投稿時間: {{$post["created_at"]}}] ユーザーID:{{$post["username"]}}</b><br>{{$post["messages"]}} </p>
        @endforeach
        </dev>
        </hr>
        
        <center>
        <a href="http://localhost:8080/mainindex" class="btn btn-link">戻る</a>
        <footer>
        <small>copyrights &copy; 2022 PHP, Laravel Studing Group All rights Reserved.</small>
        </footer>
        </center>
    </body>
</html>