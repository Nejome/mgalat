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

                    @if(session()->has('room_not_exist'))
                        <div class="alert alert-danger">{{session()->get('room_not_exist')}}</div>
                    @endif

                    <h1>يسعدنا تواصلكم معنا عبر الدردشة</h1>
                    <p>قم بتعبئة النموذج ادناه لبدء الدردشة فوراً مع الادارة.. شكراً لتواصلكم معنا</p>

                    <form method="POST" action="{{url('support/start-chat')}}" class="row">

                        {{csrf_field()}}

                        <div class="form-group col-md-4 mb-3">
                            <input name="name" type="text" value="{{old('name')}}" class="form-control" placeholder="الاسم بالكامل" required>
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <input name="email" type="email" value="{{old('email')}}" class="form-control" placeholder="البريد الالكتروني" required>
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        </div>

                        <div class="form-group col-md-4 mb-3">
                            <input name="phone" type="text" value="{{old('phone')}}" class="form-control" placeholder="رقم الهاتف" required>
                            <p class="text-danger">{{$errors->first('phone')}}</p>
                        </div>

                        <div class="form-group col-md-12 mb-3">
                            <input name="title" type="text" value="{{old('title')}}" class="form-control" placeholder="العنوان" required>
                            <p class="text-danger">{{$errors->first('title')}}</p>
                        </div>

                        <div class="form-group col-12">
                            <textarea name="description" class="form-control" rows="8" placeholder="الرسالة" required>{{old('description')}}</textarea>
                            <p class="text-danger">{{$errors->first('description')}}</p>
                        </div>

                        <div class="form-group m-auto">
                            <button class="btn btn-primary pr-5 pl-5">بدء الدردشة</button>
                        </div>

                    </form>

                </div>

            </div>
        </div>
    </section>

@endsection
