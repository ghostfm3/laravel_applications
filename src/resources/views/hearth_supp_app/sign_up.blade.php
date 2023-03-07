<!DOCTYPE html>
<html lang="ja">
<head>
    <title>健康状態管理アプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
    <center>
    <h1>アカウント登録</h1>
        <br />
        <table width="100%">
            <tr><td align="center" bgcolor="#FFCC00">
                <font color="#ffffff"><b>SIGN UP</b></font>
        </td></tr></table>
        <br />
    <body>
        <form action="http://localhost:8080/signup" method="POST">
            <!-- CSRF対策を行う -->
            @csrf
            <p>
            <dd>
            <label for="uid"><span class="badge badge-danger ml-2">{{ __('必須') }}</span> ID:</label>  
            <input type="text" name="id" id="uid" />
            @if ($errors->has('id'))
            <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('id') }}</font></div>
            @endif
            </dd>
            </p>

            <p>
            <dd>
            <label for="pwd"><span class="badge badge-danger ml-2">{{ __('必須') }}</span>パスワード:</label>
            <input type="password" name="password" id="pwd" />
            @if ($errors->get('password')) 
            <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('password') }}</font></div>
            @endif 
            </dd>
            </p>

            <p>
            <dd>
            <label for="pwd"><span class="badge badge-danger ml-2">{{ __('必須') }}</span>性：</label>
            <input type="firstname" name="firstname" id="fname" />
            @if ($errors->get('firstname')) 
            <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('firstname') }}</font></div>
            @endif 
            </dd>
            </p>

            <p>
            <dd>
            <label for="pwd"><span class="badge badge-danger ml-2">{{ __('必須') }}</span>名：</label>
            <input type="lastname" name="lastname" id="lname" />
            @if ($errors->get('lastname')) 
            <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('lastname') }}</font></div>
            @endif 
            </dd>
            </p>

            <button type="submit" id="submit_button" class="btn btn-warning btn-sm">登録</button> 
            <br />
            <br />
            <a href="http://localhost:8080/hlogin" class="btn btn-link">戻る</a>
        </form>
    </body>
    <center>
</html>