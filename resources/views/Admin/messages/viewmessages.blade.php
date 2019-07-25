           @extends('Admin.MasterLayout')
           @section('content')

                     <!-- START CONTENT -->
                     <section id="main-content" class=" ">
                        <section class="wrapper main-wrapper" style=''>

                            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class="page-title">

                                    <div class="pull-left">
                                        <h1 class="title">Messages</h1>                            </div>

                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <div class="col-lg-12">
                                <section class="box ">
                                    {{-- <header class="panel_header">
                                        <h2 class="title pull-left">Basic Data Table</h2>
                                        <div class="actions panel_actions pull-right">
                                            <i class="box_toggle fa fa-chevron-down"></i>

                                        </div>
                                    </header> --}}
                                    <div class="content-body">    <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                            @include('Admin.includes.alertdpt')
                                                <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <tr>
                                                                <th>S.NO</th>
                                                            <th>Who's ?</th>
                                                            <th>Picture</th>
                                                            <th>Message</th>

                                                            <th>Action</th>

                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <?php $x =1; ?>
                                                    @foreach($msgs as $m)
                                                        <tr>
                                                        <td>{{$x}}</td>
                                                            <td><?php if($m->designation == 1) {echo "B.D.S Chairman's"; } else {echo "Principal's"; } ?></td>
                                                        <td><img class="img-responsive" style="width:50px; height:40px;" src="{{URL::asset('messages')}}/{{$m->image}}" /></td>
                                                            <td><?php echo substr($m->message,0,100); ?></td>
                                                            <td>
                                                             <a href=""><button class='btn btn-sm'><span class="fa fa-eye"></span></button></a>
                                                             <a href="{{route('editmsg',['id'=>$m->id])}}"><button class='btn btn-sm'><span class="fa fa-pencil"></span></button></a>
                                                             <a href="{{route('deletemsg',['id'=>$m->id])}}"><button class='btn btn-sm'><span class="fa fa-trash"></span></button></a>
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

@endsection
