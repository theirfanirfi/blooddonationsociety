<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class PassResetSession extends Model
{
    //
    protected $table = "password_reset_sessions";

    public static function checkSession($session){
        $sess = PassResetSession::where(['session_id' => $session]);
        return $sess->count() > 0 ? true : false;
    }
}
