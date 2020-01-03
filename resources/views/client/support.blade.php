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

                <div class="col-md-7 m-auto order-1 order-md-2 mb-sm-5 text-center">
                    <h1>يسعدنا تواصلكم معنا</h1>
                    <p>سنقوم بالرد علي كافة الأسئلة والاستماع الي الاقتراحات.. شكراً لتواصلكم معنا</p>
                    <form class="row">
                        <div class="form-group col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="الموضوع">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="رقم الهاتف">
                        </div>
                        <div class="form-group col-md-4 mb-3">
                            <input type="text" class="form-control" placeholder="الاسم بالكامل">
                        </div>
                        <div class="form-group col-12">
                            <textarea class="form-control" rows="8" placeholder="شرح"></textarea>
                        </div>
                        <div class="form-group m-auto">
                            <button class="btn btn-primary pr-5 pl-5">تقديم</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

@endsection
