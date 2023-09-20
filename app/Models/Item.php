<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // ダミーレコードを代入する機能を使うことを宣言。
    use HasFactory;

    // 以下の情報（属性）を一度に保存したり変更したりできるように設定。
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'type',
        'stock',
        'detail',
        'img',
        'comment',
    ];

}
