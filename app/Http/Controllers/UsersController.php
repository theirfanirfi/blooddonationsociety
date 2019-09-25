<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    public function usersPage(){
        $loggedInUser = Auth::user();
        if(User::checkPermission($loggedInUser,'promote_user') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }




        $users=User::where(['is_admin_group' => 1])->get();

        return view('Admin.users.users',compact('users','loggedInUser'));
    }

    public function promoteuser(Request $req){
        $loggedInUser = Auth::user();
        if(User::checkPermission($loggedInUser,'promote_user') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }





        $donor_id = $req->input('donor_id');
        $adddonor = empty($req->input('adddonor')) ? 0: 1;
        $editdonor = empty($req->input('editdonor')) ? 0: 1;
        $deletedonor = empty($req->input('deletedonor')) ? 0: 1;
        $promoteuser = empty($req->input('promoteuser')) ? 0: 1;
        $answerchat = empty($req->input('answerchat')) ? 0: 1;
        $addpost = empty($req->input('addpost')) ? 0: 1;
        $editpost = empty($req->input('editpost')) ? 0: 1;
        $deletepost = empty($req->input('deletepost')) ? 0: 1;

        $sendsms = empty($req->input('sendsms')) ? 0: 1;
        $department = empty($req->input('department')) ? 0: 1;
        $batch = empty($req->input('batch')) ? 0: 1;
        $frontend = empty($req->input('frontend')) ? 0: 1;


        $user = User::where(['id' => $donor_id, 'is_donor' => 1]);
        if($user->count() > 0){
            $user = $user->first();
            $user->can_add_donor = $adddonor;
            $user->can_delete_donors = $deletedonor;
            $user->can_edit_donors = $editdonor;
            $user->can_send_sms = $sendsms;
            $user->can_promote_users = $promoteuser;
            $user->can_answer_chat = $answerchat;
            $user->can_departments = $department;
            $user->can_batches = $batch;
            $user->can_add_post = $addpost;
            $user->can_edit_post = $editpost;
            $user->can_delete_post = $deletepost;
            $user->can_change_frontend = $frontend;
            $user->is_donor = 0;

            if($adddonor == 1 || $deletedonor == 1 || $editdonor == 1 || $sendsms == 1 || $promoteuser == 1 || $answerchat == 1 ||
            $department == 1 || $batch == 1 || $addpost == 1 || $editpost == 1 || $deletepost == 1 || $frontend == 1){
            $user->is_admin_group = 1;
            }else {
            return redirect()->back()->with('error','Cannot be promoted. No roles assigned.');
            }

            if($user->save()){
            return redirect()->back()->with('success','Donor promoted to Admin Group.');
            }else {
            return redirect()->back()->with('error','Error occurred in promoting the donor.');
            }
        }else {
            return redirect()->back()->with('error','No such user exists in the system.');
        }
    }

    public function demoteuser($id){
        $loggedInUser = Auth::user();
        if(User::checkPermission($loggedInUser,'promote_user') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }

if($loggedInUser->id != $id){
        if($id == null || !is_numeric($id)){
            return redirect()->back()->with('error','Invalid user Id supplied.');
        }else {
            $user = User::where(['id' => $id]);
            if($user->count() > 0){

                $user = $user->first();
                $user->can_add_donor = 0;
                $user->can_delete_donors = 0;
                $user->can_edit_donors = 0;
                $user->can_send_sms = 0;
                $user->can_promote_users = 0;
                $user->can_answer_chat = 0;
                $user->can_departments = 0;
                $user->can_batches = 0;
                $user->can_add_post = 0;
                $user->can_edit_post = 0;
                $user->can_delete_post = 0;
                $user->can_change_frontend = 0;
                $user->is_admin_group = 0;
                $user->is_donor = 1;

                if($user->save()){
                    return redirect()->back()->with('success','Admin Demoted.');
                    }else {
                    return redirect()->back()->with('error','Error occurred in demoting the donor.');
                    }
            }else {
            return redirect()->back()->with('error','No such user exists in the system.');

            }
        }
    }else {
            return redirect()->back()->with('error','You cannot demote your account.');
    }
    }
}
