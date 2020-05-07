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

use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

use DB;
use Hash;
use Redirect;
use Auth;
use EloquentBuilder;
use Illuminate\Http\Request;

class VegetableEccomerce extends Controller
{
    //
    private $SMS_SENDER = "Sample";
    private $RESPONSE_TYPE = 'json';
    private $SMS_USERNAME = 'architsingh99@gmail.com';
    private $SMS_PASSWORD = 'digboi@2014';


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
        ->groupBy('category', 'categories.name',)
        ->pluck('categories.name', 'total','category')->all();
        //$jobs = DB::table('job_details')->orderByRaw('updated_at - created_at DESC')->get();
        $products = Product::with('categories')->orderBy('created_at', 'desc')->paginate(15);
        //dd($products[0]->categories);
       return view('welcome')->with('categories', $categories)->with('categoriesCount', $categoriesCount)->with('products', $products);
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
        $checkout = Cart::with('product')->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();
        //dd($checkout);
        return view('checkout')->with('checkout', $checkout);
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
            $order = new Order();
              $order->user_id = auth()->user()->id;
              $order->user_email = auth()->user()->email; 
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
              $order->payment_status = 'PENDING'; 
              $order->save();
              $this->pay($order);
    }
    catch(Exception $e) {
        print($e);
    }
    }

    public function pay($data){
        // dd(env('IM_API_KEY'));
         $api = new \Instamojo\Instamojo(
                config('services.instamojo.api_key'),
                config('services.instamojo.auth_token'),
                config('services.instamojo.url')
            );
           // dd($api);
        try {
         $str1 = substr($data->order_id, 1); 
            $response = $api->paymentRequestCreate(array(
                "purpose" => "ORDER ID: $data->order_id",
                "amount" => (int)$data->total_price,
                "buyer_name" => "$data->name",
                "send_email" => true,
                "email" => "$data->user_email",
                "phone" => "$data->mobile",
                "redirect_url" => "http://127.0.0.1:8000/pay-success/".$str1
                ));
                 
                header('Location: ' . $response['longurl']);
                exit();
        }catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
     }

     public function success(Request $request){
        try {
    
           $api = new \Instamojo\Instamojo(
               config('services.instamojo.api_key'),
               config('services.instamojo.auth_token'),
               config('services.instamojo.url')
           );
    
           $response = $api->paymentRequestStatus(request('payment_request_id'));
    
           if( !isset($response['payments'][0]['status']) ) {
              dd('payment failed');
           } else if($response['payments'][0]['status'] != 'Credit') {
                dd('payment failed');
           }
           else {
            DB::table('orders')
            ->where('order_id', '#'.$request->order_id)
            ->update(['payment_status' =>'Completed',
            'transaction_id'=>$request['payment_id']]);
            $order = DB::table('orders')->where('order_id', '#'.$request->order_id)->get();
            $cart = DB::table('carts')->where('user_id', $order[0]->user_id)->get();
            $checkout = DB::table('pincodes')->where('pincode', $order[0]->pincode)->get();
            $deliverTime = $checkout[0]->delivery_time . " minutes";
            if($checkout[0]->delivery_time > 60)
            {
                $deliverTime =  ($checkout[0]->delivery_time / 60) . " hr and " . ($checkout[0]->delivery_time % 60) . " minutes.";
            }
            foreach($cart as $key => $value)
            {
                $product = DB::table('products')->where('id', $value->product_id)->get();
                $subOrder = new Suborder();
                $subOrder->item_name = $product[0]->product_name;
                $subOrder->quantity = $value->quantity;
                $subOrder->price = $product[0]->price;
                $subOrder->total = $product[0]->price * $value->quantity;
                $subOrder->category = $product[0]->category;
                $subOrder->item_id = $product[0]->id;
                $subOrder->user_id = $value->user_id;
                $subOrder->order_id = $order[0]->order_id;
                $subOrder->user_email = $order[0]->user_email;
                $subOrder->save();
                Cart::find($value->id)->delete();
            }
            $this->getUserNumber($order[0]->mobile);
               return view('success')->with('transaction_id', $request['payment_id'])->with('order_id', '#'.$request->order_id)->with('delivery_time', $deliverTime);
           } 
         }catch (\Exception $e) {
            dd($e);
        }
     }



     public function getUserNumber($number)
    {
        $phone_number = $number;

        $message = "A message has been sent to you";

        $this->initiateSmsActivation($phone_number, $message);
//        $this->initiateSmsGuzzle($phone_number, $message);

        return redirect()->back()->with('message', 'Message has been sent successfully');
    }


    public function initiateSmsActivation($phone_number, $message){
        $isError = 0;
        $errorMessage = true;

        //Preparing post parameters
        $postData = array(
            'username' => $this->SMS_USERNAME,
            'password' => $this->SMS_PASSWORD,
            'message' => $message,
            'sender' => $this->SMS_SENDER,
            'mobiles' => $phone_number,
            'response' => $this->RESPONSE_TYPE
        );

        $url = "http://portal.bulksmsnigeria.net/api/";

        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
        ));


        //Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


        //get response
        $output = curl_exec($ch);


        //Print error if any
        if (curl_errno($ch)) {
            $isError = true;
            $errorMessage = curl_error($ch);
        }
        curl_close($ch);


        if($isError){
            return array('error' => 1 , 'message' => $errorMessage);
        }else{
            return array('error' => 0 );
        }
    }

    public function initiateSmsGuzzle($phone_number, $message)
    {
        $client = new Client();

        $response = $client->post('http://portal.bulksmsnigeria.net/api/?', [
            'verify'    =>  false,
            'form_params' => [
                'username' => $this->SMS_USERNAME,
                'password' => $this->SMS_PASSWORD,
                'message' => $message,
                'sender' => $this->SMS_SENDER,
                'mobiles' => $phone_number,
            ],
        ]);


        $response = json_decode($response->getBody(), true);
    }
}
