@extends('layouts.app')
 
 @section('content')
 <a class="h5 ms-5" href="{{route('mypage')}}">＜戻る</a>
 <div class="container d-flex justify-content-center mt-3">
     <div class="w-75">
         <h1 class="text-center fw-bold">予約店舗一覧</h1>
 
         <hr>
 
         <div class="row">
             @foreach ($reservations as $reservation)
                 <div class="col-md-9 mt-2">
                     <div class="d-inline-flex">
                         <a href="{{ route('shops.show', $reservation->shop->id) }}" class="w-25">
                            @if ($reservation->shop->image !== "")
                            <img src="{{ asset($reservation->shop->image) }}" class="img-fluid">
                            @else
                            <img src="{{ asset('/img/IMG_6318.PNG') }}" class="img-fluid">
                            @endif
                         </a>
                         <div class="container ms-2">
                             <h3>予約店舗：{{ $reservation->shop->name }}</h3>
                             <h6>予約日：{{ $date->format('Y年m月d日') }}</h6>
                             <h6>予約時間：{{ $reservation->reserved_time }}時</h6>
                         </div>
                     </div>
                   
                 </div>

                 

                 <div class="col-md-2 d-flex align-items-center justify-content-center mt-2">
                     <a href="{{ route('reservations.destroy', $reservation->id) }}" class="btn btn-warning" onclick="event.preventDefault(); document.getElementById('reservation-destroy-form{{$reservation->id}}').submit();">
                         予約を取り消す
                     </a>
                     <form id="reservation-destroy-form{{$reservation->id}}" action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="d-none">
                         @csrf
                         @method('DELETE')
                     </form>
                 </div>
                    <hr class="mt-3">
             @endforeach
         </div>
         <div class="me-1 mb-5">
         {{ $reservations->links() }}
         </div>
     </div>
 </div>
 @endsection