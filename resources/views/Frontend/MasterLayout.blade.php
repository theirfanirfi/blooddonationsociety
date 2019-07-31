@include('Frontend.includes.header')
<?php
use App\Http\Models\Setting;
$setting = Setting::first();
?>

@include('Frontend.includes.slider')
@include('Frontend.includes.messages')
@include('Frontend.includes.aboutus')
@include('Frontend.includes.gallery')
@include('Frontend.includes.posts')
{{-- @include('Frontend.includes.testimonials') --}}
{{-- @include('Frontend.includes.bloodcounter') --}}
@include('Frontend.includes.chat')
{{-- @include('Frontend.includes.signupform') --}}
@include('Frontend.includes.footer')

