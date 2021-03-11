<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>
        @yield('site-title')
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    
    <!-- CSS  ========================= -->
    @include('frontend.layouts.css')

</head>

<body>
   
    
    <div class="off_canvars_overlay">
              
    </div>
    @include('frontend.layouts.notification')

    @include('frontend.layouts.header')
    @yield('page-content')  
    @include('frontend.layouts.footer')

    @yield('cusjs')
 
   <!-- Jquery cdn -->


