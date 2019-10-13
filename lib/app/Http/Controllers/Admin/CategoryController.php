<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Http\Requests\AddCategoryRequest;


class CategoryController extends Controller
{
    public function getCate(){
        $data['catelist'] = Categories::all();
        return view('backend.category',$data);
    }

    public function postCate(AddCategoryRequest $request){
        $category = new Categories;
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->save();
        return back();
    }

    public function getEditCate(){
        return view('backend.editcategory');
    }

    public function getDeleteCate(){

    }
}
