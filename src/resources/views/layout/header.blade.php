@section('header')
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
@endsection