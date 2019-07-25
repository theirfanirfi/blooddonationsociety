           @extends('Admin.MasterLayout')
           @section('content')
           <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" >

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            @include('Admin.includes.alert')
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Settings</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                <form action="{{route('changepass')}}" method="post" enctype="multipart/form-data">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">
                                            <h3>Change password</h3>
                                            @csrf
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Current Password</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                <input type="password" class="form-control" id="" name="cpass">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <label class="form-label" for="field-1">New Password</label>
                                                    <span class="desc"></span>
                                                    <div class="controls">
                                                    <input type="password" class="form-control" id="" name="new_pass">
                                                    </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Confirm New password</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                <input type="password" class="form-control" id="" name="confirm_pass" >
                                                </div>
                                            </div>


                                                    <div class="text-left">
                                                        <button type="submit" class="btn btn-primary">Update</button>

                                                    </div>
                                                </form>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">

                                            <h3>Site Short Description</h3>
                                        <form action="{{route('updatesitedesc')}}" method="post">
                                            <div class="form-group">
                                            <span class="desc"></span>
                                            <div class="controls">
                                            <textarea maxlength="200" name="desc" class="form-control">{{$s->short_description}}</textarea>
                                            </div>

                                        </div>

                                        <div class="text-left">
                                                <button type="submit" class="btn btn-primary">Update</button>

                                            </div>
                                            @csrf
                                            </form>

                                        </div>

                                </div>
<br/>
                                <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-6">

                                                <h3>Social Media Links:</h3>
                                        <form action="{{route('sociallinks')}}" method="post">


                                            <div class="form-group">
                                                <div class="controls">
                                                    <label>Facebook link</label>
                                                <input type="url" name="fb_link" class="form-control" value="{{$s->fb_link}}" />
                                                </div>

                                            </div>


                                            <div class="form-group">
                                                    <div class="controls">
                                                        <label>Twitter link</label>
                                                    <input type="url" name="twitter_link" class="form-control" value="{{$s->twitter_link}}" />
                                                    </div>

                                            </div>

                                            <div class="form-group">
                                                    <div class="controls">
                                                        <label>Instagram link</label>
                                                    <input type="url" name="insta_link" class="form-control" value="{{$s->insta_link}}" />
                                                    </div>

                                                </div>

                                            <div class="text-left">
                                                    <button type="submit" class="btn btn-primary">Update</button>

                                                </div>
                                                @csrf
                                                </form>

                                            </div>
                                </div>


                            </div>
                        </section></div>

                </section>
            </section>
            <!-- END CONTENT -->
@endsection
