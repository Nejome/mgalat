@extends('client.layouts.master')

@section('content')

   <section class="welcome-banner mb-30">
       <h1>مرحباً بكم في مجالات تك</h1>
   </section>

    <div class="container mt-5 mb-5">

        <div class="row">

            <div class="col-md-8">
                <div class="welcome-title">
                    <h4 class="text-right">تسجيل حساب جديد</h4>
                    <div class="welcome-title-border"></div>

                    <form>
                        <div class="form-group text-right pr-2">
                            <span class="ml-5">تسجيل حساب جديد: </span>
                            <div class="radio-container ml-3">
                                <input class="form-check-input" id="type1" type="radio" name="type" value="1" checked>
                                <label class="form-check-label" for="type1">شركة</label>
                            </div>
                            <div class="radio-container">
                                <input class="form-check-input" id="type2" type="radio" name="type" value="1">
                                <label class="form-check-label" for="type2">محترف</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="اسم الشركة">
                            </div>
                            <div class="col-md-6">
                                <select class="form-control">
                                    <option disabled selected>التصنيف</option>
                                    <option>الاجهزة الالكترونية</option>
                                    <option>النظافة</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="اسم المستخدم">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="الاسم">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="الكلية">
                            </div>
                            <div class="col-md-6">
                                <select class="form-control">
                                    <option disabled selected>الجنس</option>
                                    <option>ذكر</option>
                                    <option>انثي</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="رقم الهاتف">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="البريد الالكتروني">
                            </div>
                        </div>
                        <div class="form-check text-right pr-4">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                أوافق علي أحكام وشروط الاستخدام
                            </label>
                        </div>
                        <div class="form-group text-center">
                            <a href="{{url('/verification-code')}}" class="btn btn-primary">تسجيل الأن</a>
                        </div>
                    </form>

                </div>
            </div>

            <div class="col-md-4">
                <div class="welcome-title">
                    <h4 class="text-right">تسجيل الدخول</h4>
                    <div class="welcome-title-border"></div>

                    <form>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="رقم الهاتف">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="كلمة المرور">
                        </div>
                        <div class="form-check text-right pr-4">
                            <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                            <label class="form-check-label" for="defaultCheck1">
                                تذكرني
                            </label>
                        </div>
                        <div class="form-group text-center">
                            <a href="{{url('/verification-code')}}" class="btn btn-primary">تسجيل الدخول</a>
                        </div>
                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection
