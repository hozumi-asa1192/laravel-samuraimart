@extends('layouts.app')
 
@section('content')
<div class="container-fluid pt-2">
 <div class="row">
     <div class="col-md-12">
        <div class="container mt-4">
         <div class="d-flex align-items-center mb-2">

            <form method="GET" action="{{ route('shops.index') }}">
            @if ($category)
                <input type="hidden" name="category" value="{{ $category->id }}">
            @endif
            @if ($keyword)
                <input type="hidden" name="keyword" value="{{ $keyword }}">
            @endif
                <select class="form-select form-select-sm" name="select_sort" onChange="this.form.submit();">
            @foreach ($sorts as $key => $value)
                @if ($sorted === $value)
                    <option value="{{ $value }}" selected>{{ $key }}</option>
                @else
                    <option value="{{ $value }}">{{ $key }}</option>
                @endif
            @endforeach
                </select>
            </form>
         </div>
        
        <form action="{{route('shops.index')}}" method="get">
                    @csrf
                    <div class="d-flex flex-wrap flex-sm-nowrap">
                    <div class="me-2">
                    <select class="form-control form-select" name="category" id="category"> 
                        <option value="">カテゴリー</option>  
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="me-2 mb-2">
                        <input  type="text" class="form-control" placeholder="キーワード" name="keyword">
                    </div>
            
                <div class="mb-4">
                    <button type="submit" class="btn text-white shadow-sm w-20 nagoyameshi-btn">検索する</button>
                </div>
                    </form>
        </div>
            <div class="container">
             <div class="row">
                 @foreach($shops as $shop)
                 <div class="col-md-3">
                     <a href="{{route('shops.show',$shop)}}">
                         @if ($shop->image !== "")
                         <img src="{{ asset($shop->image) }}" class="img-thumbnail  w-100">
                         @else
                         <img src="{{ asset('\img\nagoyameshi.PNG')}}" class="img-thumbnail w-100">
                         @endif
                     </a>
                     <div class="row">
                         <div class="col-12">
                             <p class="text-center mt-2 mb-5">
                                 <label class="h5 fw-bold">{{$shop->name}}</label><br>
                                 <label>カテゴリー：{{$shop->category->name}}</label><br>
                                 <label>予算：￥{{$shop->start_price}}～￥{{$shop->end_price}}</label><br>
                             </p>
                         </div>
                     </div>
                 </div>
                 @endforeach
             </div>
             </div>
         </div>
         <div class="mb-5 ms-3">
         {{ $shops->appends(request()->query())->onEachSide(1)->links() }}
        </div>
     </div>
 </div>
</div>
 @endsection