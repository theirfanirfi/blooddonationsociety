@extends('Admin.MasterLayout')
           @section('content')

                              <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Image Gallery</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>

                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="row">
                                            @foreach($img as $img)
                                            <div class="col-sm-6 col-md-4 col-lg-3">
                                                <div class="team-member ">
                                                    <div class="team-img">
                                                        <img class="" src="{{URL::asset('posts/'.$img->image_url)}}" height='100px' alt="">
                                                    </div>
                                                    <div class="team-info">
                                                        <h4><a href="hos-patient-profile.html">{{$img->image_title}}</a></h4>
                                                        <span class='team-member-edit'><a href="{{route('editImage',['id'=>$img->id])}}" ><i class='fa fa-pencil icon-xs'></i> </i> </a>&nbsp&nbsp&nbsp <a href="{{route('deleteImage',['id'=>$img->id])}}" ><i class='fa fa-trash icon-xs'></i></a></span>
                                                        <span>{{$img->image_description}}<a href="{{route('see_gallery',['id'=>$img->id])}}" > <u>see more</u></a></span>
                                                    </div>
                                                </div>
                                            </div>
                                             @endforeach
</div>

                                    </div>
                                </div>
                            </div>
                        </section></div>

                </section>
            </section>
            <!-- END CONTENT -->

@endsection
