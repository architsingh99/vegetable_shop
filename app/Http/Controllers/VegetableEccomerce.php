<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Exception;

//use Request;
use App\Category;
use App\SubCategory;
use App\Product;
use App\Cart;
use App\Pincode;
use App\Order;
use App\Suborder;
use App\Subscription;
use App\Otp;
use App\User;
use App\TempOrder;
use App\Utility;
use App\BookingUtility;
use App\Coupon;

use ClickSend;
use GuzzleHttp;

use GuzzleHttp\Exception\GuzzleException;
//use GuzzleHttp\Client;
use Twilio\Rest\Client;

use DB;
use Hash;
use Redirect;
use Auth;
use EloquentBuilder;
use Illuminate\Http\Request;
use Tzsk\Payu\Facade\Payment;
use Mail;
use App\Mail\SendMailable;
use App\Http\Controllers\Controller;

class VegetableEccomerce extends Controller
{
    public function updatePassword (Request $request) 
    {
          $this->validate($request, [
              'password'     => 'min:6',
          ]
        );

              $user_id=Auth::user()->id;
              User::where('id', $user_id)
              ->update(['password' => Hash::make($request->input('password'))
                  ]);
                  return redirect()->back()->with("message","Password has been successfully updated, Now you can this password to Signin ");
         
    }

    public function sendResponse($data, $message) {

        if (count($data) > 0) {
            $response = [
                'code'    => 200,
                'status'  => true,
                'data'    => $data,
                'message' => $message,
            ];
        }
        else {

            $response = [
                'code'    => 200,
                'status'  => true,
                'data'    => $data,
                'message' => $message,
            ];
        }

    	return response()->json($response, 200);
    }

    public function get(Request $request)
    {
        $categories = Category::where('is_restuarnt', '0')->get();
        $products = Product::with('categories')->orderBy('created_at', 'desc')->paginate(10);
        $msg = "Welcome To Bazaar24x7";
        //dd($products[0]->categories);
       return view('welcome')->with('categories', $categories)->with('categories2', $categories)->with('products', $products)->with('msg', $msg);
    }

    public function categoriesGet(Request $request)
    {
        $categories = Category::where('is_restuarnt', '0')->get();
        $categoryData = Category::where('id', (int)$request->id)->get();
        $products = Product::where('category', (int)$request->id)->orderBy('created_at', 'desc')->get();
        $productsSlider = Product::where('category', (int)$request->id)->orderBy('created_at', 'desc')->paginate(10);
        //dd($products);
         $subcategory = SubCategory::where('category_id', (int)$request->id)->get();
        // if(isset($subcategory) && strlen($subcategory) > 0)
        // {
        //     $msg = $categoryData[0]->name;
        //     return view('welcome')->with('categories', $categories)->with('categories2', $subcategory)->with('productsSlider', $productsSlider)->with('products', $products)->with('msg', $msg);
   
        // }
        // else
        // {
            return view('category')->with('categories', $categories)->with('subcategory', $subcategory)->with('productsSlider', $productsSlider)->with('products', $products)->with('categoryData', $categoryData);
    }

    public function addToCart(Request $request)
    {
        try
        {
            $checkItemIncart = Cart::where('product_id', $request->input('product_id'))->where('user_id', auth()->user()->id)->get();
            if($checkItemIncart->isEmpty())
            {
            $cart = new Cart();
              $cart->user_id = auth()->user()->id;
              $cart->product_id = $request->input('product_id'); 
              $cart->quantity = $request->input('quantity'); 
              $cart->save();
        //Cart::create(Request::all());
              //dd($cart);
              
        }
        else {
            DB::table('carts')
            ->where('id', $checkItemIncart[0]->id)
            ->update([
                'quantity' => ($request->input('quantity') + $checkItemIncart[0]->quantity)
            ]);
        }
        $data  = [
            'status'                     => "success",
            'message'                    => "Product added to cart"
     ];
     return $this->sendResponse($data, "Add To Cart");
    }
        catch(Exception $e)
        {
            $data  = [
                'status'                     => "error",
                'message'                    => "Something went wrong!!"
         ];
         return $this->sendResponse($data, "Add To Cart");
        }
    }

    public function checkout(Request $request)
    {
        //$userId = Auth::user()->id;
        $categories = Category::where('is_restuarnt', '0')->get();
        $checkout = Cart::with('product')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        //dd($checkout);
        foreach($checkout as $key => $value)
        {
            if( $value->product == NULL || $value->product->out_of_stock == 1)
            {
                Cart::find($value->id)->delete();
            }
        }
        $checkout = Cart::with('product')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        return view('checkout')->with('checkout', $checkout)->with('categories', $categories);
    }

    public function update_cart(Request $request)
    {
        DB::table('carts')
    			->where('id', $request->input('cart_id'))
	    		->update([
	    			'quantity' => $request->input('quantity')
	    		]);
       // return view('checkout')->with('checkout', $checkout);
    }

    public function remove_from_cart(Request $request)
    {
        //dd($request);
        Cart::find($request->cart_id)->delete();
        //$article = Article::find($id);
        return redirect()->back();
    }

    public function check_pincode(Request $request)
    {
        //$userId = Auth::user()->id;
        $checkout = Pincode::where('pincode', $request->pincode)->get();
        //dd($checkout);
        $deliverCharge = 0;
            $deliverTime = 0;
        if(!$checkout->isEmpty())
        {
            $status = "success";
            $deliverCharge = $checkout[0]->delivery_charge;
            $deliverTime = $checkout[0]->delivery_time . " minutes";
            if($checkout[0]->delivery_time > 60)
            {
                $deliverTime =  ($checkout[0]->delivery_time / 60) . " hr and " . ($checkout[0]->delivery_time % 60) . " minutes.";
            }
            $message = "Deliver available at " . $request->pincode . ".";
        }
        else
        {
            $status = "error";
             $message = "Deliver not available at " . $request->pincode;
        }
        $data  = [
                'status'                     => $status,
                'delivery_charge'            => $deliverCharge,
                'delivery_time'              => $deliverTime,
                'message'                    => $message
         ];
            //dd($data);
        return $this->sendResponse($data, "Pincode Checked");
    }

    public function post_orders(Request $request)
    {
        //dd($request->input('image'));
        
        try{
            // $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            // $order_id = '#' . substr(str_shuffle($str_result), 0, 9);
            $cartData = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        $subtotal = 0;
        foreach($cartData as $key => $value)
        {
            //$product = Product::find($value->product_id);
            $dividedBy = 1; 
            if($value->product->quantity_in_grams == 1)
                $dividedBy = 1000;
            $subtotal = $subtotal + (int)($value->product->price_per_kg * $value->quantity / $dividedBy);
        }
        if($subtotal < 200)
        {
            return redirect('check_out');
        }
        else
        {
            $pincode = Pincode::where('pincode', $request->input('deliveryPincode'))->get();
            $order_id =$request->input('txnid');
            $payment_status = 'Successfull';
            $payment_method = "Online Payment";

            if((int)$request->input('payment_method') == 2)
            {
                $payment_status = 'Cash On Delivery';
                $payment_method = "Cash On Delivery";
            }
            $order = new Order();
              $order->user_id = auth()->user()->id;
              $order->user_email = $request->input('email'); 
              $order->name = $request->input('name'); 
              $order->mobile = $request->input('mobile');  
              $order->address = $request->input('address');
              $order->landmark = $request->input('landmark'); 
              $order->town_city = $request->input('city'); 
              $order->pincode = $request->input('deliveryPincode');  
              $order->address_type = $request->input('address_type'); 
              $order->total_items = DB::table('carts')->where('user_id', auth()->user()->id)->count();  
              $order->order_id = $order_id; 
              $order->sub_total = $subtotal; 
              $order->delivery_charge = $pincode[0]->delivery_charge; 
              $order->total_price = $subtotal + (int)($pincode[0]->delivery_charge); 
              $order->payment_status = $payment_status; 
              $order->payment_method = $payment_method; 
              $order->save();
              if((int)$request->input('payment_method') == 2)
              {
                //$this->cashOnDelivery($order);
                return redirect('cash_on_delivery/' . $order->id);
              }
              else
              {
               //$this->paymentPayUMoney($order);
               return redirect('payment_success/' . $order->id);
               //app('App\Http\Controllers\PaymentController')->payment($order);
              }
            }
    }
    catch(Exception $e) {
        dd($e);
    }
    }

    public function post_orders_subscription(Request $request)
    {
        //dd($request->input('image'));
        
        try{
            // $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            // $order_id = '#' . substr(str_shuffle($str_result), 0, 9);
            $order_id =$request->input('txnid');
            $payment_status = 'Successfull';
            $payment_method = "Online Payment";

            $order = new Subscription();
            if((int)$request->input('payment_method') == 2)
            {
                $payment_status = 'Cash On Delivery';
                $payment_method = "Cash On Delivery";
                
            }
            $order->quantity_per_day= $request->input('quantity_in_grams');
             $order->product_id= $request->input('product_id');
              $order->user_id = auth()->user()->id;
              $order->user_email = $request->input('email'); 
              $order->name = $request->input('name'); 
              $order->mobile = $request->input('mobile');  
              $order->landmark = $request->input('landmark'); 
              $order->town_city = $request->input('city'); 
              $order->pincode = $request->input('deliveryPincode');  
              $order->address_type = $request->input('address_type');  
              $order->order_id = $order_id; 
              $order->sub_total = $request->input('subtotalOrder'); 
              $order->delivery_charge = $request->input('deliveryChargeOrder'); 
              $order->total_price = $request->input('finalPriceOrder'); 
              $order->address = $request->input('address'); 
              $order->payment_status = $payment_status; 
              $order->payment_method = $payment_method; 
              $order->save();
              if((int)$request->input('payment_method') == 2)
              {
                //$this->cashOnDelivery($order);
                return redirect('cash_on_delivery_subscription/' . $order->id);
              }
              else
              {
               //$this->paymentPayUMoney($order);
               return redirect('payment_success_subscription/' . $order->id);
               //app('App\Http\Controllers\PaymentController')->payment($order);
              }
    }
    catch(Exception $e) {
        dd($e);
    }
    }

    public function cashOnDelivery(Request $request){
        try {
            $order = DB::table('orders')->where('id', $request->id)->first();
            $cart = DB::table('carts')->where('user_id', $order->user_id)->get();
            foreach($cart as $key => $value)
            {
                $product = DB::table('products')->where('id', $value->product_id)->get();
                $subOrder = new Suborder();
                $subOrder->item_name = $product[0]->name;
                $subOrder->quantity = $value->quantity;
                $subOrder->price = $product[0]->price_per_kg;
                $dividedBy = 1; 
                if($product[0]->quantity_in_grams == 1)
                    $dividedBy = 1000;
                $subOrder->total = ($product[0]->price_per_kg * $value->quantity) / $dividedBy;
                $subOrder->category = $product[0]->category;
                $subOrder->sub_category = $product[0]->sub_category;
                $subOrder->item_id = $product[0]->id;
                $subOrder->user_id = $value->user_id;
                $subOrder->order_id = $order->order_id;
                $subOrder->user_email = $order->user_email;
                $subOrder->save();
                Cart::find($value->id)->delete();
            }
            $message = "Your order has been successfully recieved. Your ORDER ID is " . $order->order_id .". Kindly pay Rs. ". $order->total_price." at the time of delivery.  Thank you for shopping with us.";
            $this->getUserNumber($order->mobile, $message);
            //$this->sendWhatsAppSMS($order->mobile, $message);
            $categories = Category::where('is_restuarnt', '0')->get();
            return view('success')->with('categories', $categories)->with('message', $message);
         }catch (\Exception $e) {
            dd($e);
        }
     }

     public function cashOnDeliverySubscription(Request $request){
        try {
            $order = DB::table('orders')->where('id', $request->id)->first();
            $message = "Your subscription has been successfully recieved. Your subscription ID is " . $order->order_id .". Kindly pay Rs. ". $order->total_price." at the time of delivery.  Thank you for shopping with us.";
            $this->getUserNumber($order->mobile, $message);
            //$this->sendWhatsAppSMS($order->mobile, $message);
            $categories = Category::where('is_restuarnt', '0')->get();
            return view('success')->with('categories', $categories)->with('message', $message);
         }catch (\Exception $e) {
            dd($e);
        }
     }

     public function paymentSuccess(Request $request){
        try {
            $order = DB::table('orders')->where('id', $request->id)->first();
            $cart = DB::table('carts')->where('user_id', $order->user_id)->get();
            foreach($cart as $key => $value)
            {
                $product = DB::table('products')->where('id', $value->product_id)->get();
                $subOrder = new Suborder();
                $subOrder->item_name = $product[0]->name;
                $subOrder->quantity = $value->quantity;
                $subOrder->price = $product[0]->price_per_kg;
                $dividedBy = 1; 
                if($product[0]->quantity_in_grams == 1)
                    $dividedBy = 1000;
                $subOrder->total = ($product[0]->price_per_kg * $value->quantity) / $dividedBy;
                $subOrder->category = $product[0]->category;
                $subOrder->item_id = $product[0]->id;
                $subOrder->user_id = $value->user_id;
                $subOrder->order_id = $order->order_id;
                $subOrder->user_email = $order->user_email;
                $subOrder->save();
                Cart::find($value->id)->delete();
            }
            $message = "Your order has been successfully recieved. Your ORDER ID is " . $order->order_id .".  Thank you for shopping with us.";
            $this->getUserNumber($order->mobile, $message);
            //$this->sendWhatsAppSMS($order->mobile, $message);
            $categories = Category::where('is_restuarnt', '0')->get();
            return view('success')->with('categories', $categories)->with('message', $message);
         }catch (\Exception $e) {
            dd($e);
        }
     }

     public function paymentSuccessSubscription(Request $request){
        try {
            $order = DB::table('subscriptions')->where('id', $request->id)->first();
            $message = "Your subscription has been successfully recieved. Your subscription ID is " . $order->order_id .".  Thank you for shopping with us.";
            $this->getUserNumber($order->mobile, $message);
            //$this->sendWhatsAppSMS($order->mobile, $message);
            $categories = Category::where('is_restuarnt', '0')->get();
            return view('success')->with('categories', $categories)->with('message', $message);
         }catch (\Exception $e) {
            dd($e);
        }
     }

    // public function pay($data){
    //     // dd(env('IM_API_KEY'));
    //      $api = new \Instamojo\Instamojo(
    //             config('services.instamojo.api_key'),
    //             config('services.instamojo.auth_token'),
    //             config('services.instamojo.url')
    //         );
    //        // dd($api);
    //     try {
    //      $str1 = substr($data->order_id, 1); 
    //         $response = $api->paymentRequestCreate(array(
    //             "purpose" => "ORDER ID: $data->order_id",
    //             "amount" => (int)$data->total_price,
    //             "buyer_name" => "$data->name",
    //             "send_email" => true,
    //             "email" => "$data->user_email",
    //             "phone" => "$data->mobile",
    //             "redirect_url" => "http://localhost:8000/pay-success/".$str1
    //             ));
                 
    //             header('Location: ' . $response['longurl']);
    //             exit();
    //     }catch (Exception $e) {
    //         print('Error: ' . $e->getMessage());
    //     }
    //  }

    //  public function success(Request $request){
    //     try {
    
    //        $api = new \Instamojo\Instamojo(
    //            config('services.instamojo.api_key'),
    //            config('services.instamojo.auth_token'),
    //            config('services.instamojo.url')
    //        );
    
    //        $response = $api->paymentRequestStatus(request('payment_request_id'));
    
    //        if( !isset($response['payments'][0]['status']) ) {
    //           dd('payment failed');
    //        } else if($response['payments'][0]['status'] != 'Credit') {
    //             dd('payment failed');
    //        }
    //        else {
    //         DB::table('orders')
    //         ->where('order_id', '#'.$request->order_id)
    //         ->update(['payment_status' =>'Completed',
    //         'transaction_id'=>$request['payment_id']]);
    //         $order = DB::table('orders')->where('order_id', '#'.$request->order_id)->get();
    //         $cart = DB::table('carts')->where('user_id', $order[0]->user_id)->get();
    //         $checkout = DB::table('pincodes')->where('pincode', $order[0]->pincode)->get();
    //         $deliverTime = $checkout[0]->delivery_time . " minutes";
    //         if($checkout[0]->delivery_time > 60)
    //         {
    //             $deliverTime =  ($checkout[0]->delivery_time / 60) . " hr and " . ($checkout[0]->delivery_time % 60) . " minutes.";
    //         }
    //         foreach($cart as $key => $value)
    //         {
    //             $product = DB::table('products')->where('id', $value->product_id)->get();
    //             $subOrder = new Suborder();
    //             $subOrder->item_name = $product[0]->name;
    //             $subOrder->quantity = $value->quantity;
    //             $subOrder->price = $product[0]->price_per_kg;
    //             $subOrder->total = ($product[0]->price_per_kg * $value->quantity) / 1000;
    //             $subOrder->category = $product[0]->category;
    //             $subOrder->item_id = $product[0]->id;
    //             $subOrder->user_id = $value->user_id;
    //             $subOrder->order_id = $order[0]->order_id;
    //             $subOrder->user_email = $order[0]->user_email;
    //             $subOrder->save();
    //             Cart::find($value->id)->delete();
    //         }
    //         $message = "Your payment has been successfully recieved. Your ORDER ID is " . $request->order_id ." and TRANSACTION ID is " . $request['payment_id'] .". It will be delivered in approximately " . $deliverTime .". Thank you for shopping with us.";
    //         $this->getUserNumber($order[0]->mobile, $message);
    //         //$this->sendWhatsAppSMS($order[0]->mobile, $message);
    //         $categories = Category::where('is_restuarnt', '0')->get();
    //            return view('success')->with('categories', $categories)->with('message', $message);
    //        } 
    //      }catch (\Exception $e) {
    //         dd($e);
    //     }
    //  }



     public function getUserNumber($number, $message)
    {
//             $curl = curl_init();
            $num = $number;
            if(strlen($number) > 10)
                $num = substr($number, -10);
// 			curl_setopt_array($curl, array(
// 				CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms?country=91",
// 				CURLOPT_RETURNTRANSFER => true,
// 				CURLOPT_ENCODING => "",
// 				CURLOPT_MAXREDIRS => 10,
// 				CURLOPT_TIMEOUT => 30,
// 				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
// 				CURLOPT_CUSTOMREQUEST => "POST",
// 				CURLOPT_POSTFIELDS => "{ \"sender\": \"BAZAAR\", \"route\": \"4\", \"country\": \"91\", \"sms\": [ { \"message\": \"".$msg."\", \"to\": [ \"".$num."\" ] }] }",
// 				CURLOPT_SSL_VERIFYHOST => 0,
// 				CURLOPT_SSL_VERIFYPEER => 0,
// 				CURLOPT_HTTPHEADER => array(
// 				    "authkey: 329899ARjqT6jMhj85ec75c8fP1",
// 				    "content-type: application/json"
// 				),
// 			));

// 			$response = curl_exec($curl);
// 			$err = curl_error($curl);

// 			curl_close($curl);


// 			if ($err) {
// 				dd("SMS couldn't send". $err);
// 			} else {
// 				dd("message sent". $response);
// 			}

            $config = ClickSend\Configuration::getDefaultConfiguration()
                        ->setUsername('techservicedock@gmail.com')
                        ->setPassword('1C5ADE71-92BC-D958-E650-DA519C77D317');


            $apiInstance = new ClickSend\Api\SMSApi(new GuzzleHttp\Client(),$config);
            $msg = new \ClickSend\Model\SmsMessage();
            $msg->setBody($message); 
            $msg->setTo($num);
            $msg->setSource("sdk");

            // \ClickSend\Model\SmsMessageCollection | SmsMessageCollection model
            $sms_messages = new \ClickSend\Model\SmsMessageCollection(); 
            $sms_messages->setMessages([$msg]);

            try {
            $result = $apiInstance->smsSendPost($sms_messages);
            print_r($result);
            } catch (Exception $e) {
            echo 'Exception when calling SMSApi->smsSendPost: ', $e->getMessage(), PHP_EOL;
            }
    }

    public function test(Request $request)
    {
        $res = $this->sendWhatsAppSMS('8404052003', 'hi');
        dd($res);
    }

    public function sendWhatsAppSMS($number, $msg) {
        $twilio = new Client('ACa9f2d841505758a730ec17d7f4599197', '2fcec50f015c4cd0e0ab9a158570471f');
            if(strlen($number) == 10)
                $num = "+91" . $number;
            else $num =  "+91" . substr($number, -10);
        $message = $twilio->messages
                  ->create("whatsapp:".$num, // to
                           array(
                               "from" => "whatsapp:+14155238886",
                               "body" => $msg
                           )
                  );
        return $message;          
    }

    // public function payment($data)
    // {
    //     $attributes = [
    //         'txnid' => $data->order_id, # Transaction ID.
    //         'amount' => (int)$data->total_price, # Amount to be charged.
    //         'productinfo' => $data->order_id,
    //         'firstname' => $data->name, # Payee Name.
    //         'email' => $data->user_email, # Payee Email Address.
    //         'phone' => $data->mobile, # Payee Phone Number.
    //     ];
        
    //     return Payment::make($attributes, function ($then) {
    //         // $then->redirectTo('payment/status');
    //         // # OR...
    //         // $then->redirectRoute('payment.status');
    //         // # OR...
    //         $then->redirectAction('PaymentController@status');
    //     });
    // }

    public function trackOrders(Request $request)
    {
       $orders = DB::table('orders')
            ->where('user_id', auth()->user()->id)->get();
           // dd($orders);
           $categories = Category::where('is_restuarnt', '0')->get();
    return view('myorders')->with('categories', $categories)->with('orders', $orders);
          
    }

    public function subOrders(Request $request)
    {
       $orders = Suborder::with('product')
            ->where('order_id', $request->order_id)->get();
           // dd($orders);
           $categories = Category::where('is_restuarnt', '0')->get();
    return view('suborders')->with('categories', $categories)->with('orders', $orders)->with('order_id', $request->order_id);
          
    }

    public function deliver(Request $request)
    {
        $orders = DB::table('orders')
        ->where('order_id', $request->order_id)->get();

        DB::table('orders')
            ->where('id', $request->id)
            ->update(['delivery_status' =>'Delivered']);
        //\Mail::to($orders[0]->user_email)->send(new SendMailable($orders[0]->name, $request->order_id));
        $message = "Your order with id " . $request->order_id ." has been successfully delivered. Than you for shopping with us.";
        $this->getUserNumber($orders[0]->mobile, $message);
        //$this->sendWhatsAppSMS($orders[0]->mobile, $message);
        return \Redirect::to(URL::previous());    
    }

    public function sendOtp(Request $request)
    {
        $confirm_code = rand(100000, 999999);
        $msg = "Your one time password is " . $confirm_code . ".";
        $this->getUserNumber($request->mobile, $msg);
        $num = $request->mobile;
            if(strlen($request->mobile) > 10)
                $num = substr($request->mobile, -10);
        $otp = new Otp();
        $otp->mobile = $num;
        $otp->otp = $confirm_code;
        $otp->save();
           // dd($orders);
        //DB::table('otps')->where('status', 1)->whereBetween('created_at', [now()->subMinutes(30), now()])->get();
           $data = [
            'status'                     => 200,
            'message'                    => "OTP has been send successfully."
     ];
        //dd($data);
    return $this->sendResponse($data, "OTP has been send successfully.");
          
    }

    public function loginViaOtp(Request $request)
    {
        $num = $request->mobile;
            if(strlen($request->mobile) > 10)
                $num = substr($request->mobile, -10);
        $otp = DB::table('otps')->where('status', 1)->where('mobile', $num)->where('otp', $request->otp)->whereBetween('created_at', [now()->subMinutes(30), now()])->get();
           // dd($orders);
           
           if($otp->isEmpty())
        {
            $data = [
                'status'                     => 400,
                'message'                    => "Invalid OTP."
         ];
            //dd($data);
        return $this->sendResponse($data, "Invalid OTP.");
        }
        else
        {
            DB::table('otps')
            ->where('id', $otp[0]->id)
            ->update(['status'=> 2]);
            $users = DB::table('users')->where('email', $num)->get();
           // $user = DB::table('users')->where('email', $num)->first();
            
            if($users->isEmpty())
            {
                $user = User::create([
                    'name'          => "GUEST",
                    'email'         => $num,
                    'password'         => $num + $request->otp + $otp[0]->id
                                  ]);
                auth()->login($user);
                
            }
            else
            {
                $user = User::where(['email' => $num])->first();
                Auth::login($user);
            }
            
            //auth()->login($user);
            $data = [
                'status'                     => 200,
                'message'                    => "valid OTP."
         ];
            //dd($data);
        return $this->sendResponse($data, "valid OTP.");
        }
        //DB::table('otps')->where('status', 1)->whereBetween('created_at', [now()->subMinutes(30), now()])->get();
           
          
    }

    public function getHash(Request $request)
    {
        $cartData = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        $subtotal = 0;
        foreach($cartData as $key => $value)
        {
            //$product = Product::find($value->product_id);
            $dividedBy = 1; 
            if($value->product->quantity_in_grams == 1)
                $dividedBy = 1000;
            $subtotal = $subtotal + (int)($value->product->price_per_kg * $value->quantity / $dividedBy);
        }
        if($subtotal < 200)
        {
            $data = [
                'status'                     => 201,
                'message'                    => "Minimum Cart value is 200",
                'amount'                     => 0
         ];
        }
        else
        {
            $pincode = Pincode::where('pincode', $request->input('deliveryPincode'))->get();
        $order_id =$request->input('txnid');
            $payment_status = 'PENDING';
            $payment_method = "Online Payment";
            $order = new TempOrder();
              $order->user_id = auth()->user()->id;
              $order->user_email = $request->input('email'); 
              $order->name = $request->input('fname'); 
              $order->mobile = $request->input('mobile');  
              $order->address = $request->input('address'); 
              $order->landmark = $request->input('landmark'); 
              $order->town_city = $request->input('city'); 
              $order->pincode = $request->input('deliveryPincode');  
              $order->address_type = $request->input('address_type'); 
              $order->total_items = DB::table('carts')->where('user_id', auth()->user()->id)->count();  
              $order->sub_total = $subtotal; 
              $order->order_id = $order_id; 
              $order->delivery_charge = $pincode[0]->delivery_charge; 
              $order->total_price = $subtotal + (int)($pincode[0]->delivery_charge); 
              $order->payment_status = $payment_status; 
              $order->payment_method = $payment_method; 
              $order->save();
              
              
        $hash=hash('sha512', $request->input('key').'|'.$request->input('txnid').'|'.$request->input('amount').'|'.$request->input('pinfo').'|'.$request->input('fname').'|'.$request->input('email').'|||||'.$request->input('udf5').'||||||'.$request->input('salt'));
		$data = [
            'status'                     => 200,
            'message'                    => $hash,
            'amount'                     => $subtotal + (int)($pincode[0]->delivery_charge)
     ];
        //dd($data);
    }
    return $this->sendResponse($data, "hash value");
          
    }

    public function getHash2(Request $request)
    {
        $cartData = Cart::with('product')->where('user_id', auth()->user()->id)->get();
        $subtotal = 0;
        foreach($cartData as $key => $value)
        {
            //$product = Product::find($value->product_id);
            $dividedBy = 1; 
            if($value->product->quantity_in_grams == 1)
                $dividedBy = 1000;
            $subtotal = $subtotal + (int)($value->product->price_per_kg * $value->quantity / $dividedBy);
        }
        if($subtotal < 200)
        {
            $data = [
                'status'                     => 201,
                'message'                    => "Minimum ccart value is 200",
                'amount'                     => 0
         ];
        }
        else
        {
        $pincode = Pincode::where('pincode', $request->input('deliveryPincode'))->get();
        $order_id =$request->input('txnid');
            $payment_status = 'PENDING';
            $payment_method = "Online Payment";
            $order = new TempOrder();
              $order->user_id = auth()->user()->id;
              $order->user_email = $request->input('email'); 
              $order->name = $request->input('fname'); 
              $order->mobile = $request->input('mobile');  
              $order->landmark = $request->input('landmark'); 
              $order->town_city = $request->input('city'); 
              $order->pincode = $request->input('deliveryPincode');  
              $order->address_type = $request->input('address_type'); 
              //$order->total_items = DB::table('carts')->where('user_id', auth()->user()->id)->count();  
              $order->order_id = $order_id; 
              $order->address = $request->input('address'); 
              $order->quantity = $request->input('quantity'); 
              $order->product_id = $request->input('product_id'); 
              $order->sub_total = $subtotal; 
              $order->delivery_charge = $pincode[0]->delivery_charge; 
              $order->total_price = $subtotal + (int)($pincode[0]->delivery_charge); 
              $order->payment_status = $payment_status; 
              $order->payment_method = $payment_method; 
              $order->save();
              
              
        $hash=hash('sha512', $request->input('key').'|'.$request->input('txnid').'|'.$request->input('amount').'|'.$request->input('pinfo').'|'.$request->input('fname').'|'.$request->input('email').'|||||'.$request->input('udf5').'||||||'.$request->input('salt'));
		$data = [
            'status'                     => 200,
            'message'                    => $hash,
            'amount'                     => $subtotal + (int)($pincode[0]->delivery_charge)
     ];
    }
        //dd($data);
    return $this->sendResponse($data, "hash value");
          
    }
    
    public function paymentPayU(Request $request)
    {
        
             $temporder = DB::table('temp_orders')->where('order_id', $request->input('txnid'))->orderBy('created_at', 'desc')->first();
            $payment_status = 'SUCCESSFULL';
            $payment_method = "Online Payment";
            $order = new Order();
            $order->user_id = $temporder->user_id;
            $order->user_email = $temporder->user_email; 
            $order->name = $temporder->name; 
            $order->mobile = $temporder->mobile;  
            $order->address = $temporder->address; 
            $order->landmark = $temporder->landmark; 
            $order->town_city = $temporder->town_city; 
            $order->pincode = $temporder->pincode;  
            $order->address_type = $temporder->address_type; 
            $order->total_items = $temporder->total_items;  
            $order->order_id = $temporder->order_id; 
            $order->sub_total = $temporder->sub_total; 
            $order->delivery_charge = $temporder->delivery_charge; 
            $order->total_price = $temporder->total_price; 
            $order->payment_status = $payment_status; 
            $order->payment_method = $payment_method; 
            $order->save();
            TempOrder::find($temporder->id)->delete();
            return redirect('payment_success/' . $order->id);
    }

    public function paymentPayUSubscription(Request $request)
    {
        
            $temporder = DB::table('temp_orders')->where('order_id', $request->input('txnid'))->orderBy('created_at', 'desc')->first();
            $payment_status = 'SUCCESSFULL';
            $payment_method = "Online Payment";
            $order = new Subscription();
            $order->user_id = $temporder->user_id;
            $order->user_email = $temporder->user_email; 
            $order->name = $temporder->name; 
            $order->mobile = $temporder->mobile;  
            $order->landmark = $temporder->landmark; 
            $order->town_city = $temporder->town_city; 
            $order->pincode = $temporder->pincode;  
            $order->address_type = $temporder->address_type; 
            //$order->total_items = $temporder->total_items;  
            $order->order_id = $temporder->order_id; 
            $order->sub_total = $temporder->sub_total; 
            $order->delivery_charge = $temporder->delivery_charge; 
            $order->total_price = $temporder->total_price; 
            $order->quantity_per_day = $temporder->quantity; 
            $order->product_id = $temporder->product_id; 
            $order->address = $temporder->address;
            $order->payment_status = $payment_status; 
            $order->payment_method = $payment_method; 
            $order->save();
            TempOrder::find($temporder->id)->delete();
            return redirect('payment_success_subscription/' . $order->id);
    }

    public function subscribe(Request $request)
    {
        $product = DB::table('products')->where('id', $request->id)->first();
        $categories = Category::where('is_restuarnt', '0')->get();
        return view('details')->with('categories', $categories)->with('product', $product);   
    }

    public function getUtilities(Request $request)
    {
       $utilities = Utility::all();
           // dd($orders);
           $categories = Category::where('is_restuarnt', '0')->get();
    return view('utilities')->with('categories', $categories)->with('utilities', $utilities);
          
    }

    public function saveUtilities(Request $request)
    {
            $order = new BookingUtility();
            $order->name = $request->input('name');
            $order->phone_number = $request->input('ph_num'); 
            $order->message = $request->input('message'); 
            $order->pickup_location = $request->input('pick_location');  
            $order->drop_location = $request->input('drop_location'); 
            $order->utility = $request->input('utility');
            $order->address = $request->input('add');
            $order->save();

            $message = "Your request has been recieved. Our executive will get in touch with you soon.";
            $this->getUserNumber($order->phone_number, $message);
            //$this->sendWhatsAppSMS($order->mobile, $message);
            $categories = Category::where('is_restuarnt', '0')->get();
            return view('success')->with('categories', $categories)->with('message', $message);
    }

    public function accept(Request $request)
    {
        $utilities = DB::table('booking_utilities')
        ->where('id', $request->id)->get();

        DB::table('booking_utilities')
            ->where('id', $request->id)
            ->update(['booking_status' =>'ACCEPTED']);
        //\Mail::to($orders[0]->user_email)->send(new SendMailable($orders[0]->name, $request->order_id));
        $message = "Your request has accepted. Thank your for choosing.";
        $this->getUserNumber($utilities[0]->phone_number, $message);
        //$this->sendWhatsAppSMS($orders[0]->mobile, $message);
        return \Redirect::to(URL::previous());    
    }

    public function resturantCategories()
    {
        $categories = Category::where('is_restuarnt', '0')->get();
        $categories2 = Category::where('is_restuarnt', '1')->get();
        $products = Product::with('categories')->orderBy('created_at', 'desc')->paginate(10);
        $msg = "RESTURANT";
        //dd($products[0]->categories);
       return view('welcome')->with('categories', $categories)->with('categories2', $categories2)->with('products', $products)->with('msg', $msg);
    
    }

    public function apply_coupon(Request $request)
    {
        //$userId = Auth::user()->id;
        $coupons = Coupon::where('name', $request->coupon)->get();
        //dd($checkout);
        if(!$coupons->isEmpty())
        {
            $status = "success";
            $minimum_cart_value = $coupons[0]->minimum_cart_value;
            $in_percentage_flat = $coupons[0]->in_percentage_flat;
            $amount = $coupons[0]->amount;
            $maximum_discount_amount = $coupons[0]->maximum_discount_amount;
            $message = "Coupon code applied successfully.";
        }
        else
        {
            $status = "error";
            $minimum_cart_value = 0;
            $in_percentage_flat = 0;
            $amount = 0;
            $maximum_discount_amount = 0;
             $message = "Coupon code not found.";
        }
        $data  = [
                'status'                     => $status,
                'minimum_cart_value'         => $minimum_cart_value,
                'in_percentage_flat'         => $in_percentage_flat,
                'amount'                     => $amount,
                'maximum_discount_amount'    => $maximum_discount_amount,
                'message'                    => $message
         ];
            //dd($data);
        return $this->sendResponse($data, "Pincode Checked");
    }

}