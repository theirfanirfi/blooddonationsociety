           @extends('Admin.MasterLayout')
           @section('content')
           <?php
           use App\User;
           $user = Auth::user();
           ?>

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
                                            @foreach($Myposts as $row)
                                            <div class="col-sm-6 col-md-4 col-lg-3">
                                                <div class="team-member ">
                                                    <div class="team-img">
                                                        <img class="" src="{{URL::asset('posts/'.$row['image'])}}" height='100px' alt="">
                                                    </div>
                                                    <div class="team-info">
                                                        <h4><a href="">{{$row['post_title']}}</a></h4>
                                                    @if(User::checkPermission($user,'edit_post') == 1)
                                                        <span class='team-member-edit'><a href="{{route('editPost',['id' => $row->id])}}" ><i class='fa fa-pencil icon-xs'></i> @endif </a>&nbsp&nbsp&nbsp
                                                    @if(User::checkPermission($user,'delete_post') == 1)

                                                            <a href="deletePosts/{{ $row['id'] }}" ><i class='fa fa-trash icon-xs'></i></a></span>
                                                            @endif
                                                        <span>{{$row->excerpt}}<a href="{{route('see_more_post',['id'=>$row->id])}}" > <u>see more</u></a></span>
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
