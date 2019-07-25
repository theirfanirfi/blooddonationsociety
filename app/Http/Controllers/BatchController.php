<?php

namespace App\Http\Controllers;
use App\Http\Models\Batch;
use Illuminate\Http\Request;
use App\User;
use Auth;
class BatchController extends Controller
{
    //
    public function batches(){
        $user = Auth::user();
        if(User::checkPermission($user,'can_batches') == 0){
            return redirect('/admin')->with('error','You are not authorized to view the intended page');
            exit();
        }


        $batch=Batch::all();
        return view('Admin.batches.addbatch',compact('batch'));
    }

    public function addBatch(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'can_batches') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform the request.');
            exit();
        }


        $batch_name=$req->input('batch_name');
        if(empty($batch_name)){
         return redirect()->back()->with('error','None of the fields can be empty.');
                      }else{
                         $checkBatch = Batch::where(['batch' => $batch_name]);
                         if($checkBatch->count() > 0){
                             return redirect()->back()->with('error','The  Batch is already added.');
                             }else {
                             $batch=new Batch();
                              $batch->batch=$batch_name;
                              if($batch->save()){
                                 return redirect()->back()->with('success','Batch Added.');
                             }else {
                                 return redirect()->back()->with('error','Error occurred in saving the Batch data. Please try again.');
                             }
                             }
                      }
    }
    public function deleteBatch($id){
        $user = Auth::user();
        if(User::checkPermission($user,'can_batches') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform the request');
            exit();
        }


     $deleteBatch=Batch::find($id);
     $deleteBatch->delete();
     return redirect()->back()->with('danger','Batch Deleted Successfully.');
    }
    public function editBatch($id){
        $user = Auth::user();
        if(User::checkPermission($user,'can_batches') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform the request');
            exit();
        }


        $Edit=Batch::find($id);
      return view('Admin.batches.editBatch',compact('Edit'));
    }
    public function BatchEdit(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'can_batches') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform the request');
            exit();
        }


        $batch_name=$req->input('batch_name');
        $batch_id=$req->input('batch_id');
        if(empty($batch_name)){
         return redirect()->back()->with('error','None of the fields can be empty.');
                      }else{
                         $checkBatch = Batch::where(['batch' => $batch_name]);
                         if($checkBatch->count() > 0){
                             return redirect()->back()->with('error','The  Batch is already added.');
                             }else {
                             $batch=Batch::find($batch_id);
                              $batch->batch=$batch_name;
                              if($batch->save()){
                                 return redirect()->back()->with('success','Batch Updated.');
                             }else {
                                 return redirect()->back()->with('error','Error occurred in saving the Batch. Please try again.');
                             }
                             }
                      }
    }
}
