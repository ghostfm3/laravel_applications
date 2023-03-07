<!DOCTYPE html>
<html lang="ja">
<head>
    <title>健康状態管理アプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <meta charset="UTF-8">
    <link href="/css/star/layout.css" rel="stylesheet">
    <link href="/css/star/index.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('aaaa.css') }}">
</head>
<!-- @yield('header')  -->
 <header>
    <h5 class="title">健康管理管理アプリ</h5>
    <nav class="nav">
      <ul class="menu-group">
        @csrf
        <li class="menu-item"><a>{{Auth::user()->firstname}}さんようこそ</a></li>
        @if(Auth::check())
        <li class="menu-item"><a href="http://localhost:8080/logout" class="btn btn-danger btn-sm">ログアウト</a></li>
        @endif
      </ul>
    </nav>
  </header>
  
    <body>
        <h2>メインメニュー</h2>
        @csrf
        <table>
        <tr>
        <td>
        <a href="http://localhost:8080/hearth" class="btn btn-link"><h3>1. 健康状態登録</h3></a>
        </td>
        </tr>
        <tr>
        <td>
        <a href="http://localhost:8080/viewhearth" class="btn btn-link"><h3>2. 健康状態参照</h3></a>
        </td>
        </tr>
        </table>    
    </body>
</html>
