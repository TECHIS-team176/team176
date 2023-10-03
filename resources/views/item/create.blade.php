<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品新規登録画面</title>
    <!-- Bootstrap5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
    <div class="mb-4" style="margin-left: 30px;">
            <h1>商品新規登録</h1>

            <div class="text-end" style="margin-right: 30px;">
                <!-- <a href="{{url()->previous()}}" class="btn btn-primary mb-3" >商品一覧に戻る</a> 元いたページに戻る実装 -->
                <a href="/item" class="btn btn-primary mb-3">商品一覧に戻る</a> <!-- 1ページ目に戻る実装 -->
                <!-- <a onClick="history.back()" class="btn btn-primary mb-3" >商品一覧に戻る</a> １つ前に戻る実装-->

            </div>

            <form method="POST" action="/item/store" enctype="multipart/form-data" style="padding-right: 30px;">

            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">商品名:</label>
                <input id="name" type="text" name="name" class="form-control" value="{{ old('name') }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">種別:</label>
                <select id="type" type="text" name="type" class="form-control" >
                    <option value="99"> 選択してください </option>
                    <option value="1" @if(old('type') == '1') selected @endif>果物</option>
                    <option value="2" @if(old('type') == '2') selected @endif>野菜</option>
                    <option value="3" @if(old('type') == '3') selected @endif>肉</option>
                    <option value="4" @if(old('type') == '4') selected @endif>魚</option>
                    <option value="5" @if(old('type') == '5') selected @endif>調味料</option>
                    <option value="6" @if(old('type') == '6') selected @endif>飲料</option>
                    <option value="7" @if(old('type') == '7') selected @endif>その他</option>
                </select>
                @error('type')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">価格:</label>
                <input id="price" type="text" name="price" class="form-control" value="{{ old('price') }}">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">在庫数:</label>
                <input id="stock" type="text" name="stock" class="form-control" value="{{ old('stock') }}">
                @error('stock')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="detail" class="form-label">商品詳細:</label>
                <textarea rows="3" style="resize:none" id="detail" type="text" name="detail" class="form-control">{{ old('detail') }}</textarea>
                @error('detail')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
            <label for="img" class="form-label">商品画像:</label>
            <input id="img" type="file" name="img" class="form-control" value="{{ old('img') }}">
            @error('img')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">登録</button>
        </form>

    <!-- Bootstrap5 js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>