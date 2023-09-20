<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></head>

    <body class="container-fluid " style="max-width: 330px">     
    <!-- ログイン入力フォーム -->
    <div id="login-form" class="form-signin w-100 m-auto" style="padding-top:50%;">
        <form action="/" method="post" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal text-center">食品商品管理システム<br>ログイン</h1>
            @csrf          
                <div class="form-floating mb-3">
                    <input type="email" id="email" name="email" class="form-control mt-5 mb-3"  value="{{ old('email') }}" required>
                    <label for="email" class="form-label">Emailアドレス</label>
                    @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>           
                
                <div class="form-floating mb-3">
                    <input type="password" id="password" name="password" class="form-control mb-3"  value="{{ old('password') }}" required>
                    <label for="password" >パスワード</label>
                    @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    
                </div>
                        <!-- ログインボタン -->
                            <div class="d-grid gap-2 ">
                            <button class="btn  btn-info btn-block  py-2" type="submit">ログイン</button>
                            </div>

                            <!-- エラーメッセージ表示 -->
                                @if ($errors->has('login'))
                                    <div class="alert alert-danger mt-3">
                                        {{ $errors->first('login') }}
                                    </div>
                                @endif
        </form>
                            <!-- 会員登録画面に遷移するリンク -->
                            <a href="/account/register" class="row justify-content-center mt-5 mb-3">アカウントの登録はこちら</a>

    </div>



</body>
</html>