<!DOCTYPE html>
<html lang="ar">
<head>

    @stack('headerTags')

    <link type="text/css" href="{{asset('cp/assets/css/chat.css')}}" rel="stylesheet">

</head>
<body>

<div id="app">

    @yield('master')

</div>

<script src="{{asset('js/app.js')}}"></script>

@stack('footerTags')

</body>
</html>

