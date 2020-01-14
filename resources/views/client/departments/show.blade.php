@extends('client.layouts.master')

@section('content')

    <section class="text-center pt-5" style="margin-top: 85px;">
        <h1>مجالات تك الرئيسية</h1>
        <p>يمكنك اختيار احد المجالات التالية للوصول الي افضل مقدمي الخدمات</p>

        @include('client.layouts.searchForm')

    </section>

    <div class="container">
        <hr class="mt-5">
    </div>

    <section class="mb-5">
        <div class="container">
            <div class="row mt-5 mb-5">
                <div class="col-md-6 text-right">
                    <h5 class="d-inline-block pt-2 ml-5">{{$special_providers_count}} &nbsp; مزود خدمة مميز</h5>
                    <h5 class="d-inline-block pt-2 ml-5">{{$normal_providers_count}} &nbsp; مزود خدمة عادي</h5>
                    <h5 class="d-inline-block pt-2">{{$specialties->count()}} &nbsp; تخصص</h5>
                </div>

                <div class="col-md-6">

                    <form method="GET" action="{{url('/departments/'.$department->id.'/show')}}">

                        <div class="form-group row">

                            <div class="col-md-4 p-1">
                                <select name="type" class="form-control">
                                    <option value="" selected style="color: #777777;">نوع مزود الخدمة</option>
                                    <option value="1">مميز</option>
                                    <option value="0">غير مميز</option>
                                </select>
                            </div>

                            <div class="col-md-5 p-1">
                                <select name="specialty" class="form-control ">
                                    <option value="" selected style="color: #777777">تخصص مزود الخدمة</option>
                                    @foreach($specialties as $row)
                                        <option value="{{$row->id}}">{{$row->title}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3 p-1">
                                <input type="submit" class="btn btn-primary w-50" value="فرز" style="background: #2386c9;">
                                <a href="{{url('departments/'.$department->id.'/show')}}" class="btn btn-secondary">الكل</a>
                            </div>

                        </div>

                    </form>

                </div>

            </div>
            <div class="col-12 mb-3 text-right">
                <h5>{{$providers->count()}} &nbsp; مزود خدمة</h5>
            </div>

            <div class="row">

                @if($providers->count() > 0)
                    @foreach($providers as $row)
                        <div class="col-md-4 mb-4">
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
                    <div class="col-md-12 text-center mt-5 mb-5">
                        <h1 class="">عفوا لم يتم العثور علي نتائج مطابقة</h1>
                    </div>
                @endif

            </div>

        </div>
    </section>

@endsection
