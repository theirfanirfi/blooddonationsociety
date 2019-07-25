@extends('Admin.MasterLayout')
@section('content')
<!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" >
                @include('Admin.includes.alert')
                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <section class="box ">
                                    <header class="panel_header">
                                        <h2 class="title pull-left">Add Department Here</h2>
                                        <div class="actions panel_actions pull-right">
                                            <i class="box_toggle fa fa-chevron-down"></i>
                                        </div>
                                    </header>
                                    <div class="content-body">
                                        <div class="row">
                                        
                                            <form action ="{{route('addDepartment')}}" method="post">
                                            @csrf
                                                <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="field-1">Department Name</label>
                                                        <span class="desc"></span>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" name='dep_name' id="field-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                                            <div class="text-left">
                                                                <button type="submit" class="btn btn-primary">Add</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                    </div>
                                    </section>
                                </div>
                                </section>
                        </section>
                        <section id="main-content" class=" ">
                                <section class="wrapper main-wrapper" >
                                @include('Admin.includes.alertdpt')
                                                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                                        <section class="box ">
                                                            <header class="panel_header">
                                                                <h2 class="title pull-left">All Departments</h2>
                                                                <div class="actions panel_actions pull-right">
                                                                    <i class="box_toggle fa fa-chevron-down"></i>
                                                                </div>
                                                            </header>
                                                            <div class="content-body">
                                                                <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive padding-top-45 padding-bottom-45">
                                                        <table class="table table-bordered table-hover bg-white-only">
                                                            <thead>
                                                            
                                                                <tr style="font-weight: bold">
                                                                    <td style="width:10%">S.No</td>
                                                                    <td style="width:30%">Department Names</td>
                                                                    <td style="width:10%">Action</td>

                                                                </tr>
                                                               
                                                            </thead>

                                                            <tbody>

                                                            @foreach($all_departments as $departments)
                                                           
                                                           
                                                             
                                                           
                                                                <tr >
                                                                    <td class="v-middle">
                                                                        <span >
                                                                            1
                                                                        </span>
                                                                    </td>
                                                                    <td class="v-middle">
                                                                        <span>
                                                                            {{$departments->dept_name}}
                                                                        </span>
                                                                    </td>

                                                                    <td style="white-space: nowrap">
                                                                        <!-- form -->

                                                                        <div class="buttons" ng-show="!rowform.$visible" >
                                                                            <a href="{{route('editDep',['id'=>$departments->id])}}" class="btn btn-xs btn-secondary" ng-click="rowform.$show()"><i class='fa fa-pencil'></i></a>
                                                                            <a href="deleteDepartment/{{$departments->id}}"  class="btn btn-xs btn-secondary" ng-click="removeUser($index)"><i class='fa fa-trash'></i></a>
                                                                        </div>
                                                                    </td>
                                                                </tr><!-- end ngRepeat: charge in charges -->
                                                             
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                        <div class="clearfix"></div><br>
                                                    </div>
                                                </div>
                                                </div>
                                            </section>
                                                </div>
                                                </section>
                                                </section>




            <!-- END CONTENT -->
@endsection
