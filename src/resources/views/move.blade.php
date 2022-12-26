<!DOCTYPE html>
<html lang="ja">
    <body>
        <p>入力フォーム</P>
        <form action="http://localhost:8080/next" method="POST">
            <!-- CSRF対策を行う -->
            @csrf
            <input type="text" name="char" value="" />
            <input type="submit" name="submit" value="入力" />
        </form>
    </body>
</html>

