<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class SubscriptionController extends Controller
{
    const WEEKLY_AMOUNT = 20;
    const MONTHLY_AMOUNT = 80;
    const YEARLY_AMOUNT = 200;
    const CURRENCY = 'USD';

    public function subscribe(){
        return view('subscription.index');
    }

    public function initiatePayement(Request $request){
        $plans = [
            'weekly' => [
                'name' => 'weekly',
                'description' => 'weekly payment', // Corrected typo
                'amount' => self::WEEKLY_AMOUNT,
                'currency'=> self::CURRENCY,
                'quantity' => 1,
            ],
            'monthly' => [
                'name' => 'monthly',
                'description' => 'monthly payment', // Corrected typo
                'amount' => self::MONTHLY_AMOUNT,
                'currency'=> self::CURRENCY,
                'quantity' => 1,
            ],
            'yearly' => [
                'name' => 'yearly',
                'description' => 'yearly payment', // Corrected typo
                'amount' => self::YEARLY_AMOUNT,
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

          if($selectPlan){
            $successURL = URL::signedRoute('payment.success',[
                'plan' => $selectPlan['name'],
                'billing_ends' => $billingEnds,
            ]);
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => $selectPlan['currency'],
                            'unit_amount' => $selectPlan['amount'] * 100,
                            'product_data' => [
                                'name' => $selectPlan['name'],
                                'description' => $selectPlan['description'],
                            ],
                        ],
                        'quantity' => $selectPlan['quantity'],
                    ],
                ],
                'mode' => 'payment',
                'success_url' => $successURL,
                'cancel_url' => route('payment.cancel'),
            ]);
            return redirect($session->url);
          }
      } catch(\Exception $e){
          return $e;
      }
    }

    public function paymentSuccess(){
        // update db
    }
    public function cancel(){
        // redirect
    }
}
