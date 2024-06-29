@extends('layouts.app')
 
@section('content')
<div class="container">
    <a class="h5" href="#" onclick="history.back()" return false;>＜戻る</a>
        <div class="text-center">
            <h1 class="mb-4 fw-bold">レビューの内容を記入してください</h1>
            <form method="POST" action="{{ route('reviews.store',$shop) }}">
                 @csrf
                <h4>評価</h4>
                    <select name="score">
                        <option value="5">★★★★★</option>
                        <option value="4">★★★★</option>
                        <option value="3">★★★</option>
                        <option value="2">★★</option>
                        <option value="1">★</option>
                    </select>

                    @if ($errors->any())
                        <div>
                            <ul>
                            @foreach ($errors->all() as $error)
                            <li class="list-unstyled">{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    <h4 class="mt-4">タイトル</h4>
                        <input type="text" name="title" class="form-control w-25 mx-auto">
                    <h4 class="mt-4">レビュー内容</h4>
                        <textarea name="content" class="form-control w-25 mx-auto"></textarea>
                        <input type="hidden" name="shop_id" value="{{$shop->id}}">
                        <button type="submit" class="btn btn-warning ml-2 mt-4">レビューを追加</button>
            </form>
        </div>
</div>


@endsection