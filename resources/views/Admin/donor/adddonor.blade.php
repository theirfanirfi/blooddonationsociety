           @extends('Admin.MasterLayout')
           @section('content')

            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>


<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">Add Donor Here</h2>
            <div class="actions panel_actions pull-right">
                <i class="box_toggle fa fa-chevron-down"></i>

            </div>
        </header>
        <div class="content-body">
            <div class="row">
            <form action ="{{route('adddonorPost')}}" method="post">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        @include('Admin.includes.alert')
                        <div class="form-group">
                            <label class="form-label" for="field-1">Full name</label>
                            <span class="desc"></span>
                            <div class="controls">
                                <input type="text" name="fullname" value="" class="form-control" id="field-1">
                            </div>
                        </div>
@csrf

                        <div class="form-group">
                            <label class="form-label" for="field-5">Father Name</label>
                            <div class="controls">
                                <input type="text" name="fathername" value="" class="form-control datepicker" data-format="mm/dd/yyyy" value="">
                            </div>
                        </div>
                        <div class="form-group">
                                <label class="form-label" for="field-1">Roll No</label>
                                <span class="desc"></span>
                                <div class="controls">
                                    <input type="number" name="rollnumber" value="" class="form-control" id="field-1">
                                </div>
                            </div>

                        <div class="form-group">
                            <label class="form-label" for="field-1">Batch</label>
                            <span class="desc"></span>
                            <div class="controls">
                                    <select class="form-control" name="batch">
                                            <option>Select Batch</option>
                                            @foreach ($batches as $s )
                                            <option value="{{$s->batch}}">{{$s->batch}}</option>
                                                @endforeach

                                        </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="field-5">Department</label>
                            <span class="desc"></span>
                            <select class="form-control" name="department">
                                <option>Select Department</option>
                                @foreach ($dpts as $s )
                                <option value="{{$s->dept_name}}">{{$s->dept_name}}</option>
                                    @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="field-5">Semesters</label>
                            <span class="desc"></span>
                            <select class="form-control" name="semester">
                                <option>Select Semester</option>
                                @foreach ($semesters as $s )
                            <option value="{{$s->semester}}">{{$s->semester}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="field-1">Contact No</label>
                            <span class="desc"></span>
                            <div class="controls">
                                <input type="text" value="" name="phone" class="form-control" id="field-1">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="form-label" for="field-5">Blood Group</label>
                            <span class="desc"></span>
                            <select class="form-control" name="blood_group">
                                <option>Select Blood Group</option>

                                @foreach ($bgs as $s )
                                <option value="{{$s->bloog_group}}">{{$s->bloog_group}}</option>

                                    @endforeach
                                    <option>A+</option>

                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="field-1">Address</label>
                            <span class="desc"></span>
                            <div class="controls">
                                <input type="text" class="form-control" id="field-5" name="address">
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="form-label" for="field-1">Email</label>
                            <span class="desc"></span>
                            <div class="controls">
                                <input type="email" name="email" class="form-control"  value="" id="field-51">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="field-1">Password</label>
                            <span class="desc"></span>
                            <div class="controls">
                                <input type="text" name="password" class="form-control"  value="" id="field-51">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary">Save</button>
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
