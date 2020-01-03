@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-10 order-xl-1 m-auto">
                <div class="card bg-secondary shadow mb-5">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">تعديل المدينة</h3>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{url('admin/cities/'.$city->id.'/update')}}">

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
                                        <input type="text" name="title_ar" value="{{$city->getTranslation('title', 'ar')}}" class="form-control form-control-alternative">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">العنوان (English)</label>
                                        <input type="text" name="title_en" value="{{$city->getTranslation('title', 'en')}}" class="form-control form-control-alternative">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-primary" value="تعديل">
                            <a href="{{url('/admin/cities')}}" class="btn btn-secondary">الغاء</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
