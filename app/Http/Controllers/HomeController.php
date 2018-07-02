<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Size;
use App\Store;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('home');
    }
    public function store(){
        $stores = Store::pluck('area','id');
        $categories = Category::with(['products'=>function($q){
            if(session('store')){
                $q->where('store_id', session('store'));
            }else{
                $q->where('store_id', 1);
            }
        }])->get();
        return view('welcome', compact('stores', 'categories'));
    }
    public function setstore(Request $request){
        session(["store"=> $request->store]);
        return session("store");

    }
    public function addToCart(Request $request){
        $model = Product::with("store")->find($request->id);
        $size = Size::find($request->size);
        Cart::add([
            'id' => $model->id,
            'name' => $model->name,
            'qty' => $request->quantity,
            'price' => $model->price,
            'options' => [
                'size' => $request->size,
                'size_name' => $size->name,
                'store'=>$model->store->area
            ]
        ]);
        return Cart::count();
    }
    public function checkout(){
        $content = Cart::content();
        return view('checkout', compact('content'));
    }
    public function removeFromCart($rowId){
        Cart::remove($rowId);
        return redirect('/checkout');
    }
    public function emptyCart(){
        Cart::destroy();
        return redirect('/');
    }
}
