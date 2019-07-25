<?php

use App\User;
use App\Http\Models\Participant;
$user = Auth::user();
$pts = Participant::getAdminParticipants($user->id);
?>
<div class="page-chatapi hideit">

{{-- <div class="search-bar">
    <input type="text" placeholder="Search" class="form-control">
</div> --}}

<div class="chat-wrapper">



    <ul class="contact-list">

        <h3>Chats</h3>
        @if(User::checkPermission($user,'answer_chat'))

        @if($pts->count() > 0)
        <?php $x = 1; $pts = $pts->get(); ?>
        @foreach($pts as $p)
        <li class="" style="list-style-type: none;margin: 22px 4px 12px 4px;border-bottom: 1px solid white;">
            {{-- <div class="user-img">
                <a href="#"><img src="data/profile/avatar-2.png" alt=""></a>
            </div> --}}
            <div class="user-info">
            <h4><a href="{{route('mychats',['id' => $p->id])}}">{{$x}}) {{ substr($p->getParticipantName(),0,15)}}</a></h4>
                <span></span>
            </div>

        </li>
        <?php $x++; ?>
        @endforeach
        @else
        <li class="user-row" id='chat_user_12' data-user-id='12'>
                <div class="user-img">
                    {{-- <a href="#"><img src="data/profile/avatar-2.png" alt=""></a> --}}
                </div>
                <div class="user-info">
                <h4><a href="#">You have no chat history.</a></h4>
                    {{-- <span class="status idle" data-status="idle"> Idle</span> --}}
                </div>
                <div class="user-status idle">
                    <i class="fa fa-circle"></i>
                </div>
            </li>
        @endif
        @else
        <h3 style="color:yellow;">You are not authorized.</h3>
        @endif

    </ul>
</div>

</div>
