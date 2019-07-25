@extends('Frontend.MasterLayoutSinglePage')
@section('content')
<!-- Portfolio Filter -->
        <div class="container g-padding-y-80--xs">
            <div class="g-text-center--xs g-margin-b-40--xs">
                <h2 class="g-font-size-32--xs g-font-size-36--md">Gallery</h2>
            </div>
            <div class="s-portfolio">

            </div>
        </div>
        <!-- End Portfolio Filter -->

        <!-- Portfolio Gallery -->
        <div class="container g-margin-b-100--xs">
            <div id="js__grid-portfolio-gallery" class="cbp">
                @foreach($gallery as $g)
                <!-- Item -->
                <div class="s-portfolio__item cbp-item motion graphic">
                    <div class="s-portfolio__img-effect">
                    <img src="{{URL::asset('gallery')}}/{{$g->image_url}}" alt="{{$g->image_title}}" class="img-responsive" style="width:100%;height:350px;">
                    </div>
                    <div class="s-portfolio__caption-hover--cc">
                        <div class="g-margin-b-25--xs">
                        <h4 class="g-font-size-18--xs g-color--white g-margin-b-5--xs">{{$g->image_title}}</h4>
                        <p class="g-color--white-opacity">{{$g->image_description}}</p>
                        </div>
                        <ul class="list-inline g-ul-li-lr-5--xs g-margin-b-0--xs">
                            <li>
                            <a href="{{URL::asset('gallery')}}/{{$g->image_url}}" class="cbp-lightbox s-icon s-icon--sm s-icon--white-bg g-radius--circle" data-title="{{$g->image_title}}">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                            <li>
                                <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" class="s-icon s-icon--sm s-icon s-icon--white-bg g-radius--circle">
                                    <i class="ti-link"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End Item -->
                @endforeach


            </div>
            <!-- End Portfolio Gallery -->
        </div>
        <!-- End Portfolio -->

@endsection
