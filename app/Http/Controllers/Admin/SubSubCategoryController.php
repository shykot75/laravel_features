<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubSubCategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        $subSubCategories = SubSubCategory::with('category', 'subCategory')->latest()->get();
        return view('admin.multi-dependent.sub-subcategory', compact('categories', 'subSubCategories'));
    }

    public function subcategoryFetch($category_id){
        $subcategoryFetch = SubCategory::where('category_id',$category_id)->get();
        return json_encode($subcategoryFetch);
    }

    public function store(Request $request){
        $subSubCategory = new SubSubCategory();
        $subSubCategory->category_id = $request->category_id;
        $subSubCategory->subcategory_id = $request->subcategory_id;
        $subSubCategory->sub_subcategory_name = $request->sub_subcategory_name;
        $subSubCategory->status = $request->status;
        $subSubCategory->save();
        Alert::success('Sub SubCategory Created Successfully..');
        return redirect()->back();
    }





}
