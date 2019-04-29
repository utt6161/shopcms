<?php


//          view обращается к пути файла
//          route к имени в web.php


namespace App\Http\Controllers;

use Gate;
use Cart;
use Auth;
use Session;
use Illuminate\Http\Request;

class ShoppingCart extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        if(Gate::allows('isAdmin')|| Gate::allows('isUser')){
            return redirect()->route('auth.login');
        }
    }


	public function show(){
        Session::forget('message');
		$user = Auth::user();
        $cart = Cart::session($user->name)->getContent();
        //$cart = collect($cart_raw->id, $card_raw->name, $card_raw->price, $card_raw->options->image);
        // foreach($cart_raw as $cart){
        //     foreach($cart as $c){
        //         echo '<pre>'; 
        //         var_dump($c);
        //         echo($c);
        //         echo '</pre>';
        //     }
        // }

		// $cart = collect($cart_raw->id, $card_raw->name, $card_raw->price, $card_raw->options->image);
		// //$cart = $cart_raw;
        if(Cart::session($user->name)->isEmpty()){
            Session::flash('message','Ваша корзина пуста');
        }
        else{
        	//$cart = $cart_raw;
            return view('products.shoppingcart', ['cart'=>$cart]);
        }
        return view('products.shoppingcart', ['cart'=>$cart]);
    }

    public function add(Request $request){
        Session::forget('message');
        $user = Auth::user();
        //$cart = collect($cart_raw->id, $card_raw->name, $card_raw->price, $card_raw->options->image);
        //$cart = $cart_raw;
        Cart::session($user->name)->add(array(
                                            'id' => $request->id,
                                            'name' => $request->name,
                                            'price' => $request->price,
                                            'quantity' => 1,
                                            'attributes' => array(
                                                'image' => $request->image
                                            )
                                        ));
        Session::flash('message','Товар был добавлен в вашу корзину');
        $shop = \App\Shop::all();
    	return view('products.productslist',['products'=>$shop]);
    }

    public function delete(Request $request){
        Session::forget('message');
        $user = Auth::user();
        //$cart = collect($cart_raw->id, $card_raw->name, $card_raw->price, $card_raw->options->image);
        Cart::session($user->name)->remove($request->id);
        Session::flash('message','Товар был убран');
        $cart = Cart::session($user->name)->getContent();
    	return view('products.shoppingcart', ['cart'=>$cart]);
    }

    public function proceed(){
        Session::forget('message');
    	$user = Auth::user();
        //$cart = collect($cart_raw->id, $card_raw->name, $card_raw->price, $card_raw->options->image);
    	$cart = Cart::session($user->name)->getContent();
    	if(Cart::session($user->name)->isEmpty()){
            Session::flash('message','Ваша корзина пуста');
            return view('products.shoppingcart', ['cart'=>$cart]);
        }
        foreach($cart as $c){
            \App\Orders::create(['product_name'=>$c->name,
                                 'price'=>$c->price,
                                 'quantity'=>$c->quantity,
                                 'name'=>$user->name,
                                 'email'=>$user->email, 
                                 'phone'=>$user->phone]);
        }
        Cart::session($user->name)->clear();
        $cart = Cart::session($user->name)->getContent();
        Session::flash('message','Спасибо за покупку!');
        return view('products.shoppingcart', ['cart'=>$cart]);
    }

    public function clear(){
        Session::forget('message');
        $user = Auth::user();
        $cart = Cart::session($user->name)->getContent();
        if(Cart::session($user->name)->isEmpty()){
            Session::flash('message','Ваша корзина и так пуста');
            return view('products.shoppingcart', ['cart'=>$cart]);
        }
        //$cart = collect($cart_raw->id, $card_raw->name, $card_raw->price, $card_raw->options->image);
        Cart::session($user->name)->clear();
        $cart = Cart::session($user->name)->getContent();
		Session::flash('message','Ваша корзина была очищена');
    	return view('products.shoppingcart', ['cart'=>$cart]);
    }

}