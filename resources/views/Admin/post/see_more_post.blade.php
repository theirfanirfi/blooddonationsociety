@extends('Admin.MasterLayout')
           @section('content')

                              <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">All Posts</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>

                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="row">
                                            <div class="col-sm-6 col-md-4 col-lg-3">
                                                <div class="team-member ">
                                                    <div class="team-img">
                                                    <b><h2>{{$seePost->post_title}}</h2></b>
                                                        <img src="{{URL::asset('posts/'.$seePost->image)}}" height='300px' alt="">
                                                    </div>
                                                    <div>
                                                   <b> <h3>Post Excerpt</h3></b>
                                                       {{$seePost->excerpt}}
                                                    </div>
                                                    <div>
                                                   <b> <h3>Post Description</h3></b>
                                                       {{$seePost->excerpt}}
                                                    </div>
                                                </div>
                                            </div>
</div>

                                    </div>
                                </div>
                            </div>
                        </section></div>

                </section>
            </section>
            <!-- END CONTENT -->

@endsection
