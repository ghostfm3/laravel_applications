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
        <form action="http://localhost:8080/main" method="POST">
            <!-- CSRF対策を行う -->
            @csrf
            <table><tr>
            <td><span class="badge badge-danger ml-2">{{ __('必須') }}</span> ID：</td>
            <td>
            <input type="text" name="char" value="" />
            </td>
            </tr>
            <tr>
            <td><span class="badge badge-danger ml-2">{{ __('必須') }}</span> パスワード：</td>
            <td>
            <input type="password" name="char" value="" />
            </td>
            </tr>
            <tr>
            <td><span class="badge badge-danger ml-2">{{ __('必須') }}</span> パスワード再入力：</td>
            <td>
            <input type="password" name="char" value="" />
            </td>
            </tr>
            <tr>
            <td><span class="badge badge-danger ml-2">{{ __('必須') }}</span> 性：</td>
            <td>
            <input type="text" name="char" value="" />
            </td>
            </tr>
            <tr>
            <td><span class="badge badge-danger ml-2">{{ __('必須') }}</span> 名：</td>
            <td>
            <input type="text" name="char" value="" />
            </td>
            </tr>
            </table>
            <br />
            <button type="submit" id="submit_button" class="btn btn-warning btn-sm">登録</button> 
            <br />
            <br />
            <a href="http://localhost:8080/hlogin" class="btn btn-link">戻る</a>
        </form>
    </body>
    <center>
</html>