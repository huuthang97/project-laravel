<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;



class FrontendController extends Controller
{
    public function getHome(){
        $data['featured'] = products::where('prod_featured', '1')->take(8)->get();
        $data['new'] = products::orderBy('id', 'desc')->take(8)->get();
        return view('frontend.home', $data);
    }
}
