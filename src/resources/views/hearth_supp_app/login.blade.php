<!DOCTYPE html>
<html lang="ja">
<head>
    <title>健康状態管理アプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('login.css') }}">
</head>
    <center>
    <h1>健康状態管理アプリ</h1>
        <br />
        <table width="100%">
            <tr><td align="center" bgcolor="#00CC00">
                <font color="#ffffff"><b>LOGIN</b></font>
        </td></tr></table>
        <br />
    <body>
        <form action="http://localhost:8080/main" method="POST">
            <!-- CSRF対策を行う -->
            @csrf
            <p>
            <dd>
            <label for="uid">ID:</label>  
            <input type="text" name="userid" id="uid" />
            @if ($errors->has('userid'))
            <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('userid') }}</font></div>
            @endif
            </dd>
            </p>
    
            <p>
            <dd>
            <label for="pwd">パスワード:</label>
            <input type="password" name="password" id="pwd" />
            @if ($errors->get('password')) 
            <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('password') }}</font></div>
            @endif 
            </dd>
            </p>

        
            <br />
            <p><button type="submit" id="submit_button" class="btn btn-success btn-sm">ログイン</button><p> 
            <br />
            <br />
            <p><a href="http://localhost:8080/signup" class="btn btn-link">サインアップはこちら</a><p>
        </form>
    </body>
    <center>
</html>