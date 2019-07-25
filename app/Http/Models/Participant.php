<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\User;
use App\Http\Models\Chat;
class Participant extends Model
{
    //
    protected $table = "participants";

    public static function getParticipantAndItsChatIfExist($session_id){
        return Participant::where(['user_id' => $session_id])
        ->leftjoin('chat',['chat.p_id' => 'participants.id']);
    }

    public static function getParticipants($session_id){
        $pt = Participant::where(['user_id' => $session_id]);
        return $pt->count() > 0 ? $pt->first() : false;
    }

    public static function getAdminParticipants($admin_id){
        return Participant::where(['admin_id' => $admin_id]);
    }

    public function getParticipantName(){
        $user = User::where(['id' => $this->user_id]);
        if($user->count() > 0){
            return $user->first()->name;
        }else {
            return Participant::where(['id' => $this->id])->first()->user_id;
        }
    }

    public static function getUnAttendedChats(){
        return Participant::where(['admin_id' => 0]);
    }

    public function getLastMessage(){
        return Chat::where(['p_id' => $this->id])->orderBy('id','DESC')->first()->message;
    }

    public static function getParticipantId($id){
       return Participant::where(['id' => $id])->first()->user_id;
    }

    public static function getNonLoggedInParticipantMessages($sid){
        return Participant::where(['user_id' => $sid])
        ->leftjoin('chat',['chat.p_id' => 'participants.id']);
    }

    public static function getChatWithCurrentUserForAdmin($pid,$user_id){
        return Chat::where(['p_id' => $pid,'reciever_id' => $user_id])->orWhere(['p_id' => $pid,'sender_id' => $user_id]);
    }
}
