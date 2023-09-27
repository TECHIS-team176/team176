<!-- 共通のlayoutができればそれを利用する -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品一覧画面</title>
    <!-- Bootstrap5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
@include('parts.navi')
    <h1 class="mb-4" style="margin-left: 30px;">商品情報一覧</h1>

    <!-- フラッシュメッセージの表示 -->
    @if(session('success'))
        <div class="alert alert-primary d-flex align-items-center alert-dismissible fade show" role="alert" style="max-width: 500px;margin: 0 auto;margin-top: 10px;">
        <svg class="bi flex-shrink-0 me-2" width="1rem" height="1rem" role="img" aria-label="成功:"><use xlink:href="#check-circle-fill"/>
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
        </svg>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="閉じる"></button>
            {{ session('success') }}
        </div>
    @endif

    <div class="text-end" style="margin-right: 30px;">
        <a href="/item/create" class="btn btn-primary mb-3">商品新規登録</a>
    </div>

    <div class="items mt-5" style="margin-left: 30px;margin-right: 30px;">
        <h2>商品情報</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th> <!-- 行番号のための列を追加 -->
                    <th scope="col">ID</th>
                    <th scope="col">商品名</th>
                    <th scope="col">商品画像</th>
                    <th scope="col">種類</th>
                    <th scope="col">価格</th>
                    <th scope="col">在庫数</th>
                    <th scope="col">　　　</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($items as $index => $item) <!-- $indexを使用して行番号を生成 -->
                <tr>
                    <td class="align-middle">{{ ($items->currentPage() - 1) * $items->perPage() + $loop->iteration }}</td> <!-- 行番号を表示 -->
                    <td class="align-middle">{{ $item->id }}</td>
                    <td class="align-middle">{{ $item->name }}</td>
                    <td class="align-middle">
                        @if ($item->img)
                            <img src="data:image/*;base64,{{ $item->img }}" alt="{{ $item->name }}" class="img-thumbnail" width="80" height="80">
                        @else
                            画像なし
                        @endif
                    </td>
                        <!-- <img src="/item/edit/{{$item->img}}" alt="{{ $item->name }}" width="100"></td> -->
                    <td class="align-middle">
                        {{ $types[$item->type] }}
                    </td>
                    <td class="align-middle">{{ $item->price }}</td>
                    <td class="align-middle">{{ $item->stock }}</td>
                    <td class="align-middle"><a href="/item/edit/{{$item->id}}" class="btn btn-primary btn-sm mx-1">編集</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $items->links('pagination::bootstrap-4') }}

    <!-- Bootstrap5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>