        <!-- Features -->
        <div id="js__scroll-to-section" class="container g-padding-y-80--xs g-padding-y-125--sm">
            <div class="g-text-center--xs g-margin-b-100--xs">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Welcome to Jahanzeb Colleg Blood donation society</p>
                <h2 class="g-font-size-32--xs g-font-size-36--md">Messages</h2>
            </div>
            <div class="row g-margin-b-60--xs g-margin-b-70--md">
                @include('Admin.includes.alert')
            
                @foreach($msgs as $m)
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="clearfix">
                        <div class="g-media g-width-200--xs">
                            <div class="wow fadeInDown" data-wow-duration=".3" data-wow-delay=".3s">
                                <!-- <i class="g-font-size-28--xs g-color--primary ti-ruler-alt-2"></i> -->
                            <img class="img-responsive img-circle" style="width: 200px;height: 200px;" src="{{URL::asset('messages')}}/{{$m->image}}">
                            </div>
                        </div>
                        <div class="g-media__body g-padding-x-20--xs">
                            <h3 class="g-font-size-18--xs"><?php if($m->designation == 1) { echo "Blood Donation Society's chairman"; } else { echo "Principal"; } ?> </h3>
                        <p class="g-margin-b-0--xs">{{$m->message}}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- // end row  -->

        </div>
        <!-- End Features -->
