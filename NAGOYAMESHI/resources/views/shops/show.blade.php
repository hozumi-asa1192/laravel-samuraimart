@extends('layouts.app')
 
 @section('content')
 
 <div class="d-flex justify-content-center">
     <div class="row w-75">
         <div class="col-5 offset-1">
             <img src="{{ asset('img\orenge.png')}}" class="w-100 img-fluid">
         </div>
         <div class="col">
             <div class="d-flex flex-column">
                 <h1 class="">
                     {{$shop->name}}
                 </h1>
                 <p class="">
                     {{$shop->description}}
                 </p>
                 <hr>
                 <p class="d-flex align-items-end">
                     ￥{{$shop->start_price}}(税込)
                 </p>
                 <hr>
             </div>
             @auth
             <form method="POST" class="m-3 align-items-end">
                 @csrf
                 <input type="hidden" name="id" value="{{$shop->id}}">
                 <input type="hidden" name="name" value="{{$shop->name}}">
                 <input type="hidden" name="price" value="{{$shop->start_price}}">
                 <div class="form-group row">
                     <label for="quantity" class="col-sm-2 col-form-label">数量</label>
                     <div class="col-sm-10">
                         <input type="number" id="quantity" name="qty" min="1" value="1" class="form-control w-25">
                     </div>
                 </div>
                 <input type="hidden" name="weight" value="0">
                 <div class="row">
                     
                     <div class="col-5">
                     @if($user->paid_member == 0)
                     <a tabindex="-1" class="btn w-100">
                        <i class="fa fa-heart"></i>
                        お気に入り
                    </a>
                    @else
                    @if($user->favorite_shops()->where('shop_id', $shop->id)->exists())
                                 <a href="{{ route('favorites.destroy', $shop->id) }}" class="btn w-100" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">
                                     <i class="fa fa-heart"></i>
                                     お気に入り解除
                                 </a>
                             @else
                                 <a href="{{ route('favorites.store', $shop->id) }}" class="btn w-100" onclick="event.preventDefault(); document.getElementById('favorites-store-form').submit();">
                                     <i class="fa fa-heart"></i>
                                     お気に入り
                                 </a>
                             @endif
                             @endif
                     </div>
                 </div>
             </form>
             <form id="favorites-destroy-form" action="{{ route('favorites.destroy', $shop->id) }}" method="POST" class="d-none">
                     @csrf
                     @method('DELETE')
                 </form>
                 <form id="favorites-store-form" action="{{ route('favorites.store', $shop->id) }}" method="POST" class="d-none">
                     @csrf
                 </form>
             @endauth
         </div>
 
         <div class="offset-1 col-11">
             <hr class="w-100">
             <h3 class="float-left">カスタマーレビュー</h3>
         </div>
        <div class="offset-1 col-10">
        @if($user->paid_member == 0)
        <a tabindex="-1">レビューを書く</a>
        <a tabindex="-1">予約をする</a>
        @else
        <a href="{{ route('reviews.create',$shop) }}">レビューを書く</a>
        <a href="{{ route('reservations.create',$shop) }}">予約をする</a>
        @endif
        
         <div class="row">
                 
                @foreach($reviews as $review)
                 <div class="offset-md-5 col-md-5">
                    <h3>{{(str_repeat('★', $review->score)) }}</h3>
                    <h3>{{$review->title}}</h3>
                    <p>{{$review->content}}</p>
                    <label>{{$review->created_at}} {{$review->user->name}}</label>
                 </div>
                 @endforeach
                           
             </div><br /> 
         </div>
         <div class="me-1 mb-4">
            {{ $reviews->links() }}
        </div>
     </div>
 </div>
 @endsection
