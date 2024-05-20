@extends('layouts.app')
 
@section('content')
<div class="container">
    <h4>レビュー内容</h4>
        <div class="">
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
                         
                    @error('content')
                     <strong>レビュー内容を入力してください</strong>
                    @enderror
                    <h4>タイトル</h4>
                        <input type="text" name="title" class="form-control m-2">
                    <h4>レビュー内容</h4>
                        <textarea name="content" class="form-control m-2"></textarea>
                        <input type="hidden" name="shop_id" value="{{$shop->id}}">
                        <button type="submit" class="btn samuraimart-submit-button ml-2">レビューを追加</button>
            </form>
        </div>
</div>


@endsection