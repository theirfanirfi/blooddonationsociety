<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Models\Batch;
use App\Http\Models\Department;
use App\Http\Models\Semester;
use App\Http\Models\BloodGroup as BG;
use Auth;
class ProfileController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $batches = Batch::where(['is_active' => 1])->get();
        $dept = Department::all();
        $semesters = Semester::all();
        $bgs = BG::all();
        return view('Admin.profile.profile',['user' => $user,'batches' => $batches,'dpts' => $dept,'semesters' => $semesters,'bgs' => $bgs]);
    }

    public function updateProfile(Request $req){
        $user = Auth::user();
        $name = $req->input('name');
        $fathername = $req->input('fname');
        $address = $req->input('address');
        $email = $req->input('email');
        $rollnumber = $req->input('rollnumber');
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
            $checkEmail = User::where(['email' => $email]);
            if($email !== $user->email && $checkEmail->count() > 0){
            return redirect()->back()->with('error','The email is already taken. please use another one.');
            }else {

                if($req->has('image')){
                    $file = $req->file('image');
                    $image_name = $file->getClientOriginalName();
                    $destination = "./profile";
                    if($file->move($destination,$image_name)){
                        $user->profile_image  = $image_name;
                    }
                }else {
                    //do nothing...
                }

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
                if($user->save()){
                    return redirect()->back()->with('success','Profile Updated Successfully.');
                }else {
                    return redirect()->back()->with('error','Error occurred in updating the donor data. Please try again.');
                }
            }
        }
    }
}
