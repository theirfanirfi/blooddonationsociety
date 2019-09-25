@extends('Frontend.MasterLayoutSinglePage')
@section('content')
<style>
    .error {
        color:red;

    }
    </style>
<!-- Feedback Form -->
        <div class="g-bg-color--sky-light">
            <div class="container g-padding-y-80--xs g-padding-y-125--sm">
                <div class="g-text-center--xs g-margin-b-80--xs">
                    <!-- <p class="text-uppercase g-font-size-14--xs g-font-weight--700 g-color--primary g-letter-spacing--2 g-margin-b-25--xs">Signup</p> -->
                    <h2 class="g-font-size-32--xs g-font-size-36--md">Signup</h2>
                </div>
                <form id="signupform" method="post" action="{{route('signuppost')}}">
                    @csrf
                    <div class="row g-margin-b-40--xs">
                    @include('Admin.includes.alert')

                        <div class="col-sm-6 g-margin-b-20--xs g-margin-b-0--md">
                            <div class="g-margin-b-20--xs">
                                <input type="text" class="form-control s-form-v2__input g-radius--50" placeholder="* Full Name" name="fullname" id="fullname">
                            </div>

                            <div class="g-margin-b-20--xs">
                                <input type="text" class="form-control s-form-v2__input g-radius--50" placeholder="* Father name" name="fathername" id="fathername">
                            </div>

                            <div class="g-margin-b-20--xs">
                                <input type="number" class="form-control s-form-v2__input g-radius--50" placeholder="* Roll number" name="rollnumber" id="rollnumber">
                            </div>

                            <div class="g-margin-b-20--xs">
                                <input type="email" class="form-control s-form-v2__input g-radius--50" placeholder="* Email" name="email" id="email">
                            </div>
                            <div class="g-margin-b-20--xs">

                            <input type="password" class="form-control s-form-v2__input g-radius--50" placeholder="* Password" name="pass" id="pass">
                        </div>

                        <div class="g-margin-b-20--xs">

                            <input type="password" class="form-control s-form-v2__input g-radius--50" placeholder="* Confirm Password" name="confirm_pass" id="confirm_pass">
                        </div>

                        </div>
                        <div class="col-sm-6">
                        <div class="g-margin-b-20--xs">

                            <input type="number" class="form-control s-form-v2__input g-radius--50" placeholder="* Phone" name="phone" id="phone">
                        </div>
                            <div class="g-margin-b-20--xs">
                                <select class="form-control s-form-v2__input g-radius--50" name="blood_group" id="blood_group">
                                    <option>Select Blood Group</option>
                                    @foreach ($bgs as $b)
                                    <option value="{{$b->bloog_group}}">{{$b->bloog_group}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="g-margin-b-20--xs">
                                <input type="text" class="form-control s-form-v2__input g-radius--50" name="address" placeholder="* Address" id="address">
                            </div>


                            <div class="g-margin-b-20--xs">
                                <select class="form-control s-form-v2__input g-radius--50" name="batch" id="batch">
                                    <option>Select Batch</option>
                                    @foreach ($batches as $b)
                                    <option value="{{$b->batch}}">{{$b->batch}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="g-margin-b-20--xs" >
                                <select class="form-control s-form-v2__input g-radius--50" name="department" id="department">
                                    <option>Select Department</option>

                                    @foreach ($dpts as $d)
                                    <option value="{{$d->dept_name}}">{{$d->dept_name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="g-margin-b-20--xs">
                                <select class="form-control s-form-v2__input g-radius--50" name="semester" id="semester">
                                    <option>Select Semester</option>
                                    @foreach ($semesters as $s)
                                    <option value="{{$s->semester}}">{{$s->semester}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="g-text-center--xs">
                        <button type="submit" id="submit" class="text-uppercase s-btn s-btn--md s-btn--primary-bg g-radius--50 g-padding-x-80--xs">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Feedback Form -->


        <!--========== END PAGE CONTENT ==========-->
@endsection
