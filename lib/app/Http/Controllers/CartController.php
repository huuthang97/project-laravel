<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Cart;
use Mail;


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

    public function postCart(Request $request){
        $email = $request->email;
        $name = $request->name;
        // dd($email);
        // dd($name);
        $data['cart'] = Cart::content();
        $data['info_customer'] = $request;
        $data['total'] = Cart::total(0, ',');
        Mail::send('frontend.email', $data, function ($message) use($email, $name) {
            $message->from('huuthangk49hce2@gmail.com', 'Yeswin'); 
            $message->to($email, $name);
            // $message->cc('john@johndoe.com', 'John Doe');
            $message->subject('Xác nhận thông tin đơn hàng');
        });
        // Cart::destroy();
        return redirect('complete');
    }

    public function getComplete(){
        return view('frontend.complete');
    }
}