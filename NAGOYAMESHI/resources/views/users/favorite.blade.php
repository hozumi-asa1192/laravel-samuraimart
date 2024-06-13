@extends('layouts.app')
 
 @section('content')
 <div class="container  d-flex justify-content-center mt-3">
     <div class="w-75">
         <h1>お気に入り</h1>
 
         <hr>
 
         <div class="row">
             @foreach ($favorite_shops as $favorite_shop)
                 <div class="col-md-7 mt-2">
                     <div class="d-inline-flex">
                         <a href="{{ route('shops.show', $favorite_shop->id) }}" class="w-25">
                             <img src="{{ asset('img\orenge.png')}}" class="img-fluid w-100">
                         </a>
                         <div class="container mt-3">
                             <h5 class="w-100 ">{{ $favorite_shop->name }}</h5>
                             <h6 class="w-100 ">&yen;{{ $favorite_shop->start_price }}</h6>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-2 d-flex align-items-center justify-content-end">
                     <a href="{{ route('favorites.destroy', $favorite_shop->id) }}" class="btn btn-info" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form{{$favorite_shop->id}}').submit();">
                         削除
                     </a>
                     <form id="favorites-destroy-form{{$favorite_shop->id}}" action="{{ route('favorites.destroy', $favorite_shop->id) }}" method="POST" class="d-none">
                         @csrf
                         @method('DELETE')
                     </form>
                 </div>
                 <div class="col-md-3 d-flex align-items-center justify-content-end">
                     <button type="submit" class="btn btn-info">予約する</button>
                 </div>
             @endforeach
         </div>
 
         <hr>
     </div>
 </div>
 @endsection