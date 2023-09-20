<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        if($request->search)
        {
            $items=Item::where('name','LIKE','%'.$request->search.'%')->get();
        }
        else{
            $items=Item::all();
        }
        return view('search.index',compact('items'));

    }


    public function detail(Request $request)
    {
        $item=Item::find($request->id);
        return view('search.detail',compact('item'));
    }

 
}