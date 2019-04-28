<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;

class AdminPanel extends Controller
{

	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
		$this->middleware('auth');
        if(Gate::allows('isAdmin')){
            return redirect()->route('shop.index');
        }
    }

	//----------------- [ products ] -------------------
	
	public function productsConfig(){
    	$products = \App\Shop::all();
    	$correct = "";
    	return view('adminpanel.products_config',['products'=>$products]);
    }

	public function showProductsAddForm(){ // addPage
    	return view('adminpanel.products_add');
    }

    public function addProducts(Request $request){ //addActiion
		$products = new \App\Shop;
		$products->name = $request->name;
		$products->price = $request->price;
		$path = $request->file('img')->store('images',['disk' => 'upload']);
		$products->image = $path;												
		$products->save();
    	return redirect()->route('products.config');
    }

    public function showProductsDeletePage(){ //deletePage
    	$products = \App\Shop::all();
    	return view('adminpanel.products_delete',['products'=>$products]);
    }

    public function deleteProducts(Request $records) { //deleteAction
        $products = \App\Shop::all();
		$recordsform = $records->input('records');
		
		//------------ Session::flash('message','somestuff')

		if(empty($records->input('records'))){
			return view('adminpanel.products_delete',['products'=>$products]);
		}
		else{
			for ($i=0; $i < count($recordsform); $i++) {
				$products = \App\Shop::all();
				unlink(public_path()."/".$products[$i]->image);
				\App\Shop::destroy($recordsform[$i]);
			}
			return redirect()->route('products.config');
		}
	}
	

	// ----------------------[ orders ]-----------------------------

	public function ordersConfig(){
		$orders = \App\Orders::all();
    	return view('adminpanel.orders_config',['orders'=>$orders]);
    }

	public function showOrdersDeletePage(){ //deletePage
		$orders = \App\Orders::all();
    	return view('adminpanel.orders_delete',['orders'=>$orders]);
    }

    public function deleteOrders(Request $records) { //deleteAction
        $orders = \App\Orders::all();
    	$recordsform = $records->input('records');
		if(empty($records->input('records'))){
			Session::flash('warning','Ничего не выбрано!');
			return view('adminpanel.orders_delete',['orders'=>$orders]);
		}
		else{
			for ($i=0; $i < count($recordsform); $i++) { 
				\App\Orders::destroy($recordsform[$i]);
			}
			return redirect()->route('orders.config');
		}
	}

    // ----------------------[ feedback ]-----------------------------
	
    public function feedbackConfig(){
        $feedback = \App\Feedback::all();
        return view('adminpanel.feedback_config',['feedback' => $feedback]);
    }

    public function showFeedbackDeletePage(){
        $feedback = \App\Feedback::all();
        return view('adminpanel.feedback_delete',['feedback'=>$feedback]);
    }

    public function deleteFeedback(Request $records) {
        $feedback = \App\Feedback::all();
        $recordsform = $records->input('records');
        if(empty($records->input('records'))){
            Session::flash('warning','Ничего не выбрано!');
            return view('adminpanel.feedback_delete', ['feedback'=>$feedback]);
        }
        else{
            for ($i=0; $i < count($recordsform); $i++) { 
                \App\Feedback::destroy($recordsform[$i]);
            }
            return redirect()->route('feedback.config');
        }
    }

}

