@extends('client.layouts.master')

@section('content')

   <section class="verification-code-section">
       <div class="container">
           <div class="row">

               <div class="col-md-3 text-center order-2 order-md-1 pt-5">
                   <h4>أفضل مقدمي الخدمات بين يديك <span style="color: #2386c9;">مجالات تك</span> - لكل ما تحتاج </h4>

                   <p class="mb-0 mt-3">قم يتحميل التطبيق وتمتع بتلبية طلباتك مجاناً</p>
                   <a href="#">
                       <img src="{{asset('client/images/stores.png')}}" width="100%">
                   </a>
                   <div class="mt-3">
                       <span><a href="#" class="footer-social-link" style="background-color: #3B5998"><i class="fa fa-facebook"></i></a></span>
                       <span><a href="#" class="footer-social-link" style="background-color: #55acee"><i class="fa fa-twitter"></i></a></span>
                       <span><a href="#" class="footer-social-link" style="background-color: #006fde"><i class="fa fa-linkedin"></i></a></span>
                       <span><a href="#" class="footer-social-link" style="background-color: #ff6600"><i class="fa fa-rss"></i></a></span>
                   </div>
               </div>

               <div class="col-10 col-md-7 m-auto verification-code-card row order-1 order-md-2 mb-sm-5">
                   <div class="col-lg-6 p-0">
                       <div class="verification-code-card-title">
                           التحقق من رقم الهاتف
                       </div>
                       <div class="verification-code-card-content">
                           <p>الرجاء ادخال رمز التحقق الذي تم ارساله علي الهاتف الجوال ادناه</p>
                           <h3 dir="ltr">****9879</h3>
                           <h3>رمز التحقق</h3>
                           <form>
                               <div class="form-group">
                                   <input type="text" class="verification-code-input">
                               </div>
                               <div class="mt-5">
                                   <button class="verification-code-btn">تسجيل الدخول</button>
                                   <button class="verification-code-btn">إلغاء</button>
                               </div>
                           </form>
                       </div>
                   </div>
                   <div class="col-lg-6 d-none d-lg-block p-0">
                       <img src="{{asset('client/images/welcome-banner.jpeg')}}" width="100%" height="100%">
                   </div>
               </div>

           </div>
       </div>
   </section>

@endsection
