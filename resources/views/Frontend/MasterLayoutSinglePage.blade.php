@include('Frontend.includes.header')
<?php
use App\Http\Models\Setting;
$setting = Setting::first();
?>
@yield('content')
@include('Frontend.includes.footer')
