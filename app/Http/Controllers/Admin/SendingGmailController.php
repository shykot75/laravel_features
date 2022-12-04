<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SendGmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class SendingGmailController extends Controller
{
    public function index(){
        return view('admin.send-gmail.index');
    }

    public function store(Request $request){
        $request->validate([
            'to' => 'required|email:rfc,dns',
            'subject' => 'required|min:5|max:255',
            'body'    => 'required| min:5'
        ]);

        try{
            DB::beginTransaction();

            $email = new SendGmail();
            $email->to = $request->to;
            $email->subject = $request->subject;
            $email->body = $request->body;
            $email->save();

            Mail::send('admin.send-gmail.body', ['body' => $request->body], function($message) use($request){
                $message->to($request->to);
                $message->subject($request->subject);
            });

            DB::commit();
            Alert::success('Email Has Sent Successfully..');
            return back();
        }
        catch (\Exception $ex){
            DB::rollBack();
            Alert::error($ex->getMessage());
            return redirect()->back();
        }



    }



}
