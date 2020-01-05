@extends('client.layouts.master')

@section('content')

    <section class="text-center pt-5" style="margin-top: 85px;">
        <h1>مجالات تك الرئيسية</h1>
        <p>يمكنك اختيار احد المجالات التالية للوصول الي افضل مقدمي الخدمات</p>
        <div class="col-md-8 m-auto">

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

    <input type="hidden" id="locationsCount" value="{{$providers->count()}}">
    <input id="icon" type="hidden" value="{{asset('client/images/placeholder.svg')}}">
    @if($providers->count() > 0)
        @php $x = 1; @endphp
        @foreach($providers as $row)
            <input type="hidden" id="image{{$x}}" value="{{asset('uploads/providers/'.$row->image)}}">
            <input type="hidden" id="name{{$x}}" value="{{$row->name}}">
            <input type="hidden" id="lat{{$x}}" value="{{$row->location->lat}}">
            <input type="hidden" id="lng{{$x}}" value="{{$row->location->lng}}">
            @php $x = $x +1; @endphp
        @endforeach
    @endif

    @if($providers->count() > 0)
        <section class="mt-5 mb-4">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="searchMap" style="width: 100%; height: 450px;"></div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <section class="mb-5">
        <div class="container">

            <div class="row mt-5 mb-5">
                <div class="col-md-6 text-right">
                    <h5 class="d-inline-block pt-2 ml-5">{{$special_providers_count}} &nbsp; مزود خدمة مميز</h5>
                    <h5 class="d-inline-block pt-2 ml-5">{{$normal_providers_count}} &nbsp; مزود خدمة عادي</h5>
                    <h5 class="d-inline-block pt-2">{{$specialties->count()}} &nbsp; تخصص</h5>
                </div>
            </div>
            <div class="col-12 mb-3 text-right">
                <h5>{{$providers->count()}} &nbsp; مزود خدمة</h5>
            </div>

            <div class="row">
                @if($providers->count() > 0)
                    @foreach($providers as $row)
                        <div class="col-md-3 mb-4">
                            <img src="{{asset('uploads/providers/'.$row->image)}}" width="100%" height="200px">
                            <div class="text-right mt-3">
                                <span style="font-size: 16px;">{{$row->specialty->title}}</span>
                                <a href="{{url('/services_providers/'.$row->id.'/details')}}"><h3 style="margin-bottom: 0;">{{$row->name}}</h3></a>
                                <div>
                                    <div class="stars d-inline-block m-2">
                                        <i class="fa fa-star @if($row->ratingTotal() >= 1) filled-star-selected @endif"></i>
                                        <i class="fa fa-star @if($row->ratingTotal() >= 2) filled-star-selected @endif"></i>
                                        <i class="fa fa-star @if($row->ratingTotal() >= 3) filled-star-selected @endif"></i>
                                        <i class="fa fa-star @if($row->ratingTotal() >= 4) filled-star-selected @endif"></i>
                                        <i class="fa fa-star @if($row->ratingTotal() >= 5) filled-star-selected @endif"></i>
                                    </div>
                                    <span><i class="fa fa-thumbs-o-up"></i>({{$row->rate->count()}} تقييمات)</span>
                                </div>
                            </div>
                            @if($row->is_special)
                                <button class="checked-btn in-image" disabled>
                                    <span class="checked-btn-icon"><i class="fa fa-check sp-tags-icon"></i></span>
                                    مميز
                                </button>
                            @endif
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 text-center mt-5">
                        <h1 class="">عفوا لم يتم العثور علي نتائج بحث مطابقة</h1>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
