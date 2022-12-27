<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CategoryController extends Controller
{

    public function index(){
        $categories = Category::latest()->get();
        return view('admin.multi-dependent.category', compact('categories'));
    }

    public function store(Request $request){

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->status = $request->status;
        $category->save();
        Alert::success('Category Created Successfully..');
        return redirect()->back();
    }














}
