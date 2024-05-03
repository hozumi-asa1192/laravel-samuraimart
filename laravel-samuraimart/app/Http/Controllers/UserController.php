<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function mypage()
    {
        $user = Auth::user();

        return view('users.mypage',compact('user'));
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();

        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();
 
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->postal_code = $request->input('postal_code'); 
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->update();

        return to_route('mypage');
    }


    public function update_password(Request $request)
    {
        $validatedData = $request->validate([
            // confirmedは確認用パスワードがあってるか確認する（nameをそれぞれ　xxxとxxx_confirmationにしないといけない）
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        if($request->input('password') == $request->input('password_confirmation')){
            // bcryptはパスワードを暗号化する
            $user->password = bcrypt($request->input('password'));
            $user->update();
        }else{
            return to_route('mypage.edit_password');
        }

        return to_route('mypage');
    }

    public function edit_password()
    {
        return view('users.edit_password');
    }

    public function favorite()
    {
        $user = Auth::user();

        // $user->favorite_productsはユーザーが中間テーブルを介して、productsテーブルの紐づいた情報を全て得ている
        $favorite_products = $user->favorite_products;

        return view('users.favorite',compact('favorite_products'));
    }
    
}
