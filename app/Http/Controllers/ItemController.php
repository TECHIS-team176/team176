<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item; // Itemモデルをインポート
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    // 商品一覧表示
    public function index()
    {
        $types = [
            1 => '果物',
            2 => '野菜',
            3 => '肉',
            4 => '魚',
            5 => '調味料',
            6 => '飲料',
            7 => 'その他',
        ];
        $items = Item::paginate(10); // ページネーション(10件)

        return view('item.index', compact('items', 'types'));
    }

    // 商品登録フォーム表示
    public function create()
    {
        return view('item.create');
    }

    // 商品を登録
    public function store(Request $request)
    {
        // 登録する情報を確認して、必要な情報が揃っているか
        // ->validate()メソッドで確認する。
        $this->validate($request, [
            'name' => 'required|max:100', // requiredは必須
            'price' => 'required|numeric',
            'type' => 'required|max:1',
            'stock' => 'required|numeric',
            'detail' => 'required|max:500',
            'img'=> 'nullable|max:50|mimes:jpg,jpeg,png,gif', // max:50は最大50KBまでという意味
        ],
        [
            'name.required' => '*商品名は必須です',
            'name.max' => '*商品名は100文字以内です',
            'price.required' => '*価格は必須です',
            'price.numeric' => '*入力は数字のみです',
            'type.max' => '*種別は必須です',
            'stock.required' => '*在庫数は必須です',
            'stock.numeric' => '*入力は数字のみです',
            'detail.required' => '*詳細は必須です',
            'detail.max' => '*詳細は500文字以内です',
            'img.mimes' => '*画像のフォーマットが無効です',
            'img.max' => '*画像は50KB以内です',
        ]);
        // フォームが一部空欄のまま登録を押しても、リダイレクトされて
        // 値が未入力である旨の警告メッセージが出る。

        // 新規登録に画像が含まれている場合にDBへ保存する方法
        $encoded_image=null;
        if ($request->hasFile('img')) {
            $image = file_get_contents($request->img);
            $encoded_image = base64_encode($image);
        }

        // 新規登録するための情報をリクエストから取得
        Item::create([
            'user_id' => 1 ,//Auth::id(),
            'ID' => Auth::id(),
            'name' => $request->name, 
            'price' => $request->price,
            'type' => $request->type,
            'stock' => $request->stock,
            'detail' => $request->detail,
            'img' => $encoded_image,
        ]);
        

        return redirect('/item')->with('success', '商品を登録しました');
    }



    // 商品編集フォーム表示
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('item.edit', compact('item'));
    }

    // 商品を更新
    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $request->validate([
            'name' => 'required|max:100', 
            'price' => 'required|numeric',
            'type' => 'required|max:1',
            'stock' => 'required|numeric',
            'detail' => 'required|max:500',
            'comment' => 'required|max:100', 
            'img'=> 'nullable|max:50|mimes:jpg,jpeg,png,gif',
        ],
        [
            'name.required' => '*商品名は必須です',
            'name.max' => '*商品名は100文字以内です',
            'price.required' => '*価格は必須です',
            'price.numeric' => '*入力は数字のみです',
            'type.max' => '*種別は必須です',
            'stock.required' => '*在庫数は必須です',
            'stock.numeric' => '*入力は数字のみです',
            'detail.required' => '*詳細は必須です',
            'detail.max' => '*詳細は500文字以内です',
            'comment' => '*編集理由を入力してください', 
            'comment.max' => '*編集理由は100文字以内です',
            'img.mimes' => '*画像のフォーマットが無効です',
            'img.max' => '*画像は50KB以内です',
        ]);

        $encoded_image=null;
        if ($request->hasFile('img')) {
            $image = file_get_contents($request->img);
            $encoded_image = base64_encode($image);
        

        // 商品をデータベースで更新
        $item->update([
            'user_id' => 1 ,//Auth::id(),
            'ID' => Auth::id(),
            'name' => $request->name, 
            'price' => $request->price,
            'type' => $request->type,
            'stock' => $request->stock,
            'detail' => $request->detail,
            'img' => $encoded_image,
            'comment' => $request->comment,
        ]);
        } else {
            $item->update([
                'user_id' => Auth::id(),
                'name' => $request->name,
                'price' => $request->price,
                'type' => $request->type,
                'stock' => $request->stock,
                'detail' => $request->detail,
                'img' => $item->img, // 既存の画像データをそのまま使う
                'comment' => $request->comment,
    ]);
        }

        return redirect('/item')->with('success', '商品を更新しました');
    }

    // 商品削除
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect('/item')->with('success', '商品を削除しました');
    }
}



