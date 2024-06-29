@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class=" d-flex justify-content-center mt-3">
	    
    <section class="text-center">
		    <h2 class="fw-bold">予約が完了いたしました。</h2>
		    <p class="mt-3">ご予約ありがとうございます。以下の内容で予約を承っております</p>
            <br>
            <div class=" col-md-12 text-start ms-5">
            <p class="h5">予約店舗：<span class="fw-bold">{{$shop->name}}</span></p>
            <p class="h5">予約日時：<span class="fw-bold">{{$reservation->reserved_date}}</span></p>
            <p class="h5">予約時間：<span class="fw-bold">{{$reservation->reserved_time}}時</span></p>
            <p class="h5">予約人数：<span class="fw-bold">{{$reservation->number_of_people}}名</span></p>
            </div>
	    </section>  
    </div> 
    <div class="row">
        <div class="mt-4 col-md-12  text-center">
            <a class="btn btn-warning" href="{{ route('shops.index') }}">トップに戻る</a>
        </div>
    </div>
</div>


@endsection






