<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

<body class="container-fluid " style="max-width: 330px">    
    <!-- アカウント登録入力フォーム -->
    <div id="register-form" class="row justify-content-center align-items-center" style="padding-top:50%;" >
        <form action="/account/register" method="post" class="form-signin ">
        <h1 class="h3 mb-3 font-weight-normal text-center">食品商品管理システム<br>アカウント登録</h1>
            @csrf      
                <dev class="form-floating">
                    <input type="text" id="name" name="name" class="form-control mt-5 mb-3" value="{{ old('name') }}" required >
                    <label for="name" class="form-label">お名前</label>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </dev>           
                <dev class="form-floating">
                    <input type="email" id="email" name="email" class="form-control mb-3" value="{{ old('email') }}"  required  >
                    <label for="email" class="form-label">Emailアドレス</label>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </dev>           
                <div class="form-floating">
                    <input type="password" id="password" name="password" class="form-control mb-3" value="{{ old('password') }}" required >
                    <label for="password" class="form-label">パスワード</label>
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>   
                <div class="form-floating">
                    <input type="password" id="password-confirm" class="form-control mb-3" name="password_confirmation"   autocomplete="new-password"　required>
                    <label for="password-confirm" class="form-label">パスワード再入力</label>
                </div>    
 
                    <!-- ログインボタン -->
                            <div class="d-grid gap-2 ">
                            <button class="btn  btn-info btn-block  py-2" type="submit">登録</button>
                            </div>
                        <!-- ログイン画面に戻るリンク -->
                        <a href="/" class="row justify-content-center mt-5 mb-3">ログイン画面に戻る</a>
        </form>
    </div>

    


</body>
</html>