@extends('Admin.MasterLayout')
           @section('content')
           <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" >

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            @include('Admin.includes.alert')
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Add Image to Gallery Here</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                <form action="{{route('updateImage')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Image Title</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value="{{$Image->image_title}}" id="field-3" name="image_title">
                                                    <input type="hidden" class="form-control" value="{{$Image->id}}" id="field-3" name="image_id">

                                                </div>
                                            </div>
                                            <img src="{{URL::asset('posts/'.$Image->image_url)}}" height='100px' />
                                            <div class="form-group">
                                            
                                                <label class="form-label" for="field-2">Gallery Image</label>
                                                <div class="controls">
                                                    <input type="file" class="form-control" id="field-2"  name="image">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-6">Brief</label>
                                                <span class="desc">e.g. "Enter a brief description here"</span>
                                                <div class="controls">
                                                    <textarea name="description" placeholder="Enter text ..." maxlength="150" style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;" value=''>{{$Image->image_description}}</textarea>
                                                </div>
                                            </div>
@csrf

                                        </div>


                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                            <div class="text-left">
                                                <button type="submit" class="btn btn-primary">Update</button>

                                            </div>
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </section></div>

                </section>
            </section>
            <!-- END CONTENT -->
@endsection
