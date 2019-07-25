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
                                        
                                            <form action ="{{route('editingDep')}}" method="post">
                                            @csrf
                                                <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="field-1">Department Name</label>
                                                        <span class="desc"></span>
                                                        <div class="controls">
                                                            <input type="text" value="{{$Dep->dept_name}}" class="form-control" name='dep_name' id="field-3">
                                                            <input type="hidden" value="{{$Dep->id}}" class="form-control" name='dep_id' id="field-3">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                                            <div class="text-left">
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                    </div>
                                    </section>
                                </div>
                                </section>
                        </section>
                       



            <!-- END CONTENT -->
@endsection
