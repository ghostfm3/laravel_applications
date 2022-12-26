<!DOCTYPE html>
<title>DB接続テスト</title>

<html>
    <body>
        <h1>DB接続確認</h1>
    <table border="1">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($tests as $test)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $test->created_at }}</td>
                <td>{{ $test->updated_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
</html>
