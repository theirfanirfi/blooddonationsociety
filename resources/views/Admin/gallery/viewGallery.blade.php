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


                                            <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <tr>
                                                            <th>S.NO</th>
                                                            <th>Title</th>
                                                            <th>Image</th>
                                                            <th>Description</th>
                                                            <th>Action</th>

                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <?php $x =1; ?>
                                                    @foreach($img as $img)
                                                        <tr>
                                                        <td>{{$x}}</td>
                                                            <td>
                                                                    <img class="" src="{{URL::asset('gallery/'.$img->image_url)}}" style="width:150px;" height='150px' alt="">
                                                            </td>
                                                            <td>
                                                                    <a href="{{route('see_gallery',['id'=>$img->id])}}">{{$img->image_title}}</a>
                                                            </td>
                                                            <td>
                                                                    <?php echo substr($img->image_description,0,100) ?><a href="{{route('see_gallery',['id'=>$img->id])}}" > <u>see more</u></a>
                                                            </td>
                                                            <td>
                                                            <a href="{{route('editImage',['id'=>$img->id])}}"> <i class='fa fa-edit'></i></a>&nbsp&nbsp&nbsp
                                                            <a href="{{route('deleteImage',['id'=>$img->id])}}"><i class='fa fa-trash icon-xs'></i></a>
                                                            </td>
                                                        </tr>
                                                        <?php $x++; ?>
                                                     @endforeach
                                                    </tbody>
                                                </table>

                                    </div>
                                </div>
                            </div>
                        </section></div>

                </section>
            </section>
            <!-- END CONTENT -->

@endsection
