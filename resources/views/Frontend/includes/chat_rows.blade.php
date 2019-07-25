
                        @if($chat->count() > 0)
                        <?php $chat = $chat->get(); ?>
                        @foreach ($chat as $c)
                        <?php echo $c->message ?>
                            @if($c->user_id === $sid)
                            <div class="row msg_container base_sent">
                                    <div class="col-md-10 col-xs-10">
                                        <div class="messages msg_sent">
                                        <p>{{$c->message}}</p>
                                        <time datetime="2009-11-13T20:00">{{$c->created_at}}</time>
                                        </div>
                                    </div>
                                    <div class="col-md-2 col-xs-2 avatar">
                                        <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class="img img-responsive ">
                                    </div>
                                </div>
                            @else


                        <div class="row msg_container base_receive">
                                <div class="col-md-2 col-xs-2 avatar">
                                    <img src="http://www.bitrebels.com/wp-content/uploads/2011/02/Original-Facebook-Geek-Profile-Avatar-1.jpg" class="img img-responsive ">
                                </div>
                                <div class="col-xs-10 col-md-10">
                                    <div class="messages msg_receive">
                                        <p>{{$c->message}}</p>
                                        <time datetime="2009-11-13T20:00">{{$c->created_at}}</time>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach


                        @else
                        <h1>Please contact us</h1>
                        @endif


