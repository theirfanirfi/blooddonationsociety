           @extends('Admin.MasterLayout')
           @section('content')
           <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" >

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Privacy</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                <form action="{{route('privacypage')}}" method="post">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            @include('Admin.includes.alert')




                                            <div class="form-group">
                                                <label class="form-label" for="field-6">Description</label>
                                                <span class="desc">e.g. "Enter any size of text description here"</span>
                                                <div class="controls">
                                                    <textarea name="description" class="bootstrap-wysihtml5-textarea" placeholder="Enter text ..." style="width: 100%; height: 500px; font-size: 14px; line-height: 23px;padding:15px;">
                                                    @if(!empty($page))
                                                        {{$page->description}}
                                                        @endif
                                                    </textarea>
                                                </div>
                                            </div>

@csrf
                                        </div>


                                        <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                                            <div class="text-left">
                                                <button type="submit" class="btn btn-primary">Update Page</button>
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
