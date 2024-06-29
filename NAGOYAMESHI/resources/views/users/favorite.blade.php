@extends('layouts.app')
 
 @section('content')
 <a class="h5 ms-5" href="{{route('mypage')}}">＜戻る</a>
 <div class="container  d-flex justify-content-center mt-3">
     <div class="w-75">
         <h1 class="text-center fw-bold">お気に入り</h1>
 
         <hr>
 
         <div class="row">
             @foreach ($favorite_shops as $favorite_shop)
                 <div class="col-md-9 mt-2">
                     <div class="d-inline-flex">
                         <a href="{{ route('shops.show', $favorite_shop->id) }}" class="w-25">
                            @if ($favorite_shop->image !== "")
                            <img src="{{ asset($favorite_shop->image) }}" class="img-fluid w-100">
                            @else
                            <img src="{{ asset('/img/IMG_6318.PNG') }}" class="img-fluid w-100">
                            @endif
                         </a>
                         <div class="container ms-2">
                             <h3>店舗名：{{ $favorite_shop->name }}</h3>
                             <h6>予算：￥{{ $favorite_shop->start_price }}～{{ $favorite_shop->end_price }}</h6>
                             <h6>カテゴリー：{{ $favorite_shop->category->name}}</h6>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-1 d-flex align-items-center justify-content-end">
                     <a href="{{ route('favorites.destroy', $favorite_shop->id) }}" class="btn btn-warning" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form{{$favorite_shop->id}}').submit();">
                         解除
                     </a>
                     <form id="favorites-destroy-form{{$favorite_shop->id}}" action="{{ route('favorites.destroy', $favorite_shop->id) }}" method="POST" class="d-none">
                         @csrf
                         @method('DELETE')
                     </form>
                 </div>
                 <div class="col-md-2 d-flex align-items-center justify-content-end">
                 <a class="btn btn-warning" href="{{ route('reservations.create',$favorite_shop->id) }}">予約をする</a>
                 </div>
                <hr class="mt-3">
             @endforeach
         </div>
         <div class="me-1 mb-5">
            {{ $favorite_shops->links() }}
        </div>
     </div>
 </div>
 @endsection