@extends('client.layouts.master')

@section('content')

    <section class="text-center pt-5" style="margin-top: 85px;">

        <h1>مجالات تك الرئيسية</h1>
        <p>يمكنك اختيار احد المجالات التالية للوصول الي افضل مقدمي الخدمات</p>

        @include('client.layouts.searchForm')

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