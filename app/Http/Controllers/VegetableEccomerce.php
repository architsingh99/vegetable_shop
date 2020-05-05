<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Exception;

//use Request;
use App\Category;
use App\Product;
use App\Cart;
use App\Pincode;


use DB;
use Hash;
use Redirect;
use Auth;
use EloquentBuilder;
use Illuminate\Http\Request;

class VegetableEccomerce extends Controller
{
    //
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
}
