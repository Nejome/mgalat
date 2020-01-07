@extends('client.layouts.master')

@section('content')

    <section class="text-center pt-5" style="margin-top: 85px;">
        <h1>مجالات تك الرئيسية</h1>
        <p>يمكنك اختيار احد المجالات التالية للوصول الي افضل مقدمي الخدمات</p>

        <div class="col-md-7 m-auto">

            <form method="POST" action="{{url('/services_providers/search')}}" class="search-form">

                {{csrf_field()}}

                <div class="row">

                    <div class="col-md-4 m-1 m-md-0 p-0">
                        <select name="city">
                            @foreach($g_cities as $city)
                                <option value="{{$city->id}}">{{$city->title}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 m-1 m-md-0 p-0">
                        <input type="text" name="text" placeholder="كلمة البحث" required>
                    </div>

                    <div class="col-md-2 m-1 m-md-0 p-0">
                        <button type="submit" class="search-btn pt-2"><i class="fa fa-search"></i></button>
                    </div>

                </div>

            </form>

        </div>

    </section>

    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">

                @foreach($departments as $department)
                    <div class="col-md-4 mb-3">
                        <img src="{{asset('uploads/departmentsImages/'.$department->image)}}" width="100%" height="240px">
                        <div class="service-figure">
                        <span style="background-color: {{$department->color}};">
                            <img src="{{asset('uploads/svg/'.$department->icon)}}">
                        </span>
                            <a href="{{url('departments/'.$department->id.'/show')}}" class="department-title">{{$department->title}}</a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
