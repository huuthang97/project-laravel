<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Cart;



class CartController extends Controller
{
    public function getAddCart($id){
        $product = products::find($id);
        Cart::add([
            ['id' => $id, 'name' => $product->prod_name, 'qty' => 1, 'price' => $product->prod_price, 'weight' => 550, 'options' => ['img' => $product->prod_img]]
          ]);
        return redirect('cart/gio-hang.html');
        
    }

    public function getShowCart(){
        return view('frontend.cart');
        
    }

    public function getDeleteCart($rowId){
        if($rowId == 'all'){
            Cart::destroy();
        }else{
            Cart::remove($rowId);
        }
        return back();
    }

    public function getUpdateCart(Request $request){
        Cart::update($request->rowId, $request->qty);
    }
}