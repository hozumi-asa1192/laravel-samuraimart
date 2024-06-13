@extends('layouts.app')

@section('content')
<div class="row">
    <div class="container">
        <div class="col-md-7 mt-7">
            <form action="{{route('shops.index')}}" method="get">
            @csrf
            <select name="category" id="category"> 
            <option value="">カテゴリー</option>  
               @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <div class="col-auto">
                 <input class="form-control" name="keyword">
            </div>
            <div class="col-auto">
                <button type="submit">検索する</button>
            </div>
            </form>
        </div> 
    </div>
</div>
@endsection