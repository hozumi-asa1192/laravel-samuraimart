@extends('layouts.app')
 
 @section('content')
 <div class="container  d-flex justify-content-center mt-3">
     <div class="w-75">
         <h1>予約店舗一覧</h1>
 
         <hr>
 
         <div class="row">
             @foreach ($reservations as $reservation)
                 <div class="col-md-7 mt-2">
                     <div class="d-inline-flex">
                         <a href="{{ route('shops.show', $reservation->shop->id) }}" class="w-25">
                             <img src="{{ asset('img\orenge.png')}}" class="img-fluid w-100">
                         </a>
                         <div class="container mt-3">
                             <h5 class="w-100 ">{{ $reservation->shop->name }}</h5>
                             <h6 class="w-100 ">&yen;{{ $reservation->shop->start_price }}</h6>
                         </div>
                     </div>
                 </div>
                 <div class="col-md-2 d-flex align-items-center justify-content-end">
                     <a href="{{ route('reservations.destroy', $reservation->id) }}" class="btn btn-info" onclick="event.preventDefault(); document.getElementById('reservation-destroy-form{{$reservation->id}}').submit();">
                         削除
                     </a>
                     <form id="reservation-destroy-form{{$reservation->id}}" action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" class="d-none">
                         @csrf
                         @method('DELETE')
                     </form>
                 </div>

             @endforeach
         </div>
 
         <hr>
     </div>
 </div>
 @endsection