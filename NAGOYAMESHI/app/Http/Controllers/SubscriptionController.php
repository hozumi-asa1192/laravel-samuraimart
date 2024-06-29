<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SubscriptionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $intent = Auth::user()->createSetupIntent();


        return view('subscription.create',compact('intent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->user()->newSubscription(
            'premium_plan', 'price_1PPmVXRuOREDwSLKOlTOJFbz'
        )->create($request->paymentMethodId);

        return redirect()->route('shops.index')->with('flash_message', '有料プランへの登録が完了しました。');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {

        $user = Auth::user();
        $intent = $user->createSetupIntent();

        return view('subscription.edit',compact('user','intent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {        
        $request->user()->updateDefaultPaymentMethod(
            $request->paymentMethodId
        );
        
        return redirect()->route('shops.index')->with('flash_message', 'お支払方法を変更しました。');
    }

    public function cancel()
    {
        return view('subscription.cancel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    { 
        $request->user()->subscription('premium_plan')->cancelNow();

        return redirect()->route('shops.index')->with('flash_message', '有料プランを解約しました。');
    }
}
