
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>商品一覧．検索</title>

</head>
<body>
@include('parts.navi')

    <div class="container">
    <h1>商品一覧．検索</h1>
    <div class="search">
    
        <form action="/search" method="get" >
       <input type="text" maxlength="20" size="20" name="search" vaule="">
       <input type="submit" value="検索">
       </form>
    </div>
    <table class="table" name="items">
        <tr>
            <th>商品番号</th>
            <th>商品名</th>
            <th>金額</th>
            <th>種別</th>
            <th>数量</th>
            <th>商品詳細</th>
        </tr>     
        @foreach($items as $item)  
        
        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td>
                @switch ($item->type)
                    @case (1) 果物 @break
                    @case (2) 野菜 @break
                    @case (3) 肉 @break
                    @case (4) 魚 @break
                    @case (5) 調味料 @break
                    @case (6) 飲料 @break
                    @case (7) その他 @break
                @endswitch
                    
            </td>
            <td>{{$item->stock}}</td>
            <td><a href="/search/detail/{{$item->id}}">商品詳細</a></td>
        </tr>        
        @endforeach
    </table>
    </div>
        <div class="pagination justify-content-center">
       {{$items->appends(request()->query())->links('pagination::bootstrap-4')}}
       </div>

</body>
</html>