<!doctype html>
<html lang="ja">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"></head>

    <title></title>

        <!-- ナビゲーションバー -->
        <nav class="navbar navbar-expand-sm navbar-info bg-info  " >
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav4" aria-controls="navbarNav4" aria-expanded="false" aria-label="Toggle navigation" >
                <span class="navbar-toggler-icon" ></span>
            </button>
            <a class="navbar-brand ms-5 fw-bold mb-0" href="#"><p style="font-size:20px;  margin-bottom: 0;">食品商品管理システム</p></a>
                <div class="collapse navbar-collapse justify-content-start ">
                <ul class="navbar-nav">
                    <!-- 全員に表示される   -->
                    <li class="nav-item active">
                        <a class="nav-link ms-5 " href="/home">HOME</a>
                    </li> 
                    <li class="nav-item active">
                        <a class="nav-link ms-5" href="/search">商品一覧/検索</a>
                    </li>
                    <!-- 管理者権限のみに表示される -->
                    @can('管理者') 
                    <li class="nav-item">
                        <a class="nav-link ms-5" href="/item">商品管理</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ms-5" href="/user">ユーザー管理</a>
                    </li>
                    @endcan
                </ul>
                </div>

                <!-- ログインユーザー表示 -->
                <div class="nav-item">
                    <p class="p-2 bd-highlight  pt-4">ログインユーザー : {{Auth::user()->name}}</p>
                </div>

                <!-- ログアウトボタン表示 -->
                <div class="nav-item">
                <a href="/logout"  class="btn btn-secondary me-5">ログアウト</a>
                </div>
        </nav> 
    </head>  
</html>