<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DependentSelectBox;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class MultiDependentExample extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('status',1)->get();
        $selectboxs = DependentSelectBox::with('category', 'subCategory', 'subSubCategory')->latest()->get();
        return view('admin.multi-dependent.example', compact('categories', 'selectboxs'));
    }

    public function subSubcategoryFetch($subcategory_id){
        $subSubcategoryFetch = SubSubCategory::where('subcategory_id',$subcategory_id)->get();
        return json_encode($subSubcategoryFetch);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'sub_subcategory_id' => 'required',
            'name' => 'required|min:3|max:50',
            'tags' => 'required',
            'status' => 'required',
        ], [
            'category_id.required' => 'Select a Category Please!',
            'subcategory_id.required' => 'Select a Sub Category Please!',
            'sub_subcategory_id.required' => 'Select a Sub SubCategory Please!',
            'name.required' => 'Give a Name',
            'tags.required' => 'Give One or Multiple Tags',
            'status.required' => 'Select Status',
        ]);

        try{
            DB::beginTransaction();

            $selectbox = new DependentSelectBox();
            $selectbox->category_id = $request->category_id;
            $selectbox->subcategory_id = $request->subcategory_id;
            $selectbox->sub_subcategory_id = $request->sub_subcategory_id;
            $selectbox->name = $request->name;
            $selectbox->tags = json_encode($request->tags);
            $selectbox->status = $request->status;
            $selectbox->save();
            DB::commit();
            Alert::success('Dependent Selectbox Created Successfully..');
            return redirect()->route('all.selectbox');
        }
        catch(\Exception $e){
            DB::rollBack();
            Alert::error($e->getMessage());
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $selectbox = DependentSelectBox::with('category', 'subCategory', 'subSubCategory')->findOrFail($id);
        $selectboxs = DependentSelectBox::with('category', 'subCategory', 'subSubCategory')->latest()->get();

        $categories = Category::where('status',1)->get();
        $subcategories = SubCategory::where('status',1)->where('category_id',$selectbox->category_id)->get();
        $subSubCategories = SubSubCategory::where('status',1)->where('subcategory_id',$selectbox->subcategory_id)->get();

        return view('admin.multi-dependent.example', compact('categories','subcategories', 'subSubCategories','selectboxs','selectbox'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'sub_subcategory_id' => 'required',
            'name' => 'required|min:3|max:50',
            'tags' => 'required',
            'status' => 'required',
        ], [
            'category_id.required' => 'Select a Category Please!',
            'subcategory_id.required' => 'Select a Sub Category Please!',
            'sub_subcategory_id.required' => 'Select a Sub SubCategory Please!',
            'name.required' => 'Give a Name',
            'tags.required' => 'Give One or Multiple Tags',
            'status.required' => 'Select Status',
        ]);
        $selectbox = DependentSelectBox::with('category', 'subCategory', 'subSubCategory')->findOrFail($id);
        try{
            DB::beginTransaction();

            $selectbox->category_id = $request->category_id;
            $selectbox->subcategory_id = $request->subcategory_id;
            $selectbox->sub_subcategory_id = $request->sub_subcategory_id;
            $selectbox->name = $request->name;
            $selectbox->tags = json_encode($request->tags);
            $selectbox->status = $request->status;
            $selectbox->save();
            DB::commit();
            Alert::success('Dependent Selectbox Updated Successfully..');
            return redirect()->route('all.selectbox');
        }
        catch(\Exception $e){
            DB::rollBack();
            Alert::error($e->getMessage());
            return redirect()->back();
        }




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $selectbox = DependentSelectBox::findOrFail($id);
        $selectbox->delete();
        Alert::success('Dependent Selectbox Deleted Successfully..');
        return redirect()->route('all.selectbox');

    }
}
