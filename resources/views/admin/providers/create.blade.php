@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">اضافة مزود خدمة</h3>
                            </div>
                        </div>

                    </div>

                    <form method="POST" action="{{url('/admin/providers/store')}}" enctype="multipart/form-data">

                        <div class="card-body">

                            {{csrf_field()}}

                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الاسم</label>
                                            <input type="text" name="name" value="{{old('name')}}" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('name')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">رقم الهاتف</label>
                                            <input type="text" name="phone" value="{{old('phone')}}" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('phone')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >المدينة</label>
                                            <select name="city_id" class="form-control form-control-alternative">
                                                <option disabled selected>اختر المدينة</option>
                                                @foreach($cities as $city)
                                                    <option value="{{$city->id}}">{{$city->title}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger">{{$errors->first('city_id')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">التخصص</label>
                                            <select name="specialty_id" class="form-control form-control-alternative">
                                                <option disabled selected>اختر التخصص</option>
                                                @foreach($specialties as $row)
                                                    <option value="{{$row->id}}">{{$row->title}}</option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger">{{$errors->first('specialty_id')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label class="form-control-label">الوصف (اختياري)</label>
                                            <textarea name="description" rows="7" class="form-control form-control-alternative">{{old('description')}}</textarea>
                                            <p class="text-danger">{{$errors->first('image')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الصورة</label>
                                            <input type="file" name="image" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('image')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">مميز ؟</label>
                                            <div class="row mt-3">
                                                <div class="col-6">
                                                    <div class="custom-control custom-radio mb-3">
                                                        <input name="is_special" value="1" class="custom-control-input" id="special" type="radio">
                                                        <label class="custom-control-label" for="special">مميز</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="custom-control custom-radio mb-3">
                                                        <input name="is_special" value="0" class="custom-control-input" id="not_special" type="radio" checked>
                                                        <label class="custom-control-label" for="not_special">غير مميز</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="حفظ">
                                <a href="{{url('admin/providers')}}" class="btn btn-secondary">رجوع</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection
