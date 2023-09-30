<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{

/**
 * アカウント登録画面表示
 */
    public function showRegister()
    {
        return view('account.register');
    }


/**
 * アカウント登録処理
 * @param Request $request
 * @return Response
 */
    public function registerUser(Request $request)
{
    // バリデーションのルールを定義
    $validate = [
        'name' =>  ['required','string','max:100'],
        'email' => ['required', 'string','email','max:255','unique:users'],
        'password' => ['required','string','min:8','confirmed'],

    ];
    
    //エラーメッセージ
    $errors = [
        'name.required' => 'お名前を入力してください。',
        'name.max' => 'お名前は100文字まで入力してください.',
        'email.required' => 'Emailアドレスを入力してください.',
        'email.unique' => 'このEmailアドレスは既にご登録されています.',
        'email.max' => 'Emailアドレスは255文字まで入力してください.',
        'password.required' => 'パスワードを入力してください.',
        'password.min' => 'パスワードは8文字以上で入力してください.',
        'password.confirmed' => 'パスワードが一致しませんでした。',
    ];
    
    // 定義に沿ってバリデーションを実行
    $request->validate($validate , $errors);

    // バリエーションエラーがなければ新規ユーザー情報をDBに保存
    $users = new User([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => $request->input('password'),
    ]);
    $users->save();
    
    return redirect()->route('login')->with('flash_message', 'アカウントの登録が完了しました。<br>ログインをしてください。');
}


/**
 * ログイン画面表示
 */
    public function showLogin()
    {
        return view('account.login');
    }

/**
 * ログイン処理
 * @param Request $request
 * @return Response
 */
    public function login(Request $request)
    {
        // バリデーションのルールを定義
        $validate = [
            'email' => ['required', 'email'],
            'password' => ['required'],
            ];
        
        //エラーメッセージ
        $errors = [
            'email.required' => 'Emailアドレスを入力してください。',
            'password.required' => 'パスワードを入力してください。',
        ];

        // 定義に沿ってバリデーションを実行
        $request->validate($validate , $errors);
        
        //ログイン認証に必要な情報を取得
        $user = $request->only('email', 'password');

        // ログインに成功した場合はアイテム画面に遷移する
        if (Auth::attempt($user)) 
        {
            $request->session()->regenerate();
            return redirect('/home');
        }
        // ログインに失敗した場合はログイン画面を再表示する
        else
        {
        return redirect()->route('login')->withInput()->withErrors(['login' => 'ログインできませんでした。']);
        }
    }

/**
 * ログアウト処理を実行する
 */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }



}
