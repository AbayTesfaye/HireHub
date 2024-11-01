<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;

class SubscriptionController extends Controller
{
    const WEEKLY_AMOUNT = "20$";
    const MONTHLY_AMOUNT = "80$";
    const YEARLY_AMOUNT = "200$";
    const CURRENCY = 'USD';

    public function subscribe(){
        return view('subscription.index');
    }

    public function initiatePayement(Request $request){
        $plans = [
            'weekly' => [
                'name' => 'weekly',
                'discription' => 'weekly payment',
                'ammount' => self::WEEKLY_AMOUNT,
                'currency'=> self::CURRENCY,
                'quantity' => 1,
            ],
            'monthly' => [
                'name' => 'monthly',
                'discription' => 'monthly payment',
                'ammount' => self::MONTHLY_AMOUNT,
                'currency'=> self::CURRENCY,
                'quantity' => 1,
            ],
            'yearly' => [
                'name' => 'yearly',
                'discription' => 'yearly payment',
                'ammount' => self::YEARLY_AMOUNT,
                'currency'=> self::CURRENCY,
                'quantity' => 1,
            ]
        ];


        Stripe::setApikey(config('services.stripe.secret'));
        // initiate payment
      try{
          $selectPlan = null;
          if($request->is('pay/weekly')){
            $selectPlan = $plans['weekly'];
            $billingEnds = now()->addWeek()->startOfDay()->toDateString();
          } elseif($request->is('pay/monthly')){
            $selectPlan = $plans['monthly'];
            $billingEnds = now()->addMonth()->startOfDay()->toDateString();
          }elseif($request->is('pay/yearly')){
            $selectPlan = $plans['yearly'];
            $billingEnds = now()->addYear()->startOfDay()->toDateString();
          }
      } catch(\Exception $e){

      }
    }

    public function paymentSuccess(){
        // update db
    }
    public function cancel(){
        // redirect
    }
}
