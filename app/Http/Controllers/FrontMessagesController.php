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
        if(User::checkPermission($user,'change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



        $msgs = FM::all();
        return view('Admin.messages.viewmessages',['msgs' => $msgs]);
    }

    public function addmessage(){
        $user = Auth::user();
        if(User::checkPermission($user,'change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



        return view('Admin.messages.addmessage');
    }


        public function editmsg($id){
        $user = Auth::user();
        if(User::checkPermission($user,'change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }


        if($id == null || empty($id) || !is_numeric($id)){
            return redirect()->back()->with('error','Invalid message id provided.');
        }else {
            $fm = FM::where(['id' => $id]);
            if($fm->count() > 0){
                $fm = $fm->first();
        return view('Admin.messages.editmessage',['msg' => $fm]);

            }else {
            return redirect()->back()->with('error','No such message found to edit.');

            }
        }



    }


    public function editmessagePost(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



        $type = $req->input('message_type');
        $message = $req->input('message');
        $file = $req->file('image');
        $id = $req->input('id');

        if(!is_numeric($type) || empty($type) || empty($message)){
            return redirect()->back()->with('error','None of the fields can be empty.');
        }else {
            $fm = FM::where(['id' => $id]);
            if($fm->count() > 0){

                $fm = $fm->first();
                $fm->message = $message;
                $fm->designation = $type;

        if($req->has('image')){
            $image_name = $file->getClientOriginalName();
            $image_ext = $file->getClientOriginalExtension();
            $image_size = $file->getSize();
            // if($image_size > 20000){

            // return redirect()->back()->with('error','Image must be equal or less than 2MBs. '.$image_size );
            // }else {
            $destinationPath = './messages';
            if($file->move($destinationPath,$image_name)){
                $fm->image = $image_name;
                if($fm->save()){
                    return redirect()->back()->with('success','Message saved');
                }else {
                    return redirect()->back()->with('error','Error occurred in saving the message. Please try again.');
                }
            }
        //}
        }


        if($fm->save()){
            return redirect()->back()->with('success','Message Updated.');
        }else {
            return redirect()->back()->with('error','Error occurred. Try again.');
        }
    }else {
            return redirect()->back()->with('error','No such message found to update.');

    }

    }
    }



    public function addmessagePost(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'change_frontend') == 0){
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
            // if($image_size > 20000){

            // return redirect()->back()->with('error','Image must be equal or less than 2MBs. '.$image_size );
            // }else {
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
        //}
        }else {
            return redirect()->back()->with('error','Image must be provided.');

        }

    }
    }

    public function deletemsg($id){
                $user = Auth::user();
        if(User::checkPermission($user,'change_frontend') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }


        if($id == null || empty($id) || !is_numeric($id)){
            return redirect()->back()->with('error','Invalid message id provided.');
        }else {
            $fm = FM::where(['id' => $id]);
            if($fm->count() > 0){
                $fm = $fm->first();
                if($fm->delete()){
            return redirect()->back()->with('success','Message deleted.');
                }else {
            return redirect()->back()->with('error','Error occurred in deleting the message. Try again.');
                }
            }else {
            return redirect()->back()->with('error','No such message found to delete.');
            }
        }
    }

}
