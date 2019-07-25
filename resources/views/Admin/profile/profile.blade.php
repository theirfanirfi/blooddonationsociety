           @extends('Admin.MasterLayout')
           @section('content')
           <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" >

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                            @include('Admin.includes.alert')
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Update Profile</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                <form action="{{route('updateprofile')}}" method="post" enctype="multipart/form-data">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Full name</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                <input type="text" class="form-control" id="" name="name" value="{{$user->name}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <label class="form-label" for="field-1">Father name</label>
                                                    <span class="desc"></span>
                                                    <div class="controls">
                                                    <input type="text" class="form-control" id="" name="fname" value="{{$user->fname}}">
                                                    </div>
                                                </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Email</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                <input type="email" class="form-control" id="" name="email" value="{{$user->email}}">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-2">Profile Image</label>
                                                <div class="controls">
                                                    <input type="file" class="form-control" id="field-2"  name="image">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Roll No</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                <input type="number" name="rollnumber" class="form-control" value="{{$user->rollnumber}}" id="field-1">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                    <label class="form-label" for="field-1">Blood Group</label>
                                                    <span class="desc"></span>
                                                    <div class="controls">
                                                            <select class="form-control" name="blood_group">

                                                                    @foreach ($bgs as $b )
                                                                    <option <?php if($user->bloodgroup == $b->bloog_group){ echo "selected"; } ?> value="{{$b->bloog_group}}">{{$b->bloog_group}}</option>
                                                                        @endforeach

                                                                </select>
                                                    </div>
                                                </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Batch</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                                    <select class="form-control" name="batch">

                                                            @foreach ($batches as $s )
                                                            <option <?php if($user->batch == $s->batch){ echo "selected"; } ?> value="{{$s->batch}}">{{$s->batch}}</option>
                                                                @endforeach

                                                        </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label class="form-label" for="field-5">Department</label>
                                            <span class="desc"></span>
                                            <select class="form-control" name="department">

                                                @foreach ($dpts as $s )
                                                <option <?php if($user->department == $s->dept_name){ echo "selected"; } ?> value="{{$s->dept_name}}">{{$s->dept_name}}</option>
                                                    @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="field-5">Semesters</label>
                                            <span class="desc"></span>
                                            <select class="form-control" name="semester">

                                                @foreach ($semesters as $s )
                                            <option <?php if($user->semester == $s->semester){ echo "selected"; } ?>  value="{{$s->semester}}">{{$s->semester}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Contact No</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                            <input type="text" value="{{$user->mobile_no}}" name="phone" class="form-control" id="field-1">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label" for="field-1">Address</label>
                                            <span class="desc"></span>
                                            <div class="controls">
                                            <input type="text" class="form-control" id="field-5" value="{{$user->address}}" name="address">
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
