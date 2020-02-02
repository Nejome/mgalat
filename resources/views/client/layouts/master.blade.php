<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('client/images/favicon.svg')}}" type="image/png">
    <title>{{$setting->title}}</title>

    <meta name="description" content="{{$setting->description}}">
    <meta name="keywords" content="{{$setting->keywords}}">
    <meta name="author" content="{{$setting->author}}">

    <link rel="stylesheet" href="{{asset('client/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/slider/slider.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/chart.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/responsive.css')}}">

    <img id="loading" src="{{asset('client/images/loading2.gif')}}">

</head>

<body>

<div id="app">

    @include('client.layouts.header')

    @yield('content')

    @include('client.layouts.footer')

</div>

<script src="{{asset('client/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('client/js/popper.js')}}"></script>
<script src="{{asset('client/js/bootstrap.min.js')}}"></script>
<script src="{{asset('client/js/custom.js')}}"></script>
<script src="{{asset('client/slider/slider.js')}}"></script>
<script src="{{asset('client/myJs/rating.js')}}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKUtiN-bHruEDPRjKN_-qjq1Kg8WAOjUI"></script>
<script src="{{asset('client/myJs/providerLocation.js')}}"></script>
<script src="{{asset('client/myJs/searchMap.js')}}"></script>
<script src="{{asset('client/myJs/searchForm.js')}}"></script>
<script src="{{asset('client/myJs/departmentMap.js')}}"></script>

<script>
    $(window).on('load', function(){
        $("#app").fadeIn(1000);
        $('#loading').hide();
    });
</script>


</body>

</html>
