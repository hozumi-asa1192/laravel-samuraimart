@extends('layouts.app')
 
@section('content')
<div class="container">
    <h4>予約内容</h4>
        <div class="">
            <form method="POST" action="{{ route('reservations.store',$shop) }}">
                 @csrf
                <h4>予約日</h4>
                    <input type="date" name="reservation_date" class="form-group">
                <h4>予約時間</h4>
                    <input type="time" name="reservation_time" class="form-group">
                <h4>人数</h4>
                    <input type="number" name="person_num" class="form-group">
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <button type="submit" class="btn samuraimart-submit-button ml-2">予約をする</button>
            </form>
        </div>
</div>


@endsection