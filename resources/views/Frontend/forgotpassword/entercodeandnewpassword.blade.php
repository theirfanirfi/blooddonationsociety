@extends('Frontend.MasterLayoutSinglePage')
@section('content')
<!-- Feedback Form -->
        <div class="g-bg-color--sky-light">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-text-center--xs g-margin-b-80--xs">
                    <!-- <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Signup</p> -->
                    <h2 class="g-font-size-32--xs g-font-size-36--md">Reset Password</h2>
                    <p style="font-size: 18px;">Enter the code Send to you and your new password.</p>
                </div>
                <form method="post" action="{{route('resetpass')}}">
                    @csrf
                    <div class="row g-margin-b-40--xs">
                        <div class="col-sm-3 col-md-3"></div>
                        <div class="col-sm-6 g-margin-b-20--xs g-margin-b-0--md">
                    @include('Admin.includes.alert')
                            @csrf
                            <div class="g-margin-b-20--xs">
                                <input type="number" class="form-control s-form-v2__input g-radius--50" placeholder="* Enter Code" name="code">
                            </div>

                            <div class="g-margin-b-20--xs">
                                <input type="password" class="form-control s-form-v2__input g-radius--50" placeholder="* Enter New Password" name="new_pas">
                            </div>

                            <div class="g-margin-b-20--xs">
                                <input type="password" class="form-control s-form-v2__input g-radius--50" placeholder="* Confirm New Password" name="cpass">
                            </div>

                            <div class="g-margin-b-20--xs">
                            <input type="hidden" class="form-control s-form-v2__input g-radius--50" value="{{$tk}}" name="tk">
                            </div>
                        </div>

                    </div>
                    <div class="g-text-center--xs">
                        <button type="submit" class="text-uppercase s-btn s-btn--md s-btn--primary-bg g-radius--50 g-padding-x-80--xs">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Feedback Form -->


        <!--========== END PAGE CONTENT ==========-->
@endsection
