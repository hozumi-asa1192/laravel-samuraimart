<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Category;
class WebController extends Controller
{
    public function index()
    {
        // カテゴリーの中の情報を全部ゲット、ソートでmajor_...の順に並べ替えている
        $categories = Category::all()->sortBy('major_category_name');
        // カテゴリーの中のmajor_...だけゲットしている。uniqueで重複を消してる
        $major_category_names = Category::pluck('major_category_name')->unique();

        return view('web.index',compact('major_category_names','categories'));
    }
}
