<!DOCTYPE html>
<link href="/css/star/layout.css" rel="stylesheet">
<link href="/css/star/index.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('aaaa.css') }}">
<head>
    <title>健康状態管理アプリ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<form action="http://localhost:8080/hearth" method="POST">
    <center>
    <h3>健康状態登録フォーム</h3>
    <br />
        <table width="100%">
            <tr><td align="center" bgcolor="#00CC00">
                <font color="#ffffff"><b>health status input</b></font>
        </td></tr></table>
        <br />
    @csrf
    <p>
    <dd>
    <label for="uid">日付:</label>  
    <input name="date" type="date" value="" />
    @if ($errors->has('date'))
    <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('date') }}</font></div>
    @endif
    </dd>
    </p>

    <p>
    <dd>
    <label for="uid">体温:</label>  
    <input name='Bodytemp' type="number" step="0.1" value="" />
    @if ($errors->has('Bodytemp'))
    <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('Bodytemp') }}</font></div>
    @endif
    </dd>
    </p>
    
    <p>
    <dd>
    <label for="uid">体温の計測時刻:</label>  
    <input name='Bodytemptime' type="time" value="" />
    @if ($errors->has('Bodytemptime'))
    <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('Bodytemptime') }}</font></div>
    @endif
    </dd>
    </p>

    <p>
    <dd>
    <label for="uid">咳の有無:</label>  
    <input type="radio" name="cough" value="有" checked>有
    <input type="radio" name="cough" value="無">無
    @if ($errors->has('cough'))
    <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('cough') }}</font></div>
    @endif
    </dd>
    </p>

    <p>
    <dd>
    <label for="uid">頭痛の有無:</label>  
    <input type="radio" name="headache" value="有" checked>有
    <input type="radio" name="headache" value="無">無
    @if ($errors->has('headache'))
    <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('headache') }}</font></div>
    @endif
    </dd>
    </p>

    <p>
    <dd>
    <label for="uid">だるさの有無:</label>  
    <input type="radio" name="dulness" value="有" checked>有
    <input type="radio" name="dulness" value="無">無
    @if ($errors->has('dulness'))
    <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('dulness') }}</font></div>
    @endif
    </dd>
    </p>

    <p>
    <dd>
    <label for="uid">息苦しさの有無:</label>  
    <input type="radio" name="hearthlessness" value="有" checked>有
    <input type="radio" name="hearthlessness" value="無">無
    @if ($errors->has('hearthlessness'))
    <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('hearthlessness') }}</font></div>
    @endif
    </dd>
    </p>

    <p>
    <dd>
    <label for="uid">味覚症状の異常:</label>  
    <input type="radio" name="abnormal_taste" value="有" checked>有
    <input type="radio" name="abnormal_taste" value="無">無
    @if ($errors->has('abnormal_taste'))
    <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('"abnormal_taste') }}</font></div>
    @endif
    </dd>
    </p>

    <p>
    <dd>
    <label for="uid">風邪症状の有無:</label>  
    <input type="radio" name="cold_sympotoms" value="有" checked>有
    <input type="radio" name="cold_sympotoms" value="無">無
    @if ($errors->has('cold_sympotoms'))
    <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('cold_sympotoms') }}</font></div>
    @endif
    </dd>
    </p>

    <p>
    <dd>
    <label for="uid">その他自覚症状:</label>  
    <input name="subjective_symptoms" type="text" value="">
    @if ($errors->has('subjective_symptoms'))
    <div class="p-contact__error" style="font-size:xx-small;"><font color="#FF0000">{{ $errors->first('subjective_symptoms') }}</font></div>
    @endif
    </dd>
    </p>


    <br />
    <p><button type="submit" id="submit_button" class="btn btn-success">送信</button></p>
    <br />
    <br />
    <a href="http://localhost:8080/mainindex" class="btn btn-link">戻る</a>
    </center>
 
</form>