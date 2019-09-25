<div class="chatapi-windows ">

<?php
    use App\User;
    $user = Auth::user();
    ?>
</div>    </div>
<!-- END CONTAINER -->
<!-- LOAD FILES AT PAGE END FOR FASTER LOADING -->



<!-- CORE JS FRAMEWORK - START -->
<script src="{{ URL::asset('assets/js/jquery-1.11.2.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/jquery.easing.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/pace/pace.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/viewport/viewportchecker.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/bootstrap3-wysihtml5/js/bootstrap3-wysihtml5.all.min.js') }}" type="text/javascript"></script>
<!-- CORE JS FRAMEWORK - END -->


<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
<!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->

        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START -->
        <script src="{{ URL::asset('assets/plugins/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}" type="text/javascript"></script>
        <script src="{{ URL::asset('assets/plugins/datatables/extensions/Responsive/bootstrap/3/dataTables.bootstrap.js') }}" type="text/javascript"></script>
        <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END -->


<!-- CORE TEMPLATE JS - START -->
<script src="{{ URL::asset('assets/js/scripts.js') }}" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS - END -->

<!-- Sidebar Graph - START -->
<script src="{{ URL::asset('assets/plugins/sparkline-chart/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/js/chart-sparkline.js') }}" type="text/javascript"></script>
<!-- Sidebar Graph - END -->
<script>

@if(User::checkPermission($user,'answer_chat') == 1)
function getAlerts(){
    URL = "{{route('getchatalerts')}}"
    $.get(URL,function(res){
        if(res.isFound){
            $('#spancount').text(res.count);
            $('#alertul').html(res.alerts);
        }else {
            //do nothing...
            $('#spancount').text('');
           // $('#alertslist').empty();
            $('#alertul').html("<h4>No pending chats.</h4>");

        }
    });
}
setInterval(getAlerts,3000);

function getUnReadMessagesWithParticipants(){
    URL = "{{route('checkforunread')}}"
    $.get(URL,function(res){
        if(res.isFound){
            $('#countbadgetopbar').text(res.unreadcount);
            $('#clist').html(res.updateparticipants);
        }else {
            //do nothing...
        }
    });
}

setInterval(getUnReadMessagesWithParticipants,10000);


@endif
        $(document).ready(function(){
@if(User::checkPermission($user,'send_sms') == 1)

            $('#sendBulkSms').on('submit',function(event){
                $('#console').empty();
                event.preventDefault();
                var arr = $.map($('input:checkbox:checked'), function(e,i) {
                    return e.value;
                    });

                var msg = $('#message').val();
                var department = $('#department').val();
                var batch = $('#batch').val();
                //if(!(msg.length == 0 || department.length == 0 || batch.length == 0 || arr.length == 0)){
                    if(1){
                var URL = "{{route('sendsmsPost')}}";
                $.get(URL,{'bloodgroup': arr,'department': department,'batch': batch},function(data){
                  if(data.isFound){
                    $('#myModal').modal('show');
                      $(data.donors).each(function(index,element){
                        $.support.cors = true;
                        var smsURL = "{{route('requestsms')}}";
                        $.ajax({
                            url: smsURL,
                            type: "GET",
                            data: {'msg' : msg,'department':department, 'batch' : batch,'mobile': element.mobile_no,'id': element.id},
                            success: function(res){
                                $('#console').append("<p> Mobile: "+element.mobile_no+", \n Name: "+element.name+", Dept: "+element.department+", \n SMS Status: <span style='color:'yellow';'>"+res+"</span></p> <hr/>");
                            },
                            error: function (jqXHR,textStatus, errorThrown ) {
                                console.log(jqXHR);
                                console.log(textStatus);
                                console.log(errorThrown);
                            },

                            beforeSend: function(xhr){
                                xhr.setRequestHeader("Access-Control-Allow-Origin","*");
                            }
                        })

                      });

                  }else {
                      console.log('No donor found.');
                      console.log(data.message);

                  }
                })

            } else {
                //empty message
                alert('None of the fields can be empty.');
            }
            });
            @endif




            var arrow = $('.chat-head img');
                var textarea = $('.chat-text textarea');

                arrow.on('click', function(){
                    var src = arrow.attr('src');

                    $('.chat-body').slideToggle('fast');
                    if(src == 'https://maxcdn.icons8.com/windows10/PNG/16/Arrows/angle_down-16.png'){
                        arrow.attr('src', 'https://maxcdn.icons8.com/windows10/PNG/16/Arrows/angle_up-16.png');
                    }
                    else{
                        arrow.attr('src', 'https://maxcdn.icons8.com/windows10/PNG/16/Arrows/angle_down-16.png');
                    }
                });

                textarea.keypress(function(event) {
                    var $this = $(this);

                    if(event.keyCode == 13){
                        var msg = $this.val();
                        $this.val('');
                        $('.msg-insert').prepend("<div class='msg-send'>"+msg+"</div>");
                        }
                });
        });


        </script>














</body>
</html>



