<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function store($shop_id)
    {
        $user = Auth::user();
        
              if($user->paid_member == 0)
              {
                abort(404);
              }

        Auth::user()->favorite_shops()->attach($shop_id);

        return back();
    }

    public function destroy($shop_id)
    {
        Auth::user()->favorite_shops()->detach($shop_id);

        return back();
    }
}
