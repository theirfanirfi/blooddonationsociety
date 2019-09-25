<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Models\Participant as pt;
use App\Http\Models\Chat;
use App\Http\Models\Participant;
use App\User;
class ChatController extends Controller
{
    //

    public function chatFromFrontEnd(Request $req){
        $message = $req->input('message');
        $sid = '';
        $send_to_admin_id = 0;
        if(Auth::check()){
            $user = Auth::user();
            $sid = $user->is_super_admin == 1 || $user->is_admin_group == 1 ? session()->getId() : $user->id;
        }else {
            $sid = session()->getId();
        }

        //check is it the first time
        $par = pt::getParticipants($sid);

        if($par){
            $send_to_admin_id = $par->admin_id;
            $chat = new Chat();
            $chat->sender_id = $par->user_id;
            $chat->reciever_id = $send_to_admin_id;
            $chat->p_id = $par->id;
            $chat->message = $message;
            if($chat->save()){
                $chats = Chat::where(['sender_id' => $sid])->orWhere(['reciever_id' => $sid]);
                return response()->json([
                    'isError' => false,
                    'isSent' => true,
                    'html' => $this->returnChats($chats,$sid),
                    'message' => 'Message sent. '.$chats->count()
                ]);
            }else {
                return response()->json([
                    'isError' => true,
                    'message' => 'Message could not be sent. Please try again.'
                ]);
            }
        }else {
            $send_to_admin_id = 0;
            $pt = new pt();
            $pt->user_id = $sid;
           // $pt->admin_id = 0;

            if($pt->save()){
                $chat = new Chat();
                $chat->sender_id = $sid;
                $chat->reciever_id = 0;
                $chat->p_id = $pt->id;
                $chat->message = $message;
                if($chat->save()){
                    $chats = Chat::where(['sender_id' => $sid])->orWhere(['reciever_id' => $sid]);
                    return response()->json([
                        'isError' => false,
                        'isSent' => true,
                        'html' => $this->returnChats($chats,$sid),
                        'message' => 'Message sent. '.$chats->count()
                    ]);
                }else {
                    return response()->json([
                        'isError' => true,
                        'message' => 'Message could not be sent. Please try again.'
                    ]);
                }

            }else {
                return response()->json([
                    'isError' => true,
                    'message' => 'Error occurred, please try again.'
                ]);
            }
        }


    }

    private function returnChats($chat,$sid){
        $msg = '';
        if($chat->count() > 0){
     $chat = $chat->get();
        foreach ($chat as $c)
            if($c->sender_id === $sid){
            $msg .= "<div class='row msg_container base_sent'>
                    <div class='col-md-10 col-xs-10'>
                        <div class='messages msg_sent'>
                        <p>{$c->message}</p>
                        <time datetime='2009-11-13T20:00'>{$c->created_at}</time>
                        </div>
                    </div>
                    <div class='col-md-2 col-xs-2 avatar'>
                        <img src='http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg' class='img img-responsive '>
                    </div>
                </div>";
            }else {


      $msg .= "<div class='row msg_container base_receive'>
                <div class='col-md-2 col-xs-2 avatar'>
                    <img src='http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg' class='img img-responsive '>
                </div>
                <div class='col-xs-10 col-md-10'>
                    <div class='messages msg_receive'>
                        <p>{$c->message}</p>
                        <time datetime='2009-11-13T20:00'>{$c->created_at}</time>
                    </div>
                </div>
            </div>";
            }
        }else {
           $msg .= '<h3>Please contact us</h3>';

        }
        return $msg;

    }


    public function mychats($id){
        $user = Auth::user();
        if(User::checkPermission($user,'answer_chat') == 0){
            return redirect('/admin')->with('error','You are not authorized to view the intended page');
            exit();
        }



        $participant = pt::where(['id' => $id]);
        if($id == null || !is_numeric($id) || $participant->count() == 0){
            return redirect()->back()->with('error','Invalid Arguments passed.');
        }else {
            $par = $participant->first();
            if($par->admin_id == 0){
            $par->admin_id = $user->id;
            if($par->save()){
            $chats = Chat::where(['p_id' => $par->id]);
            // $chats->update(['reciever_id' => $user->id]);
            // echo "update";
            // exit();
            if($chats->update(['reciever_id' => $user->id])){
                $chats = Chat::where(['p_id' => $par->id]);
            return view('Admin.Chat.chatboard',['chats' => $chats,'user' => $user,'id' => $par->id]);
            }else {
                return redirect()->back()->with('error',"The system couldn't process the request. Please try again");
            }
            }else {
                return redirect()->back()->with('error',"The system couldn't process the request. Please try again");
            }
        }else {

            $chats = Chat::where(['p_id' => $par->id]);
            return view('Admin.Chat.chatboard',['chats' => $chats,'user' => $user,'id' => $par->id]);
        }
        }

    }

    public function sendmsg(Request $req){
        $user = Auth::user();
        if(User::checkPermission($user,'answer_chat') == 0){
            return response()->json([
                'isError' => true,
                'isSent' => false,
                'message' => 'You are not authorized to send or recieve chats.',

            ]);
            exit();
        }


        $id = $req->input('id');
        $msg = $req->input('message');
        if($id == null || !is_numeric($id)){
            return response()->json([
                'isError' => true,
                'isSent' => false,
                'message' => 'Invalid arguments supplied',

            ]);
        }else if(empty($msg) || $msg == null){
            return response()->json([
                'isError' => true,
                'isSent' => false,
                'message' => 'Empty message cannot be sent.',

            ]);
        }else {

        $send_to = pt::getParticipantId($id);

        $chat = new Chat();
        $chat->p_id = $id;
        $chat->message = $msg;
        $chat->sender_id = $user->id;
        $chat->reciever_id = $send_to;
        $chat->is_read = 1;

        if($chat->save()){
            $chats = Chat::where(['p_id' => $id])->get();
            return response()->json([
                'isError' => false,
                'isSent' => true,
                'html' => $this->getMessagesForAdminPanel($chats,$user),
                'message' => 'Message sent',
            ]);
        }else {
            return response()->json([
                'isError' => true,
                'isSent' => false,
                'message' => 'Error occurred in sending the message. Please try again.',

            ]);
        }
    }

    }

    private function getMessagesForAdminPanel($chats,$user){
        $msg = "";
        foreach($chats as $c){
        if($c->sender_id == $user->id){
        $msg .= "<li class='sent'>
            <img src='http://emilcarlsson.se/assets/mikeross.png' />
        <p>{$c->message}</p>
        </li>";
        }else {
        $msg .= "<li class='replies'>
            <img src='http://emilcarlsson.se/assets/harveyspecter.png' />
        <p>{$c->message}</p>
        </li>";
        }
    }

    return $msg;
    }

    public function getNonLoggedInUserMessages(){
        $sid = session()->getId();
        $chats = pt::getNonLoggedInParticipantMessages($sid);
        if($chats->count() > 0){
            return response()->json([
                'isFound' => true,
                'isError' => false,
                'html' => $this->returnChats($chats,$sid),
                'message' => 'loading...'
            ]);
        }else {
            return response()->json([
                'isFound' => false,
                'isError' => false,
                'message' => 'No chat found..'
            ]);
        }
    }

    public function getLoggedInIntervalAdminMessages($id){
        if($id == null || !is_numeric($id)){
            return response()->json([
                'isFound' => false,
                'isError' => true,
                'message' => 'Invalid arguments supplied.'
            ]);
        }else {
        $user = Auth::user();
        $chats = pt::getChatWithCurrentUserForAdmin($id,$user->id);
        if($chats->count() > 0){
            $isUpdated = pt::updateChatReadStatus($id);
            $chats = $chats->get();
            return response()->json([
                'isFound' => true,
                'isError' => false,
                'html' => $this->getMessagesForAdminPanel($chats,$user),
                'message' => 'loading...'
            ]);
        }else {
            return response()->json([
                'isFound' => false,
                'isError' => false,
                'message' => 'No chat found..'
            ]);
        }
    }
    }

    private function getAlertsHtmlFormat($pts){
        $alerts = "";
        $alerts .= "<li class='total'>
        <span class='small'>";
        if($pts->count() > 0){
           $alerts .= "You have <strong>{$pts->count()}</strong> new chats.";
        }else {
            $alerts .= "No pending chats.";
        }
        $alerts .= "</span>
    </li>
    <li class='list'>

        <ul class='dropdown-menu-list list-unstyled ps-scrollbar'>";
            if($pts->count() > 0){
           $pts = $pts->get();
            foreach($pts as $p){
            $alerts .= "<li class=' busy'>";
            $alerts .= "<a href='";
            $alerts .= route('mychats',['id' => $p->id]);
            $alerts .= "'>
                    <div class='notice-icon'>
                        <i class='fa fa-comment'></i>
                    </div>
                    <div>
                        <span class='name'>
                        <strong>";
                       $alerts .= substr($p->getParticipantName(),0,15);
                       $alerts .= "
                       </strong>
                        <span class='time small'>";
                        $alerts .= substr($p->getLastMessage(),0,50);

                        $alerts .= "</span>
                        </span>
                    </div>
                </a>
            </li>";
            }
        }

        $alerts .= "</ul>

    </li>";

    return $alerts;
    }

    public function getChatAlertForAdmin(){
        $par = Participant::where(['admin_id' => 0]);
        $count = $par->count();
        if($count > 0){
            return response()->json([
                'isFound' => true,
                'isError' => false,
                'count' => $count,
                'alerts' => $this->getAlertsHtmlFormat($par),
                'message' => 'No chat found..'
            ]);
        }else {
            return response()->json([
                'isFound' => false,
                'isError' => false,
                'message' => 'No pending chats.'
            ]);
        }
    }

    public function getNotReadMessagesCountWithParticipants(){
        $user = Auth::user();
        $chat = Chat::where(['reciever_id' => $user->id,'is_read' => 0]);
        if($chat->count() > 0 ){
            $pts = pt::where(['admin_id' => $user->id]);
            return response()->json([
                'isFound' => true,
                'isError' => false,
                'unreadcount' => $chat->count(),
                'updateparticipants' => $this->displayParticipantsWithUnReadMessagesCount($pts->get()),
            ]);
        }else {
            return response()->json([
                'isFound' => false,
                'isError' => false,
            ]);
        }
    }


    private function displayParticipantsWithUnReadMessagesCount($pts){
        $pars = "";
        $x = 1;
        foreach($pts as $p){
        $pars .= "<li class='' style='list-style-type: none;margin: 22px 4px 12px 4px;border-bottom: 1px solid white;'>

            <div class='user-info'>
            <h4><a href='";

            $pars .= route('mychats',['id' => $p->id]);
            $pars .="'>(";
            $pars .= $x.") ";
            $pars .= substr($p->getParticipantName(),0,15);


            $chatunreadcount = $p->getParticipantUnReadMessagesCount();
            if($chatunreadcount > 0){
            $pars .= "  <i class='badge badge-warning' id='member_chat_count'>";
            $pars .= $chatunreadcount;
            $pars .= "</i>";
        }



            $pars .="</a></h4>
                <span></span>
            </div>

        </li>";
         $x++;
        }

        return $pars;
    }
}
