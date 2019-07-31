<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Models\PassResetSession as PRS;
use Illuminate\Support\Facades\Hash;
class ForgotPasswordController extends Controller
{
    //

    public function fpview(){
        return view('Frontend.forgotpassword.forgotpassenteremail');
    }

    public function initiatepasswordreseting(Request $req){
        $email = $req->input('email');
        if($email == null || $email == "" || empty($email)){
            return redirect()->back()->with('error','Please enter your email address');
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            return redirect()->back()->with('error','Invalid email Address.');
        }else {
            $user = User::where(['email' => $email]);
            if($user->count() > 0){
                $user = $user->first();
                 $user->password_reset_initiated = 1;
                 $user->password_reset_code = rand(0,2000/3)."".rand(0,3000/5);
                 $tg = $user->email.$user->batch.time();
                 $tg = Hash::make($tg);
                 $tg = base64_encode($tg);
                 $user->password_reset_token = $tg;
                 if($user->save()){
                     $session_id = session()->getId();
                     $prs = new PRS();
                     $prs->session_id = $session_id;
                     $prs->user_id = $user->id;
                     if($prs->save()){
                     $mobile = $user->mobile_no;
                     if(empty($mobile) || $mobile == "" || $mobile == null || strlen($mobile) < 11 || strlen($mobile) > 11){
                         return redirect()->back()->with('error','Your mobile number is not saved in the system. Please contact with Admin of the BDS system to save your password and then try again.');
                     }else {
                     $res = $this->sendPasswordResetCodeThroughSMS($user->mobile_no,$user->password_reset_code);
                     $status_code = substr($res,0,1);
                     if($status_code >= 1 && $status_code <= 9){
                        return redirect()->back()->with('error','Your saved mobile number is invalid. Please contact with Admin of the system to reset your mobile number and then try again.');
                     }else {
                         return redirect('/entercode/'.$tg)->with('sucess','Password reset code is sent to you through SMS. Please enter the code and new password.');
                     }
                    }
                }else {
            return redirect()->back()->with('error','Password reset session could not be initiated. Please try again.');

                }
                 }else {

                 }
            }else {
                return redirect()->back()->with('error','No such email exists in the system');
            }
        }
    }

    private function sendPasswordResetCodeThroughSMS($mobile,$code){
        $username = "923468723948";///Your Username
        $password = "5721";
        $sender = "JC BDS";
        $message = "Your password reset code is: ".$code;
        $post = "sender=".urlencode($sender)."&mobile=".urlencode($mobile)."&message=".urlencode($message)."";
        $url = "https://sendpk.com/api/sms.php?username=".$username."&password=".$password."";
        $ch = curl_init();
        $timeout = 10; // set to zero for no timeout
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1)');
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $result = curl_exec($ch);
        return $result;
    }

    public function entercodeview($token){
        $session = session()->getId();
        if(PRS::checkSession($session)){
        if($token == null || $token == "" || is_numeric($token) || empty($token)){
            return redirect('/forgotpassword')->with('error','Invalid argument provided.');
        }else {
            $user = User::where(['password_reset_initiated' => 1, 'password_reset_token' => $token]);
            if($user->count() > 0){
                return view('Frontend.forgotpassword.entercodeandnewpassword',['tk' => $token]);
            }else {
            return redirect('/forgotpassword')->with('error','Invalid argument provided.');
            }
        }
    }else {
        return redirect('/forgotpassword')->with('error','No password reset process is initiated on this computer.');
    }
    }

    public function resetpass(Request $req){
        $code = $req->input('code');
        $newpass = $req->input('new_pas');
        $cpass = $req->input('cpass');
        $token = $req->input('tk');
        if(empty($code)
        || $code == 0 || $code === 0
        || !is_numeric($code) || empty($newpass) || empty($cpass) || empty($token)
    || $token == "" || $token == null || is_numeric($token)){
            return redirect()->back()->with('error','None of the fields can be empty.');
        }else if(strlen($newpass) < 6){
            return redirect()->back()->with('error','Password length must be at least 6 characters long.');
        }else if($newpass !== $cpass){
            return redirect()->back()->with('error','New password and confirm password do not match.');
        }else {
            $user = User::where(['password_reset_initiated' => 1, 'password_reset_code' => $code,'password_reset_token' => $token]);
            if($user->count() > 0){
                $user = $user->first();
                $user->password = Hash::make($newpass);
                $user->password_reset_initiated = 0;
                $user->password_reset_token = 0;
                $user->password_reset_code = 0;
                if($user->save()){
                    $prs = PRS::where(['user_id' => $user->id])->delete();
                    return redirect('/login')->with('success','Password changed. Please login.');
                }else {
                    return redirect('/login')->with('success','Error occurred in reseting the password. Please try again.');
                }
            }else {
            return redirect()->back()->with('error','No password reset request found of the entered details');
            }
        }
    }
}
