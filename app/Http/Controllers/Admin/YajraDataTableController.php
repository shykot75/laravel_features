<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\YajraDataTable;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;


class YajraDataTableController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $data = YajraDataTable::select('id','name','email','phone')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    $btn   = '<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" name="edit" value="'.$data->id.'" class="mx-2 edit btn btn-primary btn-sm">Edit</button>';
                    $btn  .= '<button type="button" data-bs-toggle="modal" data-bs-target="#exampleModalDelete" name="delete" value="'.$data->id.'" class="mx-2 delete btn btn-danger btn-sm">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.yajra.index');
    }

    public function store(Request $request){
        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:3|max:50',
            'email' => 'required|email:rfc,dns|email|unique:yajra_data_tables,email',
//            'phone' => 'required|min:11|max:11|regex:/(01)[0-9]{9}/',
            'phone' => 'required|min:11|max:11',
            'address' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
        ]);

        try {
            DB::beginTransaction();

            // IMAGE SECTION
            $image = $request->file('image');
            if($image != null){

                $name = Str::random(5).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/yajra-image');
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0777, true);
                }
                Image::make($image->getRealPath())->resize(200, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$name);
                $destinationPath = 'uploads/yajra-image/';
            }
            // IMAGE SECTION

            $yajra = new YajraDataTable();
            $yajra->name = $request->name;
            $yajra->email = $request->email;
            $yajra->phone = $request->phone;
            $yajra->address = $request->address;
            $yajra->description = $request->description;
            if($request->image != null){
                $yajra->image = $destinationPath.$name;
            }
            $yajra->save();

            DB::commit();
            Alert::success('Yajra Data Created Successfully..');
            return back();
        }
        catch(\Exception $e){
            DB::rollBack();
            Alert::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function edit($id){
            $yajra = YajraDataTable::findOrFail($id);
//            return view('admin.yajra.edit', compact('yajra'));
//            return $yajra;
            $view = View::make('admin.yajra.edit', compact('yajra'))->render();
            return response()->json(['html' => $view]);
    }

    public function update(Request $request, $id){
        $yajra = YajraDataTable::findOrFail($id);

        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:yajra_data_tables,email,'.$yajra->id,
            'phone' => 'required|min:10|max:11',
            'address' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255',
        ]);

        try {
            DB::beginTransaction();

            // IMAGE SECTION
            $image = $request->file('image');
            if($image != null){
                if($yajra->image != null){
                    unlink(public_path($yajra->image));
                }
                $name = Str::random(5).'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/yajra-image');
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0777, true);
                }
                Image::make($image->getRealPath())->resize(200, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$name);
                $destinationPath = 'uploads/yajra-image/';
                $yajra->image = $destinationPath.$name;
            }
            // IMAGE SECTION

            $yajra->name = $request->name;
            $yajra->email = $request->email;
            $yajra->phone = $request->phone;
            $yajra->address = $request->address;
            $yajra->description = $request->description;
            $yajra->save();
            DB::commit();
            Alert::success('Yajra Data Updated Successfully..');
            return back();
        }
        catch(\Exception $e){
            DB::rollBack();
            Alert::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function destroy($id){
        $yajra = YajraDataTable::findOrFail($id);
        $view = View::make('admin.yajra.delete', compact('yajra'))->render();
        return response()->json(['html' => $view]);
    }

    public function destroyConfirm(Request $request, $id){
        $yajra = YajraDataTable::findOrFail($id);
        $yajra->delete();
        Alert::success('Yajra Data Deleted Successfully..');
        return redirect()->back();
    }

}
