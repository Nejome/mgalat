@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-10 order-xl-1 m-auto">
                <div class="card bg-secondary shadow mb-5">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">تعديل الدولة</h3>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{url('admin/countries/'.$country->id.'/update')}}" enctype="multipart/form-data">

                        {{csrf_field()}}

                        <div class="card-body">

                            @if($errors->any())
                                <ul class="alert alert-danger">
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">العنوان (عربي)</label>
                                        <input type="text" name="title_ar" value="{{$country->getTranslation('title', 'ar')}}" class="form-control form-control-alternative">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">العنوان (English)</label>
                                        <input type="text" name="title_en" value="{{$country->getTranslation('title', 'en')}}" class="form-control form-control-alternative">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">المفتاح</label>
                                        <input type="text" name="code" value="{{$country->code}}" class="form-control form-control-alternative">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">الصورة الجديدة (اختياري)</label>
                                        <input type="file" name="flag" class="form-control form-control-alternative">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">الصورة الحالة</label>
                                        <img src="{{asset('uploads/countries/'.$country->flag)}}" width="100%">
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-primary" value="تعديل">
                            <a href="{{url('/admin/countries')}}" class="btn btn-secondary">الغاء</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
