@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">بيانات مزود الخدمة</h3>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        {{csrf_field()}}

                        <div class="pl-lg-4">

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group focused">
                                        <label class="form-control-label text-muted" >الاسم</label>
                                        <p class="font-weight-bold">{{$provider->name}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label text-muted">رقم الهاتف</label>
                                        <p class="font-weight-bold">{{$provider->phone}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label text-muted">الدولة</label>
                                        <p class="font-weight-bold">{{$provider->country->title}}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label text-muted">التخصص</label>
                                        <p class="font-weight-bold">{{$provider->specialty->title}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label text-muted">الوصف</label>
                                        <p class="font-weight-bold">@if($provider->description == '') لم يضاف بعد @else {{$provider->description}} @endif</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label text-muted">مميز ؟</label>
                                        <p class="font-weight-bold">@if($provider->is_special == 1) نعم @else لا @endif</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label text-muted">مميز حتي</label>
                                        <p class="font-weight-bold">@if($provider->is_special == 1) {{$provider->special_until}} @else غير مميز @endif</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label text-muted" >الصورة</label>
                                        <img src="{{asset('uploads/providers/'.$provider->image)}}" width="100%" height="300px">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="text-center">
                            <a href="{{url('admin/providers')}}" class="btn btn-secondary">رجوع</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection
