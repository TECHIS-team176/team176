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

    <div class="text-end" style="margin-right: 30px;">
        <a href="/item/create" class="btn btn-primary mb-3">商品新規登録</a>
    </div>

    <div class="items mt-5" style="margin-left: 30px;margin-right: 30px;">
        <h2>商品情報</h2>
        <table class="table table-striped">
            <thead>
                <tr>
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
                @foreach ($items as $item)
                <tr>
                    <td scope="row">{{ $item->id }}</td>
                    <td scope="row">{{ $item->name }}</td>
                    <td scope="row"><img src="/item/edit/{{$item->img}}" alt="{{ $item->name }}" width="100"></td>
                    <td scope="row">{{ $item->type }}</td>
                    <td scope="row">{{ $item->price }}</td>
                    <td scope="row">{{ $item->stock }}</td>
                    <td scope="row"><a href="/item/edit/{{$item->id}}" class="btn btn-primary btn-sm mx-1">編集</a></td>
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