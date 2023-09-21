<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('user.index',compact('users'));
    }

    public function edit(Request $request)
    {
        $user=User::find($request->id);
        return view('user.edit',compact('user'));
    }

    public function update(Request $request)
    {
        $user=User::find($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role=$request->role;
        $user->save();
        return redirect('/user');
    }
}