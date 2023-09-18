<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>テスト用INDEX画面</title>
</head>
  
<body>
<h1>INDEX画面への遷移テスト用</h1>

<div>ログイン中のユーザーID:{{Auth::user()->id}}</div>
<div>ログイン中のユーザーNAME:{{Auth::user()->name}}</div>
<div>ログイン中のユーザーROLE:{{Auth::user()->role}}</div>
 <!-- HOME画面に戻るリンク -->
 <a href="/home" >HOME画面に戻る</a>
 <br><br>
<br><br>
 <!-- 会員登録画面に遷移するリンク -->
 <a href="/account/register" >アカウントの登録はこちら</a>
<br><br>
 <!-- ログイン画面に戻るリンク -->
 <a href="/" >ログイン画面に戻る</a>
 <br><br>
<!-- ログアウトボタン -->
<a href="/logout/{id}">ログアウト</a>
<br><br>
</body>
</html>