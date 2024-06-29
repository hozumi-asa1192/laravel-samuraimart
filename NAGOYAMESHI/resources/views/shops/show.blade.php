@extends('layouts.app')
 
 @section('content')
 
 <a class="h5 ms-5" href="{{route('shops.index')}}">＜戻る</a>
 <div class="d-flex justify-content-center">
     <div class="row w-75">
        <h1 class="text-center fw-bold mt-5">
            {{$shop->name}}
        </h1>
       <div class="mt-5"></div>
         <div class="col-md-6">
            @if ($shop->image)
                <img src="{{ asset($shop->image) }}" class="w-100 img-fluid">
            @else
                <img src="{{ asset('\img\nagoyameshi.PNG')}}" class="w-100 img-fluid">
            @endif
         </div>
         <div class="col">
             <div class="d-flex flex-column">
                 <p>
                    <span class="fw-bold">概要：</span> {{$shop->description}}
                </p>
                 
                 <hr>
                 <p class="align-items-end">
                 <span class="fw-bold">カテゴリー：</span> {{$shop->category->name}} <br>
                 <span class="fw-bold">予算：</span> ￥{{$shop->start_price}}～￥{{$shop->end_price}}
                 </p>

                 <hr>
                 
             </div>
                    <div class="row"> 
                    <p>
                        <span class="fw-bold">営業時間：</span> {{$shop->opening_hour}}時～{{$shop->closed_hour}}時<br>
                        <span class="fw-bold">定休日：</span> {{$shop->regular_holiday}}
                    </p> 
                    
                    <hr>
                    <p>
                        <span class="fw-bold">住所：</span> 〒{{$shop->postal_code}} <span class="ms-2">{{$shop->address}}</span><br>
                        <span class="fw-bold">電話番号：</span>{{$shop->phone}}
                    </p>

                    <hr>

                    </div>
 
        <div class="col-11 d-grid gap-2 d-md-flex justify-content-md-center">
        @if (! $user->subscribed('premium_plan'))
            <a href="{{ route('subscription.create') }}" class="btn btn-warning disabled me-md-4">
                <i class="fa fa-heart"></i>
                お気に入り
            </a>
        @else
         @if($user->favorite_shops()->where('shop_id', $shop->id)->exists())
            <a href="{{ route('favorites.destroy', $shop->id) }}" class="btn btn-warning me-md-4" onclick="event.preventDefault(); document.getElementById('favorites-destroy-form').submit();">
                <i class="fa fa-heart"></i>
                お気に入り解除
            </a>
         @else
            <a href="{{ route('favorites.store', $shop->id) }}" class="btn btn-warning me-md-4" onclick="event.preventDefault(); document.getElementById('favorites-store-form').submit();">
            <i class="fa fa-heart"></i>
                お気に入り
            </a>
         @endif
        @endif
            <form id="favorites-destroy-form" action="{{ route('favorites.destroy', $shop->id) }}" method="POST" class="d-none">
                @csrf
                @method('DELETE')
            </form>
            <form id="favorites-store-form" action="{{ route('favorites.store', $shop->id) }}" method="POST" class="d-none">
                @csrf
            </form>
        @if(! $user->subscribed('premium_plan'))
            
            <a class="btn btn-warning disabled">予約をする</a>
        @else
            <a class="btn btn-warning" href="{{ route('reservations.create',$shop) }}">予約をする</a>
        @endif
        </div>
    </div>

        <div class="row">
            <h1 class="mt-5 fw-bold text-center">カスタマーレビュー</h1>
        
           
            @if ($reviews->isEmpty())
            <div class="mt-3 col-md-12 text-center">
                <p>レビューはまだありません。</p>
            </div>
            @else
             @foreach($reviews as $review)
            <div class="mt-3 col-md-12 text-center">   
                <h3 class="fw-bold">{{ $review->title }}</h3>
                <p class="nagoyameshi-star-color"><span class="fs-5 mb-2">{{ str_repeat('★', $review->score) }}</span></p>
                <p>{{$review->content}}</p>
                <p><span class="fw-bold me-2">{{$review->user->name}}</span><span class="text-muted">{{ $review->created_at->format('Y年m月d日') }}</span></p>
                <hr>
            </div>  
             @endforeach
            @endif
        </div>
                
        <div class="row">
            <div class="mb-4 col-md-12  text-center">
                @if(! $user->subscribed('premium_plan'))
                <a class="btn btn-warning disabled">レビューを書く</a>
                @else
                <a class="btn btn-warning" href="{{ route('reviews.create',$shop) }}">レビューを書く</a>
                @endif
            </div><br /> 
        </div>
        <div class="me-1 mb-5">
            {{ $reviews->links() }}
        </div>   
     </div>    
 </div>
 @endsection
