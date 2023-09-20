<!-- 共通のlayoutができればそれを利用する -->

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品編集画面</title>
    <!-- Bootstrap5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="mb-4" style="margin-left: 30px;">
        <h1>商品編集画面</h1>

        <div class="text-end" style="margin-right: 30px;">
            <a href="/item" class="btn btn-primary mb-3">商品一覧に戻る</a>
        </div>

        <div class="card-body">
            <form method="POST" action="/item/update/{{$item->id}}" enctype="multipart/from-data">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">商品名</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">種類:</label>
                    <select id="type" type="text" name="type" class="form-control">
                        <option value=""> 選択してください </option>
                        @foreach([1 => '果物', 2 => '野菜', 3 => '肉', 4 => '魚', 5 => '調味料', 6 => '飲料', 7 => 'その他',] as $value => $label)
                            <option value="{{ $value }}" {{ $item->type == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('type')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">価格:</label>
                    <input id="price" type="text" name="price" class="form-control" value="{{ $item->price }}">
                    @error('price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">在庫数:</label>
                    <input id="stock" type="text" name="stock" class="form-control" value="{{ $item->stock }}">
                    @error('stock')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="detail" class="form-label">商品詳細:</label>
                    <input id="detail" type="text" name="detail" class="form-control" value="{{ $item->detail }}">
                    @error('detail')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                <label for="img" class="form-label">商品画像:</label>
                <input id="img" type="file" name="img" class="form-control">
                    @error('img')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="comment" class="form-label">コメント</label>
                    <input id="comment" type="text" name="comment" class="form-control">
                    @error('comment')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">編集</button>
            </form>

            <form method="POST" action="/item/destroy/{{$item->id}}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-block">削除</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>