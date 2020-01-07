@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">تعديل بيانات القسم</h3>
                            </div>
                        </div>

                    </div>

                    <form method="POST" action="{{url('/admin/departments/'.$department->id.'/update')}}" enctype="multipart/form-data">

                        <div class="card-body">

                            {{csrf_field()}}

                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الاسم (عربي)</label>
                                            <input type="text" name="title_ar" value="{{$department->getTranslation('title', 'ar')}}" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('title_ar')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">الاسم (English)</label>
                                            <input type="text" name="title_en" value="{{$department->getTranslation('title', 'en')}}" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('title_en')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" >الايقونة الحالية</label>
                                            <img class="d-block m-auto" src="{{asset('uploads/svg/'.$department->icon)}}" width="50px" height="50px">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" >اللون الحالي</label>
                                            <div class="m-auto" style="background-color: {{$department->color}}; color: {{$department->color}}; width: 40px; height: 40px; border-radius: 50%;"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" >الايقونة الجديدة</label>
                                            <input type="file" name="icon" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('icon')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">اللون الجديد (مثال: 78909c#)</label>
                                            <input type="text" name="color" value="{{old('color')}}" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('color')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">الصورة الحالية</label>
                                            <img class="d-block" src="{{asset('uploads/departmentsImages/'.$department->image)}}" width="100%">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">الصورة الجديدة (240 * 360)</label>
                                            <input type="file" name="image" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('image')}}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="تعديل">
                                <a href="{{url('admin/departments')}}" class="btn btn-secondary">رجوع</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection
