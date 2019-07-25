           @extends('Admin.MasterLayout')
           @section('content')

            <!-- START CONTENT -->
            <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>


<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
    <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">Send SMS</h2>
            <div class="actions panel_actions pull-right">
                <i class="box_toggle fa fa-chevron-down"></i>

            </div>
        </header>
        <div class="content-body">
            <div class="row">
            <form id="sendBulkSms">
                    <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12">

                        <div class="form-group">
                            <label class="form-label" for="field-5">Message</label>
                            <div class="controls">
                                <textarea id="message" class="form-control"></textarea>
                            </div>
                        </div>



                        <div class="form-group">
                            <label class="form-label" for="field-1">Blood Group</label>
<br/>
                                @foreach($bgs as $b)

                            <p style="float:left; margin:14px;"> <b>{{$b->bloog_group}}</b>  <input  type="checkbox" name="bloodgroup[]"  value="{{$b->bloog_group}}">
                            </p>
                            @endforeach

                        </div>
                        <div class="form-group" style="clear:both;">
                                <label class="form-label" for="field-5">Department</label>
                                <span class="desc"></span>
                                <select class="form-control" id="department">
                                    <option>Select Department</option>
                                    <option  value="all">All</option>
                                    @foreach($dpts as $d)
                                <option  value="{{$d->dept_name}}">{{$d->dept_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                    <label class="form-label" for="field-5">Batches</label>
                                    <span class="desc"></span>
                                    <select class="form-control" id="batch">
                                        <option>Select Batches</option>
                                        <option  value="all">All</option>
                                        @foreach($batches as $b)
                                        <option  value="{{$b->batch}}">{{$b->batch}}</option>
                                            @endforeach
                                    </select>
                                </div>
                    </div>
                    @csrf

                    <div class="col-lg-8 col-md-8 col-sm-9 col-xs-12 padding-bottom-30">
                        <div class="text-left">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>


        </div>
    </section></div>

                </section>
            </section>
            <!-- END CONTENT -->


            <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">SMS Sending Console.</h4>
            </div>
            <div class="modal-body">
              <div id="console" style="background-color:#000;color:#fff;">

            </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>

        </div>
      </div>

@endsection
