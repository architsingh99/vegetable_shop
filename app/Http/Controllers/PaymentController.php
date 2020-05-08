<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tzsk\Payu\Facade\Payment;

class PaymentController extends Controller
{
    //
    public function payment(Request $request)
    {
        $attributes = [
            'txnid' => strtoupper(str_random(8)), # Transaction ID.
            'amount' => rand(100, 999), # Amount to be charged.
            'productinfo' => "Product Information",
            'firstname' => "John", # Payee Name.
            'email' => "john@doe.com", # Payee Email Address.
            'phone' => "9876543210", # Payee Phone Number.
        ];
        
        return Payment::make($attributes, function ($then) {
            // $then->redirectTo('payment/status');
            // # OR...
            // $then->redirectRoute('payment.status');
            // # OR...
            $then->redirectAction('PaymentController@status');
        });
    }


    public function status(Request $request)
    {
        $payment = Payment::capture();

// Get the payment status.
    if($payment->isCaptured())
    {
        dd($payment);
    }
    }

}
