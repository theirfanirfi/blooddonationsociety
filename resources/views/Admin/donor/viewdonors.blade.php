           @extends('Admin.MasterLayout')
           @section('content')
           <?php
           use App\User;
           ?>
                     <!-- START CONTENT -->
                     <section id="main-content" class=" ">
                        <section class="wrapper main-wrapper" style=''>
                @include('Admin.includes.alert')

                            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                <div class="page-title">

                                    <div class="pull-left">
                                        <h1 class="title">Donors</h1>                            </div>

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
                                                            <th>Roll No</th>
                                                            <th>Name</th>
                                                            <th>Blood Group</th>
                                                            <th>Department</th>
                                                            <th>Action</th>

                                                        </tr>

                                                    </thead>
                                                    <tbody>
                                                        <?php $x =1; ?>
                                                    @foreach($user as $user)
                                                        <tr>
                                                        <td>{{$x}}</td>
                                                            <td>{{$user->rollnumber}}</td>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->bloodgroup}}</td>
                                                            <td>{{$user->department}}</td>
                                                            <td>
                                                             <a href="{{route('viewDonor',['id'=>$user->id])}}"><button class='btn btn-sm'><span class="fa fa-eye"></span></button></a>
                                                    @if(User::checkPermission($loggedInUser,'edit_donor') == 1)

                                                             <a href="{{route('EditDonor',['id'=>$user->id])}}"><button class='btn btn-sm'><span class="fa fa-pencil"></span></button></a>
                                                             @endif

                                                    @if(User::checkPermission($loggedInUser,'delete_donor') == 1)

                                                             <a href="{{route('deleteDonor',['id'=>$user->id])}}"><button class='btn btn-sm'><span class="fa fa-trash"></span></button></a>
                                                     @endif
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
