<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Batch;
use App\Http\Models\Department as Dpt;
use App\Http\Models\Semester;
use App\Http\Models\BloodGroup as BG;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
class DonorController extends Controller
{
    //

    public function adddonorview(){
        $user = Auth::user();
        if(User::checkPermission($user,'add_donor') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }


        $dpts = Dpt::all();
        $batches = Batch::where(['is_active' => 1])->get();
        $semesters = Semester::all();
        $bgs = BG::all();
        return view('Admin.donor.adddonor',['dpts' => $dpts,'batches' => $batches,'semesters' => $semesters,'bgs' => $bgs]);
    }

    public function viewdonors(){
        $user = User::where(['is_donor' => 1])->get();
        $loggedInUser = Auth::user();
        return view('Admin.donor.viewdonors',compact('user','loggedInUser'));
    }

    public function adddonor(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'add_donor') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }




        $name = $req->input('fullname');
        $fathername = $req->input('fathername');
        $address = $req->input('address');
        $email = $req->input('email');
        $rollnumber = $req->input('rollnumber');
        $pass = $req->input('password');
        // $confirm_pass = $req->input('confirm_pass');
        $phone = $req->input('phone');
        $blood_group = $req->input('blood_group');
        $batch = $req->input('batch');
        $department = $req->input('department');
        $semester = $req->input('semester');

        if(empty($name) || empty($fathername) || empty($address) || empty($email) || empty($rollnumber) ||
        empty($pass) || empty($phone) || empty($blood_group) || empty($batch) || empty($department) ||
        empty($semester)){
            return redirect()->back()->with('error','None of the fields can be empty.');
        }else if(!is_numeric($rollnumber)){
            return redirect()->back()->with('error','Roll number must be in digits. e.g. 1561122');
        }else if(!is_numeric($phone)){
            return redirect()->back()->with('error','Phone number must be in digits. e.g. 03461234567');
        }else if(strlen($pass) < 6){
            return redirect()->back()->with('error','Password length must be atleast 6 characters long.');
        }
        else {
            $checkEmail = User::where(['email' => $email]);
            if($checkEmail->count() > 0){
            return redirect()->back()->with('error','The email is already taken. please use another one.');
            }else {
                $user = new User();
                $user->name = $name;
                $user->fname = $fathername;
                $user->address = $address;
                $user->email = $email;
                $user->batch = $batch;
                $user->department = $department;
                $user->semester = $semester;
                $user->bloodgroup = $blood_group;
                $user->mobile_no = $phone;
                $user->rollnumber = $rollnumber;
                $user->is_donor = 1;
                $user->password = Hash::make($pass);

                if($user->save()){
                    return redirect()->back()->with('success','Donor Added. \n
                    Login Details: \n
                    Email: '.$email.' \n
                    Password: '.$pass);
                }else {
                    return redirect()->back()->with('error','Error occurred in saving the donor data. Please try again.');
                }
            }
        }
    }

    public function deleteDonor($id){

                $user = Auth::user();
        if(User::checkPermission($user,'delete_donor') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



       $delteDonor=User::where(['id' => $id]);
       if($delteDonor->count() > 0){
        $delteDonor = $delteDonor->first();
       if($user->id == $delteDonor->id){
       return redirect()->back()->with('error','You cannot delete your account.');
       }else {
        $delteDonor->delete();
       return redirect()->back()->with('success','Donor Deleted Successfully.');
       }
   }else{
       return redirect()->back()->with('error','No such user found to delete.');
   }

    }
    public function EditDonor($id){
        $user = Auth::user();
        if(User::checkPermission($user,'edit_donor') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }


      $Donor=User::find($id);
      $dpts = Dpt::all();
        $batches = Batch::where(['is_active' => 1])->get();
        $semesters = Semester::all();
        $bgs = BG::all();
      return view('Admin.donor.editDonor',['Donor'=>$Donor,'dpts' => $dpts,'batches' => $batches,'semesters' => $semesters,'bgs' => $bgs]);
    }

    public function AddEditDonorData(Request $req){


        $userr = Auth::user();
        if(User::checkPermission($userr,'edit_donor') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }


        $id = $req->input('id');
        $name = $req->input('fullname');
        $fathername = $req->input('fathername');
        $address = $req->input('address');
        $email = $req->input('email');
        $rollnumber = $req->input('rollnumber');
        // $confirm_pass = $req->input('confirm_pass');
        $phone = $req->input('phone');
        $blood_group = $req->input('blood_group');
        $batch = $req->input('batch');
        $department = $req->input('department');
        $semester = $req->input('semester');

        if(empty($name) || empty($fathername) || empty($address) || empty($email) || empty($rollnumber) || empty($phone) || empty($blood_group) || empty($batch) || empty($department) ||
        empty($semester)){
            return redirect()->back()->with('error','None of the fields can be empty.');
        }else if(!is_numeric($rollnumber)){
            return redirect()->back()->with('error','Roll number must be in digits. e.g. 1561122');
        }else if(!is_numeric($phone)){
            return redirect()->back()->with('error','Phone number must be in digits. e.g. 03461234567');
        }
        else {

                $user =User::find($id);
                $user->name = $name;
                $user->fname = $fathername;
                $user->address = $address;

if($email != $user->email){
                $checkEmail = User::where(['email' => $email]);
            if($checkEmail->count() > 0){
            return redirect()->back()->with('error','The email is already taken. please use another one.');
            }else {
                $user->email = $email;
            }
            }


                $user->batch = $batch;
                $user->department = $department;
                $user->semester = $semester;
                $user->bloodgroup = $blood_group;
                $user->mobile_no = $phone;
                $user->rollnumber = $rollnumber;
                $user->is_donor = 1;

                if($user->save()){
                    return redirect()->back()->with('success','Donor Updated Successfully.');
                }else {
                    return redirect()->back()->with('error','Error occurred in updating the donor data. Please try again.');
                }
            
        }
    }

    public function viewDonor($id){
        $loggedInUser = Auth::user();
        $Id = User::find($id);
        return view('Admin.donor.donorProfile',compact('Id','loggedInUser'));
    }
}
