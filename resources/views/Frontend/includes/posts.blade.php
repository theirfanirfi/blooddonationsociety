        <!-- News -->
        <div class="container g-padding-y-80--xs g-padding-y-125--sm">
            <div class="g-text-center--xs g-margin-b-80--xs">
                <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Blog</p>
                <h2 class="g-font-size-32--xs g-font-size-36--md">Posts</h2>
            </div>
            <div class="row">
                @foreach($posts as $p)
                <div class="col-sm-4">
                    <!-- News -->
                    <article>
                    <img class="img-responsive" src="{{URL::asset('posts')}}/{{$p->image}}" alt="Image" style="width:100%;">
                        <div class="g-bg-color--white g-box-shadow__dark-lightest-v2 g-text-center--xs g-padding-x-40--xs g-padding-y-40--xs">

                        <h3 class="g-font-size-22--xs g-letter-spacing--1"><a href="#">{{$p->post_title}}</a></h3>
                        <p>{{$p->excerpt}}</p>
                        </div>
                    </article>
                    <!-- End News -->
                </div>
                @endforeach


            </div>
        </div>
        <!-- End News -->
