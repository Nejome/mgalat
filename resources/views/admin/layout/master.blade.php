@extends('app')

@push('headerTags')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{asset('client/images/favicon.svg')}}" type="image/png">
    <title>مجالات</title>

    <link href="{{asset('cp/assets/vendor/nucleo/css/nucleo.css')}}" rel="stylesheet">
    <link href="{{asset('cp/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('cp/assets/css/argon.css?v=1.0.0')}}" rel="stylesheet">

@endpush

@section('master')

    @include('admin.layout.sidebar')

    <div class="main-content">

        @include('admin.layout.header')

        @yield('content')

    </div>

@endsection

@push('footerTags')

    <script src="{{asset('cp/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('cp/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('cp/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
    <script src="{{asset('cp/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
    <script src="{{asset('cp/assets/js/argon.js?v=1.0.0')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKUtiN-bHruEDPRjKN_-qjq1Kg8WAOjUI"></script>

    @stack('pageScript')

    <script>

        $('input[type=radio][name=is_special]').change(function() {

            if (this.value == 1) {
                $('input[type=date][name=special_until]').prop('disabled', false)
            }
            else if (this.value == '0') {
                $('input[type=date][name=special_until]').prop('disabled', true)
                    .val('');
            }

        });

    </script>

@endpush

