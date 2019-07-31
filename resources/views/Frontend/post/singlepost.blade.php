@extends('Frontend.MasterLayoutSinglePage')
@section('content')
<!-- Feedback Form -->
        <div class="g-bg-color--sky-light">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-text-center--xs g-margin-b-80--xs">
                    <!-- <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Signup</p> -->
                <h2 class="g-font-size-32--xs g-font-size-36--md">{{$p->post_title}}</h2>
                </div>
                <form method="post" action="{{route('signuppost')}}">
                    @csrf
                    <div class="row g-margin-b-40--xs">
                    @include('Admin.includes.alert')
                    <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="team-member ">
                                <div class="team-img">
                                    <img src="{{URL::asset('posts/'.$p->image)}}" height='400px' style="width:100%;" alt="">
                                </div>
                                <div >
                                   <p><?php echo $p->description ?>
                                   </p>
                                </div>
                            </div>
                        </div>
                    </div>


            </div>
        </div>
        <!-- End Feedback Form -->


        <!--========== END PAGE CONTENT ==========-->
@endsection
