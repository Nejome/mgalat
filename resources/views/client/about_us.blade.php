@extends('client.layouts.master')

@section('content')

    <section class="verification-code-section" style="margin-bottom: 100px;">
        <div class="container">
            <div class="row">

                <div class="col-md-3 text-center order-2 order-md-1 pt-5">
                    <h4>أفضل مقدمي الخدمات بين يديك <span style="color: #2386c9;">مجالات تك</span> - لكل ما تحتاج </h4>
                    <p class="mb-0 mt-3">قم يتحميل التطبيق وتمتع بتلبية طلباتك مجاناً</p>
                    <div class="mt-2">
                        <a href="{{$setting->android_link}}">
                            <img src="{{asset('client/images/google_play.png')}}" width="128" height="40">
                        </a>
                        <a href="{{$setting->ios_link}}">
                            <img src="{{asset('client/images/apple_store.png')}}" width="128" height="40">
                        </a>
                    </div>
                    <div class="mt-3">
                        <span><a href="{{$setting->facebook}}" class="footer-social-link" style="background-color: #3B5998"><i class="fa fa-facebook"></i></a></span>
                        <span><a href="{{$setting->twitter}}" class="footer-social-link" style="background-color: #55acee"><i class="fa fa-twitter"></i></a></span>
                        <span><a href="{{$setting->instagram}}" class="footer-social-link" style="background-color: #c358b0"><i class="fa fa-instagram"></i></a></span>
                        <span><a href="{{$setting->whatsapp}}" class="footer-social-link" style="background-color: #60cb5c"><i class="fa fa-whatsapp"></i></a></span>
                    </div>
                </div>

                <div class="col-md-9 order-1 order-md-2 mb-sm-5">

                    <h1 class="text-center mb-4">معلومات عن مجالات تك</h1>

                    @if(isset($setting->terms_conditions) && $setting->terms_conditions != '')
                        <div class="mb-4">
                            <h3 class="mb-2" style="text-decoration: underline;">الشروط والاحكام</h3>
                            {!! $setting->terms_conditions !!}
                        </div>
                    @endif

                    @if(isset($setting->usage_policy) && $setting->usage_policy != '')
                        <div>
                            <h3 class="mb-2" style="text-decoration: underline;">سياسات الاستخدام</h3>
                            {!! $setting->usage_policy !!}
                        </div>
                    @endif

                </div>

            </div>
        </div>
    </section>

@endsection
