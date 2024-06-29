@extends('layouts.app')
 
@section('content')
<div class="container">
<a class="h5" href="#" onclick="history.back()" return false;>＜戻る</a>
    <div class="text-center">
        <h1 class="mt-3 mb-5 fw-bold">予約内容</h1>

        @if ($errors->any())
            <div>
                <ul>
                @foreach ($errors->all() as $error)
                <li class="list-unstyled">{{ $error }}</li>
                 @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <form class="" method="POST" action="{{ route('reservations.store',$shop) }}">
                 @csrf
                    <label class="h5 ">予約日</label>
                    <input type="date" name="reserved_date" class="form-control w-25 mx-auto text-center"><br>
                    <label class="h5">予約時間</label>
                    <select name="reserved_time" class="form-control w-25 mx-auto text-center">
                        @for($i = 8; $i < 24; $i++)
                        <option value="{{$i}}">{{$i}}時</option>
                        @endfor
                    </select><br>
                    <label class="h5">予約人数</label>
                    <select name="number_of_people" class="form-control w-25 mx-auto text-center">
                        @for($i = 1; $i < 51; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select><br>
                    <input type="hidden" name="shop_id" value="{{$shop->id}}">
                    <button type="submit" class="btn btn-warning ml-2">予約をする</button>
            </form>
        </div>
    </div>    
</div>


@endsection