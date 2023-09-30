<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>商品詳細</title>
</head>
<body>
    @include('parts.navi')
    <div class="container">
    <h1>商品詳細</h1>
    <div class="text-end" style="margin-right: 30px;">
                <a href="{{url()->previous()}}" class="btn btn-primary mb-3">商品一覧に戻る</a>
            </div>
    <table class="table">
        <tr>
            <th>商品番号</th>
            <td>{{$item->id}}</td>
        </tr>
        <tr>
            <th>商品名</th>
            <td>{{$item->name}}</td>
        </tr>
        <tr>
            <th>価格</th>
            <td>{{number_format($item->price)}}</td>
        </tr>
        <tr>
            <th>種別</th>
            <td>@switch ($item->type)
                    @case (1) 果物 @break
                    @case (2) 野菜 @break
                    @case (3) 肉 @break
                    @case (4) 魚 @break
                    @case (5) 調味料 @break
                    @case (6) 飲料 @break
                    @case (7) その他 @break
                @endswitch</td>
        </tr>
        <tr>
            <th>在庫数</th>
            <td>{{number_format($item->stock)}}</td>
        </tr>
        <tr>
            <th>商品詳細</th>
            <td>{!!nl2br(e($item->detail))!!}</td>
        </tr>
        <tr>
            <th>登録日時</th>
            <td>{{$item->created_at}}</td>
        </tr>
        <tr>
            <th>更新日時</th>
            <td>{{$item->updated_at}}</td>
        </tr>
        <tr>
            <th>商品画像</th>
            <td>@if ($item->img)
                            <img src="data:image/*;base64,{{ $item->img }}" alt="{{ $item->name }}" class="img-thumbnail" width="80" height="80">
                        @else
                            画像なし
                        @endif</td>
        </tr>
    </table>
</div>

</body>
</html>