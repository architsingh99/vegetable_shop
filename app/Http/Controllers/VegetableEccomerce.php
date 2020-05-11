<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Exception;

//use Request;
use App\Category;
use App\Product;
use App\Cart;
use App\Pincode;
use App\Order;
use App\Suborder;
use App\Otp;
use App\User;

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
          ],
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
        $categories = Category::all();
        $categoriesCount = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category')
        ->select('categories.name', 'category', DB::raw('count(*) as total'))
        ->groupBy('category', 'categories.name')
        ->pluck('categories.name', 'total','category')->all();
        //$jobs = DB::table('job_details')->orderByRaw('updated_at - created_at DESC')->get();
        $products = Product::with('categories')->orderBy('created_at', 'desc')->paginate(15);
        $msg = "Welcome To Bazaar24x7";
        //dd($products[0]->categories);
       return view('welcome')->with('categories', $categories)->with('categoriesCount', $categoriesCount)->with('products', $products)->with('msg', $msg);
    }

    public function categoriesGet(Request $request)
    {
        $categories = Category::all();
        $categoryData = Category::where('id', (int)$request->id)->get();
        $categoriesCount = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category')
        ->select('categories.name', 'category', DB::raw('count(*) as total'))
        ->groupBy('category', 'categories.name')
        ->pluck('categories.name', 'total','category')->all();
        //$jobs = DB::table('job_details')->orderByRaw('updated_at - created_at DESC')->get();
        $products = Product::where('category', (int)$request->id)->orderBy('created_at', 'desc')->get();
        //dd($products);
       return view('category')->with('categories', $categories)->with('categoriesCount', $categoriesCount)->with('products', $products)->with('categoryData', $categoryData);
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
        $categories = Category::all();
        $checkout = Cart::with('product')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        //dd($checkout);
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
            $message = "Deliver available at " . $request->pincode . ". It will be delivered in approximately " . $deliverTime;
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
            $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $order_id = '#' . substr(str_shuffle($str_result), 0, 9);
            $payment_status = 'PENDING';
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
              $order->landmark = $request->input('landmark'); 
              $order->town_city = $request->input('city'); 
              $order->pincode = $request->input('deliveryPincode');  
              $order->address_type = $request->input('address_type'); 
              $order->total_items = DB::table('carts')->where('user_id', auth()->user()->id)->count();  
              $order->order_id = $order_id; 
              $order->sub_total = $request->input('subtotalOrder'); 
              $order->delivery_charge = $request->input('deliveryChargeOrder'); 
              $order->total_price = $request->input('finalPriceOrder'); 
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
               return redirect('payment/' . $order->id);
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
            $categories = Category::all();
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
    //             "redirect_url" => "http://127.0.0.1/pay-success/".$str1
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
    //         $categories = Category::all();
    //            return view('success')->with('categories', $categories)->with('message', $message);
    //        } 
    //      }catch (\Exception $e) {
    //         dd($e);
    //     }
    //  }



     public function getUserNumber($number, $msg)
    {
            $curl = curl_init();
            $num = $number;
            if(strlen($number) > 10)
                $num = substr($number, -10);
			curl_setopt_array($curl, array(
				CURLOPT_URL => "https://api.msg91.com/api/v2/sendsms?country=91",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => "{ \"sender\": \"BAZAAR\", \"route\": \"4\", \"country\": \"91\", \"sms\": [ { \"message\": \"".$msg."\", \"to\": [ \"".$num."\" ] }] }",
				CURLOPT_SSL_VERIFYHOST => 0,
				CURLOPT_SSL_VERIFYPEER => 0,
				CURLOPT_HTTPHEADER => array(
				    "authkey: 328588AuWJtGIqx4d5eb43c63P1",
				    "content-type: application/json"
				),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			// if ($err) {
			// 	dd("SMS couldn't send");
			// } else {
			// 	dd("message sent");
			// }
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
           $categories = Category::all();
    return view('myorders')->with('categories', $categories)->with('orders', $orders);
          
    }

    public function subOrders(Request $request)
    {
       $orders = Suborder::with('product')
            ->where('order_id', $request->order_id)->get();
           // dd($orders);
           $categories = Category::all();
    return view('suborders')->with('categories', $categories)->with('orders', $orders)->with('order_id', $request->order_id);
          
    }

    public function deliver(Request $request)
    {
        $orders = DB::table('orders')
        ->where('order_id', $request->order_id)->get();

        DB::table('orders')
            ->where('id', $request->id)
            ->update(['delivery_status' =>'Delivered']);
        \Mail::to($orders[0]->user_email)->send(new SendMailable($orders[0]->name, $request->order_id));
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
        $hash=hash('sha512', $request->input('key').'|'.$request->input('txnid').'|'.$request->input('amount').'|'.$request->input('pinfo').'|'.$request->input('fname').'|'.$request->input('email').'|||||'.$request->input('udf5').'||||||'.$request->input('salt'));
		$data = [
            'status'                     => 200,
            'message'                    => $hash
     ];
        //dd($data);
    return $this->sendResponse($data, "hash value");
          
    }

}