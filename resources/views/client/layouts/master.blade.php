<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{asset('client/images/favicon.svg')}}" type="image/png">
    <title>مجالات تك</title>

    <link rel="stylesheet" href="{{asset('client/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('client/slider/slider.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('client/css/responsive.css')}}">

    {{--<img id="loading" src="{{asset('client/images/loading2.gif')}}">--}}

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
<script src="{{asset('client/slider/slider.js')}}"></script>
<script src="{{asset('client/js/custom.js')}}"></script>

<script>
    $/*(window).on('load', function(){
        $("#app").fadeIn(1000);
        $('#loading').hide();
    });*/
</script>

</body>

</html>
