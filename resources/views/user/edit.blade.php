 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>ユーザー編集画面</title>
 </head>
 <body>
   <div class="container">
    <h1>ユーザー編集画面</h1>
    <a href="/user">戻る</a>
    <form action="/user/update" method="post">
      @csrf
    <table class="table">
      <tr>
         <th>ID</th>
         <td>{{$user->id}}</td>
      </tr>
      <tr>
         <th>名前</th>
         <td><input type="text" name="name" value="{{$user->name}}" required></td>
      </tr>
      <tr>
         <th>メール</th>
         <td><input type="text" name="email" value="{{$user->email}}" required></td>
      </tr>
      <tr>
         <th>権限</th>
         <td>
            <input type="radio" name="role" required value="1" @if($user->role==1) checked @endif>管理者
            <input type="radio" name="role" required value="0" @if($user->role==0) checked @endif>利用者


            
      </td>
      </tr>
      
    </table>
    <input type="hidden" name="id" value="{{$user->id}}">
    <input type="submit" value="送信" class="btn btn-primary">
    </form>
    <br>
    <a href="/user/delete/{{$user->id}}" class="btn btn-primary">削除</a>
</div>
 </body>
 </html>