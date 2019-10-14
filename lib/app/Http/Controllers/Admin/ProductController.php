<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddProductRequest;
use App\Models\Categories;
use App\Models\Products;
use DB;

class ProductController extends Controller
{
    public function getProduct(){
        $data['list_products'] = DB::table('products')->join('categories','products.cate_id', '=', 'categories.id')->get();
        return view('backend.product', $data);
    }

    public function postProduct(){
        
    }

    public function getAddProduct(){
        $data['list_cate'] = categories::all();
        return view('backend.addproduct', $data);
    }

    public function postAddProduct(AddProductRequest $request){
        $filename = $request->img->getClientOriginalName();
        $product = new products;
        $product->prod_name = $request->name ;
        $product->prod_slug = str_slug($request->name);
        $product->prod_price = $request->price ;
        $product->prod_img = $filename ;
        $product->prod_accessories = $request->accessories ;
        $product->prod_warranty = $request->warranty ;
        $product->prod_promotion = $request->promotion ;
        $product->prod_condition = $request->condition ;
        $product->prod_status = $request->status ;
        $product->prod_desc = $request->description ;
        $product->cate_id = $request->cate ;
        $product->prod_featured = $request->featured ; 
        $product->save();
        $request->img->storeAs('avatar', $filename) ;
        return back();
        
    }

    public function getEditProduct(){
        return view('backend.editproduct');
    }

    public function postEditProduct(){
        
    }

    public function getDeleteProduct(){
        
    }
}
