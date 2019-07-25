@extends('Admin.MasterLayout')
           @section('content')

                     <!-- START CONTENT -->
                     <section id="main-content" class=" ">
                        <section class="wrapper main-wrapper" style=''>
                        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Dashboard</h1>                            </div>


                        </div>
                    </div>
                    <div class="clearfix"></div>
                        <div class="row">

                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                    <a href="{{route('donors')}}" style="text-decoration:none;">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-burn icon-md icon-rounded icon-warning'></i>
                                            <div class="stats">
                                                <h4><strong>{{$users}}</strong></h4>
                                                <span>Donors</span>
                                            </div>
                                        </div>
                                        </a>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                    <a href="{{route('departments')}}" style="text-decoration:none;">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-building icon-md icon-rounded icon-warning'></i>
                                            <div class="stats">
                                                <h4><strong>{{$departments}}</strong></h4>
                                                <span>Departments</span>
                                            </div>
                                        </div>
                                    </a>
                                    </div>
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                    <a href="{{route('batches')}}" style="text-decoration:none;">

                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-users icon-md icon-rounded icon-warning'></i>
                                            <div class="stats">
                                                <h4><strong>{{$batch}}</strong></h4>
                                                <span>Batches</span>
                                            </div>
                                        </div>
                                    </a>
                                    </div>

                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                    <a href="{{route('posts')}}" style="text-decoration:none;">
                                        <div class="r4_counter db_box">
                                            <i class='pull-left fa fa-suitcase icon-md icon-rounded icon-warning'></i>
                                            <div class="stats">
                                                <h4><strong>{{$posts}}</strong></h4>
                                                <span>Posts</span>
                                            </div>
                                        </div>
                                    </a>
                                    </div>


                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                            <a href="{{route('posts')}}" style="text-decoration:none;">
                                                <div class="r4_counter db_box">
                                                    <i class='pull-left fas fa-file-image icon-md icon-rounded icon-warning'></i>
                                                    <div class="stats">
                                                        <h4><strong>{{$posts}}</strong></h4>
                                                        <span>Gallery</span>
                                                    </div>
                                                </div>
                                            </a>
                                            </div>





                                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                                            <a href="{{route('batches')}}" style="text-decoration:none;">
                                                                <div class="r4_counter db_box">
                                                                    <i class='pull-left fa fa-users icon-md icon-rounded icon-warning'></i>
                                                                    <div class="stats">
                                                                        <h4><strong>{{$posts}}</strong></h4>
                                                                        <span>Administrators</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            </div>
                                </div> <!-- End .row -->











                        </section>
                    </section>

@endsection
