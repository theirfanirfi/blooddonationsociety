        <!-- START CONTAINER -->
        <div class="page-container row-fluid">

            <!-- SIDEBAR - START -->
            <div class="page-sidebar ">

                <!-- MAIN MENU - START -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper">

                    <!-- USER INFO - START -->
                    <div class="profile-info row">

                        <div class="profile-image col-md-4 col-sm-4 col-xs-4">

                            <a href="{{route('profile')}}">
                                    <?php
                                    use App\User;
                                    $user = Auth::user();
                                    if($user->profile_image == null || empty($user->profile_image)){
                                    ?>
                                <img src="{{URL::asset('data/profile/profile.png')}}" alt="user-image" class="img-circle img-responsive">
                                    <?php } else {  ?>
                                    <img src="{{URL::asset('profile')}}/{{$user->profile_image}}" alt="user-image" class="img-circle img-responsive">
                                    <?php } ?>
                                </a>
                        </div>

                        <div class="profile-details col-md-8 col-sm-8 col-xs-8">

                            <h3>
                            <a href="ui-profile.html">{{$user->name}}</a>

                                <!-- Available statuses: online, idle, busy, away and offline -->
                                <span class="profile-status online"></span>
                            </h3>

                            <p class="profile-title"></p>

                        </div>

                    </div>
                    <!-- USER INFO - END -->



                    <ul class='wraplist'>


                        <li class="">
                        <a href="{{route('adminhome')}}">
                                <i class="fa fa-home"></i>
                                <span class="title">Dashboard</span>
                            </a>
                        </li>
                        <li class="">
                            <a href="javascript:;">
                                <i class="fa fa-suitcase"></i>
                                <span class="title">Posts</span>
                                <span class="arrow ">
                            </a>
                            <ul class="sub-menu" >
                                @if(User::checkPermission($user,'add_post') == 1)
                                <li>
                                <a class="" href="{{route('addpost')}}"   >Add Post</a>
                                </li>
                                @endif
                                <li>
                                    <a class="" href="{{route('posts')}}"  >View Posts</a>
                                </li>

                            </ul>
                        </li>
                        <li class="">
                            <a href="javascript:;">
                                <i class="fa fa-burn"></i>
                                <span class="title">Donors</span>
                                <span class="arrow ">
                            </a>
                            <ul class="sub-menu" >

                                    @if(User::checkPermission($user,'add_donor') == 1)

                                <li>
                                    <a class="" href="{{route('adddonor')}}"  >Add Donors</a>
                                </li>
                                @endif
                                <li>
                                    <a class="" href="{{route('donors')}}">View Donors</a>
                                </li>

                            </ul>
                        </li>


                        <li class="">
                            <a href="javascript:;">
                                <i class="fa fa-suitcase"></i>
                                <span class="title">Departments</span>
                                <span class="arrow ">
                            </a>
                            <ul class="sub-menu" >
                        @if(User::checkPermission($user,'can_departments') == 1)

                                <li>
                                <a class="" href="{{route('departments')}}" >Departments</a>
                                </li>
                                @endif

                        @if(User::checkPermission($user,'can_batches') == 1)

                                <li>
                                    <a class="" href="{{route('batches')}}" >Batches</a>
                                </li>
                                @endif

                            </ul>
                        </li>


                        @if(User::checkPermission($user,'promote_user') == 1)
                        <li class="">
                            <a href="{{route('usersPage')}}">
                                <i class="fa fa-users"></i>
                                <span class="title">Administrators</span>
                            </a>

                        </li>

                        @endif

                        @if(User::checkPermission($user,'send_sms') == 1)

                        <li class="">
                            <a href="javascript:;">
                                <i class="fa fa-envelope"></i>
                                <span class="title">SMS</span>
                                <span class="arrow ">
                            </a>
                            <ul class="sub-menu" >

                                <li>
                                <a class="" href="{{route('sendsms')}}" >Send SMS</a>
                                </li>

                            </ul>
                        </li>
                        @endif

                        @if(User::checkPermission($user,'change_frontend') == 1)

                        <li class="">
                                <a href="javascript:;">
                                    <i class="fa fa-file"></i>
                                    <span class="title">Sections</span>
                                    <span class="arrow ">
                                </a>
                                <ul class="sub-menu" >

                                    <li>
                                    <a class="" href="{{route('aboutuspage')}}" >About Us</a>
                                    {{-- <a class="" href="{{route('privacy')}}" >Update Privacy page</a>
                                    <a class="" href="{{route('contactus')}}" >Update Contact Us page</a>
                                    <a class="" href="{{route('terms')}}" >Update Terms and condition page</a> --}}
                                    </li>

                                </ul>
                        </li>

                        <li class="">
                            <a href="javascript:;">
                                <i class="fas fa-file-image"></i>
                                <span class="title">Gallery</span>
                                <span class="arrow ">
                            </a>
                            <ul class="sub-menu" >

                                <li>
                                <a class="" href="{{route('addimage')}}" >Add Image</a>
                                </li>


                                <li>
                                    <a class="" href="{{route('ImageGallery')}}" >View Gallery</a>
                                    </li>

                            </ul>
                        </li>


                        <li class="">
                            <a href="javascript:;">
                                <i class="fa fa-file-image"></i>
                                <span class="title">Front Slider</span>
                                <span class="arrow ">
                            </a>
                            <ul class="sub-menu" >

                                <li>
                                <a class="" href="{{route('addsliderimage')}}" >Add Image</a>
                                </li>


                                <li>
                                    <a class="" href="{{route('viewsliderimages')}}" >View Slider Images</a>
                                    </li>

                            </ul>
                        </li>

                        <li class="">
                            <a href="javascript:;">
                                <i class="fa fa-comments"></i>
                                <span class="title">Messages</span>
                                <span class="arrow ">
                            </a>
                            <ul class="sub-menu" >

                                <li>
                                <a class="" href="{{route('addmessage')}}" >Add Message</a>
                                </li>


                                <li>
                                    <a class="" href="{{route('messages')}}" >View Messages</a>
                                    </li>

                            </ul>
                        </li>

@endif
                    </ul>

                </div>
                <!-- MAIN MENU - END -->







            </div>
            <!--  SIDEBAR - END -->
