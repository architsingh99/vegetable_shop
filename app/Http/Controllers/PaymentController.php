<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tzsk\Payu\Facade\Payment;
use DB;
use App\Category;
use App\Suborder;
use App\Cart;

class PaymentController extends Controller
{
    //
    public function payment(Request $request)
    {
        // $attributes = [
        //     'txnid' => strtoupper(str_random(8)), # Transaction ID.
        //     'amount' => rand(100, 999), # Amount to be charged.
        //     'productinfo' => "Product Information",
        //     'firstname' => "John", # Payee Name.
        //     'email' => "john@doe.com", # Payee Email Address.
        //     'phone' => "9876543210", # Payee Phone Number.
        // ];
            
        //
       // dd($data->total_price);
       $data = DB::table('orders')->where('id', $request->id)->first();
       $str1 = substr($data->order_id, 1);
        $attributes = [
            'txnid' => $str1, # Transaction ID.
            'amount' => (int)$data->total_price, # Amount to be charged.
            'productinfo' => "ORDER ID: $data->order_id",
            'firstname' => $data->name, # Payee Name.
            'email' => $data->user_email, # Payee Email Address.
            'phone' => $data->mobile, # Payee Phone Number.
        ];
        //dd($attributes);
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
        
        DB::table('orders')
        ->where('order_id', '#'.$payment->transaction_id)
        ->update(['payment_status' =>'Completed',
        'transaction_id'=>$payment->payment_id]);
        $order = DB::table('orders')->where('order_id', '#'.$payment->transaction_id)->get();
        $cart = DB::table('carts')->where('user_id', $order[0]->user_id)->get();
        $checkout = DB::table('pincodes')->where('pincode', $order[0]->pincode)->get();
        foreach($cart as $key => $value)
        {
            $product = DB::table('products')->where('id', $value->product_id)->get();
            $subOrder = new Suborder();
            $subOrder->item_name = $product[0]->name;
            $subOrder->quantity = $value->quantity;
            $subOrder->price = $product[0]->price_per_kg;
            $subOrder->total = ($product[0]->price_per_kg * $value->quantity) / 1000;
            $subOrder->category = $product[0]->category;
            $subOrder->item_id = $product[0]->id;
            $subOrder->user_id = $value->user_id;
            $subOrder->order_id = $order[0]->order_id;
            $subOrder->user_email = $order[0]->user_email;
            $subOrder->save();
            Cart::find($value->id)->delete();
        }
        $message = "Your payment has been successfully recieved. Your ORDER ID is " . $request->order_id ." and TRANSACTION ID is " . $request['payment_id'] .". Thank you for shopping with us.";
        $this->getUserNumber($order[0]->mobile, $message);
        //$this->sendWhatsAppSMS($order[0]->mobile, $message);
        $categories = Category::all();
           return view('success')->with('categories', $categories)->with('message', $message);
    }
    else
    {
        dd("Payment Failed");
    }
    }

}
