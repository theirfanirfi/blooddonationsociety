@extends('Admin.MasterLayout')
@section('content')
<!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" >

                        <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <section class="box ">
                                    <header class="panel_header">
                                        <h2 class="title pull-left">Add Batch Here</h2>
                                        <div class="actions panel_actions pull-right">
                                            <i class="box_toggle fa fa-chevron-down"></i>
                                        </div>
                                    </header>
                                    <div class="content-body">
                                        <div class="row">
                                        @include('Admin.includes.alert')
                                            <form action ="{{route('BatchEdit')}}" method="post">
                                            @csrf
                                                <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="form-label" for="field-1">Batch </label>
                                                        <span class="desc"></span>
                                                        <div class="controls">
                                                            <input type="text" class="form-control" value="{{$Edit->batch}}" name='batch_name' id="field-3">
                                                            <input type="hidden" class="form-control" value="{{$Edit->id}}" name='batch_id' id="field-3">
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
