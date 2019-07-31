@extends('Admin.MasterLayout')
           @section('content')
           <?php
           use App\User;
           ?>
           <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>

                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                        @include('Admin.includes.alert')
                        <div class="page-title">

                            <div class="pull-left">
                                <h1 class="title">Donor Profile</h1>                            </div>

                            <div class="pull-right hidden-xs">
                                <ol class="breadcrumb">
                                    <li>
                                        <a href="index.html"><i class="fa fa-home"></i>Home</a>
                                    </li>
                                    <li>
                                        <a href="blo-users.html">Users</a>
                                    </li>
                                    <li class="active">
                                        {{-- <strong>User Profile</strong> --}}
                                    </li>
                                </ol>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>


                    <div class="col-lg-12">
                        <section class="box nobox">
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-3 col-sm-4 col-xs-12">

                                        <div class="uprofile-name">
                                            <h3>
                                                <a href="#">{{$Id->name}}</a>

                                            </h3>
                                            <p class="uprofile-title">Student</p>
                                        </div>


                                    <form action="{{route('promoteuser')}}" method="post">
                                        @csrf
                                        <div class="uprofile-buttons">
                                            <h3 class="cla">Permission</h3>
                                            <h5>
                                            <p style="float:left; margin:14px;">   <input  type="checkbox" name="adddonor"  value="adddonor" <?php if($Id->can_add_donor) { echo "checked"; } ?> > <b>Add Donor</b></p>
                                            <p style="float:left; margin:14px;">  <input  type="checkbox" name="editdonor"  value="editdonor" <?php if($Id->can_edit_donors) { echo "checked"; } ?> > <b>Edit Donor</b> </p>
                                            <p style="float:left; margin:14px;">  <input  type="checkbox" name="deletedonor"  value="deletedonor" <?php if($Id->can_delete_donors) { echo "checked"; } ?> > <b>Delete Donor</b> </p>
                                            <p style="float:left; margin:14px;">  <input  type="checkbox" name="sendsms"  value="sendsms" <?php if($Id->can_send_sms) { echo "checked"; } ?> > <b>Send SMS</b> </p>
                                            <p style="float:left; margin:14px;">  <input  type="checkbox" name="department"  value="department" <?php if($Id->can_departments) { echo "checked"; } ?> > <b>Access to Departments</b> </p>
                                            <p style="float:left; margin:14px;">  <input  type="checkbox" name="batch"  value="batch" <?php if($Id->can_batches) { echo "checked"; } ?> > <b>Access to Batches</b> </p>
                                            <p style="float:left; margin:14px;">  <input  type="checkbox" name="frontend"  value="frontend" <?php if($Id->can_change_frontend) { echo "checked"; } ?> > <b>Change Frontend contents</b> </p>


                                            <p style="float:left; margin:14px;">  <input  type="checkbox" name="promoteuser"  value="promoteuser" <?php if($Id->can_promote_users) { echo "checked"; } ?> > <b>Promote User</b> </p>
                                            <p style="float:left; margin:14px;">  <input  type="checkbox" name="answerchat"  value="answerchat" <?php if($Id->can_answer_chat) { echo "checked"; } ?> > <b>Answer Chat</b> </p>
                                            <p style="float:left; margin:14px;">  <input  type="checkbox" name="addpost"  value="addpost" <?php if($Id->can_add_post) { echo "checked"; } ?> > <b>Add Post</b> </p>
                                            <p style="float:left; margin:14px;">  <input  type="checkbox" name="editpost"  value="editpost" <?php if($Id->can_edit_post) { echo "checked"; } ?> > <b>Edit Post</b> </p>
                                            <p style="float:left; margin:14px;">  <input  type="checkbox" name="deletepost"  value="deletepost" <?php if($Id->can_delete_post) { echo "checked"; } ?> > <b>Delete Post</b> </p>
                                            <input type="hidden" name="donor_id" value="{{$Id->id}}" />
                                        </h5>
                                        </div>
                                        @if(User::checkPermission($Id,'promote_user') == 1)

                                        <div class="uprofile-buttons">
                                            <button type="submit" class="btn btn-md btn-primary">Promote to Admin group</button>
                                        </div>
                                        @endif
                                        </form>

                                    </div>
                                    <div class="col-md-9 col-sm-8 col-xs-12">

                                        <div class="uprofile-content">

                                            <div class="">

                                                <h2>Donor Information:</h2>
                                                <div class="content-body">
                                <div class="row">
                                <form action="" method="post" enctype="multipart/form-data">
                                @csrf    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Roll No</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value='{{$Id->rollnumber}}' id="field-3" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Name</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value='{{$Id->name}}' id="field-3" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Father Name</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value='{{$Id->fname}}' id="field-3" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Address</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value='{{$Id->address}}' id="field-3" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Blood Group</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value='{{$Id->bloodgroup}}' id="field-3" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Department</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value='{{$Id->department}}' id="field-3" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Semester</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value='{{$Id->semester}}' id="field-3" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Batch</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value='{{$Id->batch}}' id="field-3" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Contact Number</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value='{{$Id->mobile_no}}' id="field-3" name="" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Blood Group</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="text" class="form-control" value='{{$Id->bloodgroup}}' id="field-3" name="" disabled>
                                                </div>
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

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section></div>


                </section>
            </section>
@endsection
