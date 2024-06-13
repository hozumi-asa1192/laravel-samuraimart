<?php

namespace App\Http\Controllers;

use App\Models\shop;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Review;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;

        if($request->category !== null && $keyword !== null)
        {
            $shops = Shop::where('category_id',$request->category)->where('name','like',"%{$keyword}%")->paginate(15);
            $category = Category::find($request->category);
        }elseif($request->category !== null){
            $shops = Shop::where('category_id',$request->category)->paginate(15);
            $category = Category::find($request->category);
        }elseif($keyword !== null){
            $shops = Shop::where('name','like',"%{$keyword}%")->paginate(15);
            $category = null; 
        }else{
            $shops = Shop::paginate(15);
            $category = null; 
        }

        $categories = Category::all();

        return view('shops.index',compact('shops','category','categories','keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('shops.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = new Shop();
        $shop->name = $request->input('name');
        $shop->description = $request->input('description');
        $shop->start_price = $request->input('start_price');
        $shop->category_id = $request->input('category_id');
        $shop->save();
 
         return to_route('shops.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        $user = Auth::user();
        $reviews = $shop->reviews()->paginate(5);

        return view('shops.show', compact('shop','reviews','user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        $categories = Category::all();

        return view('shops.edit', compact('shop','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, shop $shop)
    {
        $shop->name = $request->input('name');
        $shop->description = $request->input('description');
        $shop->start_price = $request->input('start_price');
        $shop->category_id = $request->input('category_id');
        $shop->update();
 
         return to_route('shops.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(shop $shop)
    {
        $shop->delete();
  
        return to_route('shops.index');
    }

    
}
