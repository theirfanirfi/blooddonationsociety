<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Illuminate\Support\Facades\Hash;
class AuthenticationController extends Controller
{
    //

    public function signup(Request $req){
        $name = $req->input('fullname');
        $fathername = $req->input('fathername');
        $address = $req->input('address');
        $email = $req->input('email');
        $rollnumber = $req->input('rollnumber');
        $pass = $req->input('pass');
        $confirm_pass = $req->input('confirm_pass');
        $phone = $req->input('phone');
        $blood_group = $req->input('blood_group');
        $batch = $req->input('batch');
        $department = $req->input('department');
        $semester = $req->input('semester');

        if(empty($name) || empty($fathername) || empty($address) || empty($email) || empty($rollnumber) ||
        empty($pass) || empty($confirm_pass) || empty($phone) || empty($blood_group) || empty($batch) || empty($department) ||
        empty($semester)){
            return redirect()->back()->with('error','None of the fields can be empty.');
        }else if(!is_numeric($rollnumber)){
            return redirect()->back()->with('error','Roll number must be in digits. e.g. 1561122');
        }else if(!is_numeric($phone)){
            return redirect()->back()->with('error','Phone number must be in digits. e.g. 03461234567');
        }else if(strlen($pass) < 6 || strlen($confirm_pass) < 6){
            return redirect()->back()->with('error','Password length must be atleast 6 characters long.');
        }
        else if($pass !== $confirm_pass){
            return redirect()->back()->with('error','Password and Confirm password mismatched.');
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
                    return redirect()->back()->with('success','registeration successfull.');
                }else {
                    return redirect()->back()->with('error','Error occurred in saving the data. Please try again.');
                }
            }
        }
    }

    public function loginpost(Request $req){
        $email = $req->input('email');
        $pass = $req->input('pass');
        if(empty($pass) || empty($email)) {
            return redirect()->back()->with('error','None of the fields can be empty.');
        }else {
            $checkEmail = User::where(['email' => $email]);
            if($checkEmail->count() == 0){
            return redirect()->back()->with('error','Invalid credentials.');
            }else {
                if(Auth::attempt(['email' => $email, 'password' => $pass])){
                    //go to dashboard
                    $user = Auth::user();
                    if($user->is_admin_group == 1){
                       return redirect('/admin/');
                    }else if($user->is_donor == 1){
                        return redirect('/');
                    }else if($user->is_super_admin){
                        return redirect('/admin/');
                    }else {
                    return redirect()->back()->with('error','No redirection page found.');
                    }
                }else {
                    return redirect()->back()->with('error','Invalid credentials.');
                }
            }
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function changepass(Request $req){
        $cpass = $req->input('cpass');
        $new_pass = $req->input('new_pass');
        $confirm_pass = $req->input('confirm_pass');
        if(empty($cpass) || empty($new_pass) || empty($confirm_pass)) {
            return redirect()->back()->with('error','None of the fields can be empty.');
        }else if(strlen($new_pass) < 6 || strlen($confirm_pass) < 6){
            return redirect()->back()->with('error','Password length must be atleast 6 characters long.');
        }
        else if($new_pass !== $confirm_pass){
            return redirect()->back()->with('error','Password and Confirm password mismatched.');
        }else {
            $user = Auth::user();
            if(Hash::check($cpass, $user->password)){
                $user->password = Hash::make($new_pass);
                if($user->save()){
            return redirect()->back()->with('success','Password Changed.');

                }else {
            return redirect()->back()->with('error','Error occurred in saving the new password. Please try again.');
                }
            }else {
            return redirect()->back()->with('error','Wrong current password entered.');
            }
        }
    }
}
