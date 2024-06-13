@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="acms-entry contactBox">
	    <section class="entryColumn">
		    <h2 class="contactH2">予約が完了いたしました。</h2>
		    <p class="message">ご予約ありがとうございます。以下の内容で予約を承っております</p>
            <br>
            <p>{{$shop->name}}</p>
            <p>{{$reservation->reservation_date}}</p>
            <p>{{$reservation->reservation_time}}</p>
            <p>{{$reservation->person_num}}</p>
	    </section>

        <a href="{{ route('shops.index') }}">トップに戻る</a>
    </div>  
</div>


@endsection






