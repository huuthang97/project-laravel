<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Http\Requests\AddCategoryRequest;
use App\Http\Requests\EditCategoryRequest;


class CategoryController extends Controller
{
    public function getCate(){
        $data['catelist'] = categories::all();
        return view('backend.category',$data);
    }

    public function postCate(AddCategoryRequest $request){
        $category = new categories;
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->save();
        return back();
    }

    public function getEditCate($id){
        $data['category'] = categories::find($id);
        return view('backend.editcategory', $data);
    }

    public function postEditCate(EditCategoryRequest $request, $id){
        $category = categories::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = str_slug($request->name);
        $category->save();
        return redirect('admin/category');
    }

    public function getDeleteCate($id){
        categories::destroy($id);
        return back();
    }
}
