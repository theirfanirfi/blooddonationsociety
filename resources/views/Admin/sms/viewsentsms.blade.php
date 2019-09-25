           @extends('Admin.MasterLayout')
           @section('content')
           <?php
           use App\User;
           ?>
                     <!-- START CONTENT -->
                     <section id="main-content" class=" ">
                        <section class="wrapper main-wrapper" style=''>

                            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class="page-title">

                                    <div class="pull-left">
                                        <h1 class="title">Sent SMS</h1>                            </div>

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

                                            @include('Admin.includes.alert')
                                                <table id="example-1" class="table table-striped dt-responsive display" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <tr>
                                                                <th>S.NO</th>
                                                            <th>Donor</th>
                                                            <th>Mobile Number</th>
                                                            <th>SMS Status</th>
                                                            <th>Action</th>

                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <?php $x =1; ?>
                                                    @foreach($sms as $s)
                                                        <tr>
                                                        <td>{{$x}}</td>
                                                            <td>{{ $s->name}}</td>
                                                            <td>{{$s->mobile_no}}</td>
                                                            <td>{{$s->sms_status}}</td>
                                                            <td>
                                                             <a href="{{route('deletesms',['id'=>$s->sms_id])}}"><button class='btn btn-sm'><span class="fa fa-trash"></span></button></a>

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
