<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
class CategoryController extends Controller
{
    public function getCate(){
        $data['catelist'] = Categories::all();
        return view('backend.category',$data);
    }

    public function getEditCate(){
        return view('backend.editcategory');
    }

    public function getDeleteCate(){
        
    }
}
