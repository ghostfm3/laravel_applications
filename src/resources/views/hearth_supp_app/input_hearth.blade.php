<!DOCTYPE html>
<head>
    <title>健康状態管理アプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<form action="http://localhost:8080/main" method="post">
    <center>
    <h3>健康状態登録フォーム</h3>
    <br />
        <table width="100%">
            <tr><td align="center" bgcolor="#00CC00">
                <font color="#ffffff"><b>health status input</b></font>
        </td></tr></table>
        <br />
    @csrf
    <table>
    <tr>
    <td>日付:</td> <td><input name="date" type="date" value="" /><br></td></tr>
    <tr><td>体温:</td> <td><input name='Bodytemp' type="number" step="0.1" value="" /><br></td> </tr>
    <tr><td>体温の計測時刻:</td><td><input name='Bodytemptime' type="time" value="" /><br></td> </tr>
    <tr><td>咳の有無:</td><td>
        <input type="radio" name="cough" value="有" checked>有
        <input type="radio" name="cough" value="無">無
    </select><br></td></tr>
    <tr><td>頭痛の有無:</td><td>
        <input type="radio" name="headache" value="有" checked>有
        <input type="radio" name="headache" value="無">無
    </select><br></td></tr>
    <tr><td>だるさの有無:</td><td>
        <input type="radio" name="dulness" value="有" checked>有
        <input type="radio" name="dulness" value="無">無
    </select><br></td></tr>
    <tr><td>息苦しさの有無:</td><td>
        <input type="radio" name="hearthlessness" value="有" checked>有
        <input type="radio" name="hearthlessness" value="無">無
    </select><br></td></tr>
    <tr><td>味覚症状の異常:</td><td>
        <input type="radio" name="abnormal_taste" value="有" checked>有
        <input type="radio" name="abnormal_taste" value="無">無
    </select><br></td></tr>
    <tr><td>風邪症状の有無:</td><td>
        <input type="radio" name="cold_sympotoms" value="有" checked>有
        <input type="radio" name="cold_sympotoms" value="無">無
    </select><br></td></tr>
    <tr><td>その他の自覚症状:</td><td><input name="subjective_symptoms" type="text" value=""><br></td></tr>
    </table>
    <br />
    <button type="submit" class="btn btn-success">送信</button>
    <br />
    <br />
    <a href="http://localhost:8080/mainindex" class="btn btn-link">戻る</a>
    </center>
 
</form>