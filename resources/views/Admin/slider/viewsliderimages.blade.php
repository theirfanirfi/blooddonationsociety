@extends('Admin.MasterLayout')
           @section('content')

                              <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Slider Images</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>

                                </div>
                            </header>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <div class="row">
                                            @foreach($images as $img)
                                            <div class="col-sm-6 col-md-4 col-lg-3">
                                                <div class="team-member ">
                                                    <div class="team-img">
                                                        <img class="" src="{{URL::asset('slider/'.$img->image)}}" height='100px' alt="">
                                                    </div>
                                                    <div class="team-info">
                                                        <h4><a href="#">{{$img->title}}</a></h4>
                                                        <span class='team-member-edit'><a href="{{route('editsliderimage',['id'=>$img->id])}}" ><i class='fa fa-pencil icon-xs'></i> </i> </a>&nbsp&nbsp&nbsp <a href="{{route('deletesliderimage',['id'=>$img->id])}}" ><i class='fa fa-trash icon-xs'></i></a></span>
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
