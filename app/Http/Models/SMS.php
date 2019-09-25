<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
use DB;
class SMS extends Model
{
    //
    protected $table = "sms_tbl";

    public static function getSentSMS(){
        $sms = DB::table('sms_tbl')
        ->leftjoin('users',['users.id' => 'sms_tbl.user_id'])
        ->orderby('sms_tbl.id','DESC')
        ->select('users.name','users.mobile_no','sms_tbl.id as sms_id','sms_tbl.*');
        return $sms;
    }
}
