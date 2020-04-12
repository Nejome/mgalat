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
                        <a class="d-inline-block mt-1 mt-xyatechl-0" href="{{$setting->ios_link}}">
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

                <div class="col-md-7 m-auto order-1 order-md-2 mb-sm-5 text-center">

                    <client-chat tokenprop="{{$room->token}}" roomid="{{$room->id}}" imageprop="{{asset('cp/images/loading.gif')}}"></client-chat>

                    <a href="#" onclick="exist_confirm('{{url('/')}}')" class="btn btn-danger">انهاء المحادثة</a>

                </div>

            </div>
        </div>
    </section>

    <script>
        function exist_confirm(url) {
            var result = confirm('هل انت متأكد انك تريد انهاء المحادثة؟');
            if(result){
                location.href = url;
            }
        }
    </script>

@endsection
