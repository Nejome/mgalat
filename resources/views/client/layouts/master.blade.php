@extends('app')

@push('headerTags')

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

    <style>
        #whatsapp-btn {
            display: block;
            position: fixed;
            bottom: 40px;
            right: 120px;
            z-index: 100;
            background-color: #ffffff;
            border-radius: 50%;
            width: 61px;
            height: 61px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            font-size: 34px;
            text-align: center;
        }
        #whatsapp-btn svg {
            width: 61px;
            height: 61px;
        }
        #whatsapp-btn:hover {
            box-shadow: none;
        }
        @media (max-width: 767px) {
            #whatsapp-btn {
                right: 90px;
                bottom: 15px;
            }
        }
    </style>

    <img id="loading" src="{{asset('client/images/loading2.gif')}}">

@endpush

@section('master')

    @include('client.layouts.header')

    @yield('content')

    @include('client.layouts.footer')

    <a href="{{url('support/start-chat')}}" id="chat-btn">
        <i class="fa fa-comments"></i>
    </a>

    <a href="https://wa.link/8uy999" target="_blank" id="whatsapp-btn">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<path style="fill:#4CAF50;" d="M256.064,0h-0.128l0,0C114.784,0,0,114.816,0,256c0,56,18.048,107.904,48.736,150.048l-31.904,95.104  l98.4-31.456C155.712,496.512,204,512,256.064,512C397.216,512,512,397.152,512,256S397.216,0,256.064,0z"/>
            <path style="fill:#FAFAFA;" d="M405.024,361.504c-6.176,17.44-30.688,31.904-50.24,36.128c-13.376,2.848-30.848,5.12-89.664-19.264  C189.888,347.2,141.44,270.752,137.664,265.792c-3.616-4.96-30.4-40.48-30.4-77.216s18.656-54.624,26.176-62.304  c6.176-6.304,16.384-9.184,26.176-9.184c3.168,0,6.016,0.16,8.576,0.288c7.52,0.32,11.296,0.768,16.256,12.64  c6.176,14.88,21.216,51.616,23.008,55.392c1.824,3.776,3.648,8.896,1.088,13.856c-2.4,5.12-4.512,7.392-8.288,11.744  c-3.776,4.352-7.36,7.68-11.136,12.352c-3.456,4.064-7.36,8.416-3.008,15.936c4.352,7.36,19.392,31.904,41.536,51.616  c28.576,25.44,51.744,33.568,60.032,37.024c6.176,2.56,13.536,1.952,18.048-2.848c5.728-6.176,12.8-16.416,20-26.496  c5.12-7.232,11.584-8.128,18.368-5.568c6.912,2.4,43.488,20.48,51.008,24.224c7.52,3.776,12.48,5.568,14.304,8.736  C411.2,329.152,411.2,344.032,405.024,361.504z"/>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
            <g>
            </g>
</svg>
    </a>

@endsection

@push('footerTags')

    <script src="{{asset('client/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('client/js/popper.js')}}"></script>
    <script src="{{asset('client/js/bootstrap.min.js')}}"></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKUtiN-bHruEDPRjKN_-qjq1Kg8WAOjUI"></script>

    @stack('pageScript')

    <script>
        $(window).on('load', function(){
            $("#app").fadeIn(1000);
            $('#loading').hide();
        });
    </script>

@endpush
