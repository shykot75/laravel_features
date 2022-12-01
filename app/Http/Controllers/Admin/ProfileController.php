<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $profile = User::findOrFail($id);
        return view('admin.profile.edit', compact('profile'));
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
        //
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
        //
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
        $profile = User::findOrFail($id);

        $request->validate([
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:3|max:50',
            'email' => 'required|email:rfc,dns|email|unique:users,email,'.$request->user()->id,
            'mobile' => 'required|min:11|max:11|regex:/(01)[0-9]{9}/',
        ]);

        try {
            DB::beginTransaction();

            // IMAGE SECTION
            $image = $request->file('image');
            if($image != null){
                if($profile->image != null){
                    unlink(public_path($profile->image));
                }
               $name = Str::random(5).'.'.$image->getClientOriginalExtension();
               $destinationPath = public_path('/uploads/profile');
                if (!File::exists($destinationPath)) {
                    File::makeDirectory($destinationPath, 0777, true);
                }
                Image::make($image->getRealPath())->resize(200, 200, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$name);
                $destinationPath = 'uploads/profile/';
                $profile->image = $destinationPath.$name;
            }
            // IMAGE SECTION

            $profile->name = $request->name;
            $profile->email = $request->email;
            $profile->mobile = $request->mobile;
            $profile->save();

            DB::commit();
            Alert::success('Admin Profile Updated Successfully..');
            return back();
        }
        catch(\Exception $e){
            DB::rollBack();
            Alert::error($e->getMessage());
            return redirect()->back();
        }

    }

    public function passwordIndex($id){
        $profile = User::findOrFail($id);
        return view('admin.profile.password', compact('profile'));
    }

    public function passwordUpdate(Request $request, $id){

        $profile = User::findOrFail($id);

        $request->validate([
            'current_password' => 'required|min:8|max:25',
            'password' => 'required|min:8|max:25|confirmed',
            'password_confirmation' => 'required|min:8|max:25',
        ],
            [
                'password.required' => 'New password field is required',
                'password.min' => 'New password should at least 8 words long'
            ]);

        try{
            if(Hash::check($request->current_password, $profile->password)){
                $profile->password = bcrypt($request->password);
                $profile->save();
                Auth::logout();
                return redirect()->route('admin.login');
            }
            else {
                Alert::warning('Your Current Password Do not Matched!!');
                return redirect()->back();
            }
        }
        catch (Exception $ex){
            Alert::error($ex->getMessage());
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
        //
    }
}
