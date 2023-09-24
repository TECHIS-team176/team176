<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>ユーザー一覧画面</title>
</head>
<body>
@include('parts.navi')
    <div class="container">
    <h1>ユーザー一覧画面</h1>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>名前</th>
            <th>メール</th>
            <th>権限</th>
            <th>編集</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>@if($user->role==0) 利用者 @else 管理者 @endif</td>
            <td><a href="/user/edit/{{$user->id}}" class="btn btn-primary btn-sm">編集</a></td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>