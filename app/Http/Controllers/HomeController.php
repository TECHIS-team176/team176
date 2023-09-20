<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
/**
 * HOME画面表示　（確認用/全権限表示される)
 */
    public function showHome(Request $request)
    {

        $user = Auth::user();
        return view('home.home')->with(['user' => $user]);

    }

}
