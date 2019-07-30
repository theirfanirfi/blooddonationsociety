<div class='page-topbar '>
            {{-- <div class='logo-area'>

            </div> --}}
            <div class='quick-area'>
                <div class='pull-left'>
                    <ul class="info-menu left-links list-inline list-unstyled">
                        <li class="sidebar-toggle-wrap">
                            <a href="#" data-toggle="sidebar" class="sidebar_toggle">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>


                        <li class="notify-toggle-wrapper">
                            <a href="#" data-toggle="dropdown" class="toggle">
                                <i class="fa fa-bell"></i>
                                <?php
                                use App\Http\Models\Participant;
                                $pts = Participant::getUnAttendedChats();
                                ?>
                                <span class="badge badge-orange" id="spancount">@if($pts->count() > 0) {{$pts->count()}}@endif</span>
                            </a>
                            <ul class="dropdown-menu notifications animated fadeIn" id="alertul">
                                <li class="total">
                                    <span class="small">
                                            @if($pts->count() > 0)
                                        You have <strong>{{$pts->count()}}</strong> new chats.
                                        @else
                                        No pending chats.
                                        @endif
                                        {{-- <a href="javascript:;" class="pull-right">Mark all as Read</a> --}}
                                    </span>
                                </li>
                                <li class="list" id="alertslist">

                                    <ul class="dropdown-menu-list list-unstyled ps-scrollbar">
                                        @if($pts->count() > 0)
                                        <?php $pts = $pts->get(); ?>
                                        @foreach($pts as $p)
                                        <li class=" busy"> <!-- available: success, warning, info, error -->
                                        <a href="{{route('mychats',['id' => $p->id])}}">
                                                <div class="notice-icon">
                                                    <i class="fa fa-comment"></i>
                                                </div>
                                                <div>
                                                    <span class="name">
                                                    <strong>{{substr($p->getParticipantName(),0,15)}}</strong>
                                                    <span class="time small">{{substr($p->getLastMessage(),0,50)}}</span>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>
                                        @endforeach
                                        @endif

                                    </ul>

                                </li>

                                {{-- <li class="external">
                                    <a href="javascript:;">
                                        <span>Read All Notifications</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>


                    </ul>
                </div>
                <div class='pull-right'>
                    <ul class="info-menu right-links list-inline list-unstyled">
                        <li class="profile">
                        <a href="{{route('profile')}}" data-toggle="dropdown" class="toggle">
                                <?php $user = Auth::user();
                                if($user->profile_image == null || empty($user->profile_image)){
                                ?>
                            <img src="{{URL::asset('data/profile/profile.png')}}" alt="user-image" class="img-circle img-inline">
                                <?php } else {  ?>
                                <img src="{{URL::asset('profile')}}/{{$user->profile_image}}" alt="user-image" class="img-circle img-inline">
                                <?php } ?>
                                <span>{{$user->name}}<i class="fa fa-angle-down"></i></span>
                            </a>
                            <ul class="dropdown-menu profile animated fadeIn">
                                <li>
                                <a href="{{route('settings')}}">
                                        <i class="fa fa-wrench"></i>
                                        Settings
                                    </a>
                                </li>
                                <li>
                                <a href="{{route('profile')}}">
                                        <i class="fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>
                                <li class="last">
                                <a href="{{route('logout')}}">
                                        <i class="fa fa-lock"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="chat-toggle-wrapper">
                            <a href="#" data-toggle="chatbar" class="toggle_chat">
                                <i class="fa fa-comments"></i>
                                <span id="countbadgetopbar" class="badge badge-warning"></span>
                                <i class="fa fa-times"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
