@extends('client.layouts.master')

@section('content')

    <section class="text-center pt-5" style="margin-top: 85px;">
        <h1>مجالات تك الرئيسية</h1>
        <p>يمكنك اختيار احد المجالات التالية للوصول الي افضل مقدمي الخدمات</p>
        <div class="col-md-8 m-auto">
            <form class="search-form">
                <div class="row">
                    <div class="col-1 p-0 m-auto">
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 299.997 299.997" style="enable-background:new 0 0 299.997 299.997;" xml:space="preserve">
<g>
    <g>
        <g>
            <circle cx="150.437" cy="110.572" r="24.149"/>
            <path d="M149.996,0C67.157,0,0.001,67.158,0.001,149.997c0,82.837,67.156,150,149.995,150s150-67.163,150-150     C299.996,67.158,232.835,0,149.996,0z M149.685,68.678c0.106,0,0.21-0.005,0.314-0.01c0.104,0.005,0.207,0.01,0.314,0.01     c25.274,0.399,45.834,21.288,45.834,46.568c0,30.908-33.024,62.205-46.148,73.419c-0.877-0.75-1.849-1.595-2.889-2.521     c-0.018-0.016-0.034-0.029-0.049-0.044c-14.524-12.906-43.209-42.045-43.209-70.854     C103.851,89.966,124.413,69.078,149.685,68.678z M150.65,232.25c-27.663,0-55.669-7.936-55.669-23.098     c0-10.641,13.79-17.717,31.569-20.995c3.439,3.457,6.694,6.505,9.55,9.049c-19.366,2.163-30.744,8.294-30.744,11.943     c0,4.484,17.195,12.724,45.294,12.724c28.099,0,45.297-8.24,45.297-12.724c0-3.724-11.858-10.009-31.927-12.052     c2.881-2.573,6.162-5.649,9.627-9.142c18.313,3.188,32.674,10.335,32.674,21.197C206.321,224.314,178.315,232.25,150.65,232.25z"/>
        </g>
    </g>
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
                                <g>
                                </g>
</svg>
                        </a>
                    </div>
                    <div class="col-md-3 m-1 m-md-0 p-0">
                        <select>
                            <option disabled selected>موقعك</option>
                            <option>الرياض</option>
                            <option>جدة</option>
                            <option>المدينة</option>
                        </select>
                    </div>
                    <div class="col-md-3 m-1 m-md-0 p-0">
                        <select>
                            <option disabled selected>التصنيف</option>
                            <option>الهواتف</option>
                            <option>صيانة السيارات</option>
                        </select>
                    </div>
                    <div class="col-md-3 m-1 m-md-0 p-0">
                        <input type="text" placeholder="كلمة البحث">
                    </div>
                    <div class="col-md-2 m-1 m-md-0 p-0">
                        <a href="{{url('/search-result')}}" class="search-btn pt-2">
                            <i class="fa fa-search"></i>
                        </a>
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
                        <img src="{{asset('uploads/departmentsImages/'.$department->image)}}" width="100%" height="230px">
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
