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
    <div class="mb-4" style="margin-left: 30px;margin-left: 30px;">
        <h1>商品編集画面</h1>

        <div class="text-end" style="margin-right: 30px;">
            <a href="/item" class="btn btn-primary mb-3">商品一覧に戻る</a>
        </div>

        <div class="card-body">
            <form method="POST" action="/item/update/{{$item->id}}" enctype="multipart/form-data" style="padding-right: 30px;">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">商品名</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$item->name) }}">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="type" class="form-label">種類:</label>
                    <select id="type" type="text" name="type" class="form-control">
                        <option value=""> 選択してください </option>
                        @foreach([1 => '果物', 2 => '野菜', 3 => '肉', 4 => '魚', 5 => '調味料', 6 => '飲料', 7 => 'その他',] as $value => $label)
                            <!-- <option value="{{ $value }}" {{ $item->type == $value ? 'selected' : '' }}>{{ $label }}</option> -->
                            <option value="{{ $value }}" {{ old('type', $item->type) == $value ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('type')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">価格:</label>
                    <input id="price" type="text" name="price" class="form-control" value="{{ old('price',$item->price) }}">
                    @error('price')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">在庫数:</label>
                    <input id="stock" type="text" name="stock" class="form-control" value="{{ old('stock',$item->stock) }}">
                    @error('stock')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="detail" class="form-label">商品詳細:</label>
                    <!-- <input id="detail" type="text" name="detail" class="form-control" value="{{ $item->detail }}"> -->
                    <!-- <textarea rows="3" style="resize:none" id="detail" type="text" name="detail" class="form-control" value="{{ old('detail',$item->detail) }}"></textarea> -->
                    <textarea rows="3" style="resize:none" id="detail" type="text" name="detail" class="form-control">{{ old('detail', $item->detail) }}</textarea>

                    @error('detail')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                <label for="img" class="form-label">商品画像:</label>
                <input id="img" type="file" name="img" class="form-control" value="{{ old('img',$item->img) }}">
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
                
                <button type="submit" class="btn btn-primary btn-block" >編集</button>
            </form>

            <form method="POST" action="/item/destroy/{{$item->id}}" class="d-inline">
                @csrf
                <!-- <button type="submit" class="btn btn-danger btn-block">削除</button> -->
                <button type="button" class="btn btn-danger btn-block" data-bs-toggle="modal" data-bs-target="#deleteModal" style="margin-top: 10px;">削除</button>
            </form>
        </div>
    </div>

    <!-- モーダル -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">削除の確認</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            本当にこの商品を削除しますか？
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">キャンセル</button>
            <!-- 削除ボタンを押した際のアクションをここで実行する -->
            <form method="POST" action="/item/destroy/{{$item->id}}">
            @csrf
            <!-- @method('DELETE') -->
            <button type="submit" class="btn btn-danger">削除</button>
            </form>
        </div>
        </div>
    </div>
    </div>

    <!-- Bootstrap5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>