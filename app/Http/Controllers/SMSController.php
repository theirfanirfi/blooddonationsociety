<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Http\Models\SMS;
use App\Http\Models\Batch;
use App\Http\Models\BloodGroup as BG;
use App\Http\Models\Department as DPT;
use Auth;
class SMSController extends Controller
{
    //

    public function sendsmsview(){
        $user = Auth::user();
        if(User::checkPermission($user,'send_sms') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }



        $batches = Batch::where(['is_active' => 1])->get();
        $dpts = DPT::all();
        $bgs = BG::all();
        return view('Admin.sms.sendsms',['batches' => $batches,'dpts' => $dpts,'bgs' => $bgs]);
    }

    public function sendsms(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'send_sms') == 0){
            return response()->json([
                'isFound' => false,
                // 'message' => sizeof($users). " : ".$bgs[0]. " : ".$which
                'message' => 'You are not authorized to send sms.'
            ]);
        }



        $bgs = $req->input('bloodgroup');
        $dpt = $req->input('department');
        $batch = $req->input('batch');
        $blood = "";
        $which = "";
        $sql = "select name,id,department,batch,bloodgroup,mobile_no from users ";
        $bloodgroupslength = sizeof($bgs);
        for($i = 0; $i < $bloodgroupslength; $i++){
            if($i != 0 && $i == $bloodgroupslength - 1){
                $blood .= "bloodgroup = '".$bgs[$i]."'";
                $which .= "  if";

            }else if($i == 0 && --$bloodgroupslength == 0) {
                $blood .= "'".$bgs[$i]."'";
                $which .= " else if";
            }else {
            $blood .= "'".$bgs[$i]."'". ' or bloodgroup = ';
            $which .= " else ";

            }
        }
        $sql .="where bloodgroup = ".$blood;
        if($dpt != "all"){
            $sql .= " AND department = '".$dpt."'";
        }

        if($batch != "all"){
            $sql .= " AND batch = '".$batch."'";
        }
        // echo $blood;
        // exit();
        $users = DB::select($sql, [1]);
        if(sizeof($users) > 0){
            return response()->json([
                'donors' => $users,
                'isFound' => true,
                'size' => sizeof($users),

            ]);
        }else {
            return response()->json([
                'isFound' => false,
                // 'message' => sizeof($users). " : ".$bgs[0]. " : ".$which
                'message' => 'No Donor found.'
            ]);
        }

    }

    public function requestsms(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'send_sms') == 0){
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }




$username = "923468723948";///Your Username
$password = "5721";
$mobile = $req->input('mobile'); ///Recepient Mobile Number
//$mobile = '8768';///Recepient Mobile Number
$sender = "JC BDS";
$message = $req->input('msg');
$id = $req->input('id');
$user = User::find($id);
////sending sms

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

if($user->count() > 0){
$s = new SMS();
$s->user_id = $id;
$s->mobile_no = $mobile;
$s->sms_status = $result;
$s->save();
}


/*Print Responce*/
echo $result;
    }


    public function viewSentSMS(){
        $user = Auth::user();

        if(User::checkPermission($user,'send_sms') == 1){
            $s = SMS::getSentSMS()->get();
            return view('Admin.sms.viewsentsms',['sms' => $s]);

        }else {
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }
    }

    public function deleteSMS($id){
        $user = Auth::user();

        if(User::checkPermission($user,'send_sms') == 1){
            $s = SMS::find($id);
            if($s->delete()){
                return redirect()->back()->with('success','Sent SMS record deleted.');
            }else {
                return redirect()->back()->with('error','Error. Please try again.');
            }
            //return view('Admin.sms.viewsentsms',['sms' => $s]);

        }else {
            return redirect('/admin')->with('error','You are not authorized to perform this request.');
            exit();
        }
    }
}
