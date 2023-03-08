<!DOCTYPE html>
<html lang="ja">
<head>
    <title>健康状態管理アプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

        @if(Auth::user()->admin == "True")
        <h2>全てのユーザーの健康状態</h2>
        @else
        <h2>{{Auth::user()->firstname}}さんの健康状態</h2>
        @endif
        <table class="table table-success table-striped" width="50" height="50">
        <thead>
        <tr>
            <!-- <th scope="col">ID</th> -->
            <th scope="col">日付</th>
            <th scope="col">体温</th>
            <th scope="col">計測時刻</th>        
            <th scope="col">咳</th>
            <th scope="col">頭痛</th>
            <th scope="col">だるさ</th>
            <th scope="col">息苦しさ</th>
            <th scope="col">味覚異常</th>
            <th scope="col">風症状</th>
            <th scope="col">その他自覚</th> 
            @if(Auth::user()->admin == "True")
            <th scope="col">ユーザーID</th>
            @endif          
        </tr>
        </thead>
        <tbody>
        @foreach ($hearthstate as $state)
            <tr>
                <!-- <td>{{ $state->id }}</td> -->
                <td>{{ $state->date }}</td>
                <td>{{ $state->bodytemp }}</td>
                <td>{{ $state->bodytemptime }}</td>
                <td>{{ $state->cough }}</td>
                <td>{{ $state->headache }}</td>
                <td>{{ $state->dulness }}</td>
                <td>{{ $state->hearthlessness }}</td>
                <td>{{ $state->abnormal_taste }}</td>
                <td>{{ $state->cold_sympotoms }}</td>
                <td>{{ $state->subjective_symptoms }}</td>
                @if(Auth::user()->admin == "True")
                <td>{{ $state->userid }}</td>
                @endif   
            </tr>
        @endforeach
        </tbody>
    </table>
    <center>
    <a href="http://localhost:8080/mainindex" class="btn btn-link">戻る</a>
    </center>

    <center>
        <footer>
        <small>copyrights &copy; 2022 PHP, Laravel Studing Group All rights Reserved.</small>
        </footer>
    </center>
</body>