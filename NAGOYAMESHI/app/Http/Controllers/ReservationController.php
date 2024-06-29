<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Shop $shop)
    {
        $user = Auth::user();

        $i = 1;
        
        return view('reservations.create',compact('shop','i'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Shop $shop)
    {
        $request->validate([
            'reserved_date' => 'required|date|after_or_equal:today',
            'number_of_people' => 'required',
        ]);

        $reservation = new Reservation();
        $reservation->reserved_date = $request->input('reserved_date');
        $reservation->reserved_time = $request->input('reserved_time');
        $reservation->number_of_people = $request->input('number_of_people');
        $reservation->shop_id = $request->input('shop_id');
        $reservation->user_id = Auth::user()->id;
        $reservation->save();

        return view('reservations.completion', compact('reservation','shop'));
    }

    public function destroy($reservation_id)
    {
        // 指定したIDだけとりたい場合はfind
        Reservation::find($reservation_id)->delete();
        
        return back();
    }
}
