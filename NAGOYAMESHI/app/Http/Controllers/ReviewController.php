<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use Illuminate\Http\Request;

class ReviewController extends Controller
{



     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
      public function create(Shop $shop)
      {
        $user = Auth::user();
        
        return view('reviews.create',compact('shop')); 
      }
  

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Shop $shop)
    {

        $request->validate([
          'title' => 'required|max:20',
          'content' => 'required'
      ]);

        $reviews = new Review();
        $reviews->title = $request->input('title');
        $reviews->content = $request->input('content');
        $reviews->shop_id = $request->input('shop_id');
        $reviews->user_id = Auth::user()->id;
        $reviews->score = $request->input('score');
        $reviews->save();

        return redirect()->route('shops.show', [$shop]);
    }
}
