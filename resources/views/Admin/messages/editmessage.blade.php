           @extends('Admin.MasterLayout')
           @section('content')
           <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" >

                    <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                        @include('Admin.includes.alert')
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Edit Message</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                </div>
                            </header>
                            <div class="content-body">
                                <div class="row">
                                    <form action="{{route('editmessagePost')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Message Type</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <select name="message_type" class="form-control">
                                                        <option value="2" <?php if($msg->designation == 2){ echo "selected"; } ?>>Principal's message</option>
                                                        <option value="1" <?php if($msg->designation == 1){ echo "selected"; } ?>>B.D.S Chairman's message</option>
                                                    </select>
                                                </div>


                                            </div>
<input type="hidden" name="id" value="{{ $msg->id }}">

                                            <div class="form-group">
                                                <label class="form-label" for="field-1">Image</label>
                                                <span class="desc"></span>
                                                <div class="controls">
                                                    <input type="file" name="image" class="form-control" />
                                                </div>
            <img src="{{ URL::asset('messages/') }}/{{ $msg->image }}" class="img-responsive img-thumbnail" style="width: 250px;height: 250px;">

                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="field-6">Brief</label>
                                                <span class="desc">e.g. "Enter a brief Message here"</span>
                                                <div class="controls">
                                                    <textarea name="message" placeholder="Enter text ..." maxlength="450" style="width: 100%; height: 250px; font-size: 14px; line-height: 23px;padding:15px;">{{ $msg->message }}</textarea>
                                                </div>


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
                        </section></div>

                </section>
            </section>
            <!-- END CONTENT -->
@endsection
