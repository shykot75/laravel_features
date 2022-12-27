<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SubCategoryController extends Controller
{
    public function index(){
        $subCategories = SubCategory::with('category')->latest()->get();
//dd($subCategories);
        $categories = Category::all();
        return view('admin.multi-dependent.sub-category', compact('subCategories', 'categories'));
    }

    public function store(Request $request){

        $subCategory = new SubCategory();
        $subCategory->category_id = $request->category_id;
        $subCategory->subcategory_name = $request->subcategory_name;
        $subCategory->status = $request->status;
        $subCategory->save();
        Alert::success('SubCategory Created Successfully..');
        return redirect()->back();
    }
}
