<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Models\FrontMessages as FM;
use App\User;
class FrontMessagesController extends Controller
{
    //

    public function index(){
        $user = Auth::user();
        if(User::checkPermission($user,'can_change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



        $msgs = FM::all();
        return view('Admin.messages.viewmessages',['msgs' => $msgs]);
    }

    public function addmessage(){
        $user = Auth::user();
        if(User::checkPermission($user,'can_change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



        return view('Admin.messages.addmessage');
    }

    public function addmessagePost(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'can_change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



        $type = $req->input('message_type');
        $message = $req->input('message');
        $file = $req->file('image');

        if(!is_numeric($type) || empty($type) || empty($message)){
            return redirect()->back()->with('error','None of the fields can be empty.');
        }else {
        if($req->has('image')){
            $image_name = $file->getClientOriginalName();
            $image_ext = $file->getClientOriginalExtension();
            $image_size = $file->getSize();
            if($image_size > 20000){

            return redirect()->back()->with('error','Image must be equal or less than 2MBs. '.$image_size );
            }else {
            $destinationPath = './messages';
            if($file->move($destinationPath,$image_name)){
                $fm = new FM();
                $fm->designation = $type;
                $fm->image = $image_name;
                $fm->message=$message;
                if($fm->save()){
                    return redirect()->back()->with('success','Message saved');
                }else {
                    return redirect()->back()->with('error','Error occurred in saving the message. Please try again.');
                }
            }
        }
        }else {
            return redirect()->back()->with('error','Image must be provided.');

        }

    }
    }

}
