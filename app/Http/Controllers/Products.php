<?php


//          view обращается к пути файла
//          route к имени в web.php


namespace App\Http\Controllers;

use Cart;
use Session;
use Illuminate\Http\Request;

class Products extends Controller
{
    public function __construct(Request $request)
    {
		Session::forget('message');
    }

    public function index(){  // main page
        $products = \App\Shop::all()->take(3);
        return view('products.index',['products'=>$products]);
    }
    public function productsList(){ // страница с продуктами
    	$products = \App\Shop::paginate(3);
    	return view('products.productslist',['products'=>$products]);
    }

    public function showProduct($id){ // просмотр выбранного товара
    	$products = \App\Shop::find((int)$id);
    	return view('products.showproduct',['products'=>$products]);
    }

    public function showFeedbackAddForm(){  
        return view('products.feedback');
    }

    public function addFeedback(Request $request){ //addActiion
        $products = \App\Feedback::create($request->all());
        return redirect()->route('products.index');
    }

    public function about(){
        return view('products.about');
    }

    public function blog(){
        return view('products.blog');
    }

}
