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
        
              if($user->paid_member == 0)
              {
                abort(404);
              }

        return view('reservations.create',compact('shop'));
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
            'reservation_date' => 'required|date|after:yesterday',
            'reservation_time' => 'required|after:"now"',
            'person_num' => 'required',
        ]);

        $reservation = new Reservation();
        $reservation->reservation_date = $request->input('reservation_date');
        $reservation->reservation_time = $request->input('reservation_time');
        $reservation->person_num = $request->input('person_num');
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
