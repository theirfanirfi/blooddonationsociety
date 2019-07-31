   <!--========== FOOTER ==========-->
   <footer class="g-bg-color--dark">
    <!-- Links -->

    <!-- End Links -->

    <!-- Copyright -->
    <div class="container g-padding-y-50--xs">
        <div class="row">
                <div class="col-md-6 g-margin-b-20--xs g-margin-b-0--md">
                        <ul class="list-unstyled g-ul-li-tb-5--xs g-margin-b-0--xs">
                        <li><a class="g-font-size-15--xs g-color--white-opacity" href="{{$setting->twitter_link}}">Twitter</a></li>
                            <li><a class="g-font-size-15--xs g-color--white-opacity" href="{{$setting->fb_link}}">Facebook</a></li>
                            <li><a class="g-font-size-15--xs g-color--white-opacity" href="{{$setting->insta_link}}">Instagram</a></li>
                        </ul>
                    </div>
            <div class="col-xs-6 g-text-right--xs">
                <p class="g-font-size-14--xs g-margin-b-0--xs g-color--white-opacity-light"><a href=""></a> <br/> BSCS Final year Project <p>Irfan Ullah</p>
             <p>Farman Ali</p>
        <p>Sikander khan</p></a></p>
            </div>
        </div>
    </div>
    <!-- End Copyright -->
</footer>
<!--========== END FOOTER ==========-->

<!-- Back To Top -->
<a href="javascript:void(0);" class="s-back-to-top js__back-to-top"></a>

<!--========== JAVASCRIPTS (Load javascripts at bottom, this will reduce page load time) ==========-->
<!-- Vendor -->
<script type="text/javascript" src="{{URL::asset('vendor/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('vendor/jquery.migrate.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('vendor/jquery.smooth-scroll.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('vendor/jquery.back-to-top.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('vendor/scrollbar/jquery.scrollbar.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('vendor/swiper/swiper.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('vendor/waypoint.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('vendor/counterup.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('vendor/cubeportfolio/js/jquery.cubeportfolio.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('vendor/jquery.parallax.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('vendor/jquery.wow.min.js') }}"></script>

<!-- General Components and Settings -->
<script type="text/javascript" src="{{URL::asset('js/global.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/components/header-sticky.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/components/scrollbar.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/components/magnific-popup.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/components/swiper.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/components/counter.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/components/portfolio-3-col.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/components/parallax.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/components/google-map.min.js') }}"></script>
<script type="text/javascript" src="{{URL::asset('js/components/wow.min.js') }}"></script>
<!--========== END JAVASCRIPTS ==========-->


        <script>
$(document).on('click', '.panel-heading span.icon_minim', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('focus', '.panel-footer input.chat_input', function (e) {
    var $this = $(this);
    if ($('#minim_chat_window').hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideDown();
        $('#minim_chat_window').removeClass('panel-collapsed');
        $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).on('click', '#new_chat', function (e) {
    var size = $( ".chat-window:last-child" ).css("margin-left");
     size_total = parseInt(size) + 400;
    alert(size_total);
    var clone = $( "#chat_window_1" ).clone().appendTo( ".container" );
    clone.css("margin-left", size_total);
});
$(document).on('click', '.icon_close', function (e) {
    //$(this).parent().parent().parent().parent().remove();
    $( "#chat_window_1" ).remove();
});

var body = $('.panel-body');

$(body).scrollTop(2000,'slow');


$('#btn-chat').click(function(){
        var message = $('#btn-input').val();
        var URL = "{{route('send')}}";
        $.get(URL,{message: message},function(res){
            if(res.isError){
                alert(res.message);
            }else if(res.isSent){
                $('#btn-input').val('');
                $('#panel_body').html(res.html);
                var body = $('.panel-body');

$(body).scrollTop(2000,'slow');
    var snd = new Audio("data:audio/wav;base64,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qJrx4KOQjahZxWbcZgztj2c49nKmkId44S71j0c8eV9yDK6uPRzx5X18eDvjvQ6yKo9ZSS6l//8elePK/Lf//IInrOF/FvDoADYAGBMGb7FtErm5MXMlmPAJQVgWta7Zx2go+8xJ0UiCb8LHHdftWyLJE0QIAIsI+UbXu67dZMjmgDGCGl1H+vpF4NSDckSIkk7Vd+sxEhBQMRU8j/12UIRhzSaUdQ+rQU5kGeFxm+hb1oh6pWWmv3uvmReDl0UnvtapVaIzo1jZbf/pD6ElLqSX+rUmOQNpJFa/r+sa4e/pBlAABoAAAAA3CUgShLdGIxsY7AUABPRrgCABdDuQ5GC7DqPQCgbbJUAoRSUj+NIEig0YfyWUho1VBBBA//uQZB4ABZx5zfMakeAAAAmwAAAAF5F3P0w9GtAAACfAAAAAwLhMDmAYWMgVEG1U0FIGCBgXBXAtfMH10000EEEEEECUBYln03TTTdNBDZopopYvrTTdNa325mImNg3TTPV9q3pmY0xoO6bv3r00y+IDGid/9aaaZTGMuj9mpu9Mpio1dXrr5HERTZSmqU36A3CumzN/9Robv/Xx4v9ijkSRSNLQhAWumap82WRSBUqXStV/YcS+XVLnSS+WLDroqArFkMEsAS+eWmrUzrO0oEmE40RlMZ5+ODIkAyKAGUwZ3mVKmcamcJnMW26MRPgUw6j+LkhyHGVGYjSUUKNpuJUQoOIAyDvEyG8S5yfK6dhZc0Tx1KI/gviKL6qvvFs1+bWtaz58uUNnryq6kt5RzOCkPWlVqVX2a/EEBUdU1KrXLf40GoiiFXK///qpoiDXrOgqDR38JB0bw7SoL+ZB9o1RCkQjQ2CBYZKd/+VJxZRRZlqSkKiws0WFxUyCwsKiMy7hUVFhIaCrNQsKkTIsLivwKKigsj8XYlwt/WKi2N4d//uQRCSAAjURNIHpMZBGYiaQPSYyAAABLAAAAAAAACWAAAAApUF/Mg+0aohSIRobBAsMlO//Kk4soosy1JSFRYWaLC4qZBYWFRGZdwqKiwkNBVmoWFSJkWFxX4FFRQWR+LsS4W/rFRb/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////VEFHAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAU291bmRib3kuZGUAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAMjAwNGh0dHA6Ly93d3cuc291bmRib3kuZGUAAAAAAAAAACU=");
                snd.play();
            }else {
                console.log(res.message);
                alert(res.message);
            }
        });
        });

function getMessages(){
    URL = "{{route('getmessages')}}"
    $.get(URL,function(res){
        if(res.isFound){
            $('#panel_body').html(res.html);
        }else {
            //do nothing...
        }
    });
}
setInterval(getMessages,3000);
            </script>
</body>
<!-- End Body -->
</html>
