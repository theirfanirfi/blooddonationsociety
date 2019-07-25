           @extends('Admin.MasterLayout')
           @section('content')
           <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" >

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Add Post Here</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                <form action="{{route('addPostPost')}}" method="post" enctype="multipart/form-data">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            @include('Admin.includes.alert')
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Post Title</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" id="field-3" name="post_title">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-2">Post Image</label>
                                                <div class="controls">
                                                    <input type="file" name="image" class="form-control" id="field-2" data-mask="phone"  placeholder="(999) 999-9999">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <label class="form-label" for="field-6">Excerpt</label>
                                                    <span class="desc"> </span>
                                                    <div class="controls">
                                                        <textarea name="excerpt" placeholder="Enter text ..." maxlength="200" style="width: 100%; height: 150px; font-size: 14px; line-height: 23px;padding:15px;"></textarea>
                                                    </div>
                                                </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-6">Description</label>
                                                <span class="desc">e.g. "Enter any size of text description here"</span>
                                                <div class="controls">
                                                    <textarea name="description" class="bootstrap-wysihtml5-textarea" placeholder="Enter text ..." style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;"></textarea>
                                                </div>
                                            </div>

@csrf
                                        </div>


                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                            <div class="text-left">
                                                <button type="submit" class="btn btn-primary">Add</button>
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
