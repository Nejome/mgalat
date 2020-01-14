@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">تعديل بيانات مزود الخدمة</h3>
                            </div>
                        </div>

                    </div>

                    <form method="POST" action="{{url('/admin/providers/'.$provider->id.'/update')}}" enctype="multipart/form-data">

                        <div class="card-body">

                            {{csrf_field()}}

                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الاسم</label>
                                            <input type="text" name="name" value="{{$provider->name}}" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('name')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">رقم الهاتف</label>
                                            <input type="text" name="phone" value="{{$provider->phone}}" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('phone')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الدولة</label>
                                            <select name="country_id" class="form-control form-control-alternative">
                                                <option disabled selected>اختر الدولة</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}" @if($country->id == $provider->country_id) selected @endif> {{$country->title}} </option>
                                                @endforeach
                                            </select>
                                            <p class="text-danger">{{$errors->first('country_id')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">التخصص</label>
                                            <select name="specialty_id" class="form-control form-control-alternative">
                                                <option disabled selected>اختر التخصص</option>
                                                @foreach($specialties as $row)
                                                    <option value="{{$row->id}}" @if($row->id == $provider->specialty_id) selected @endif> {{$row->title}} </option>
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
                                            <textarea name="description" rows="7" class="form-control form-control-alternative">{{$provider->description}}</textarea>
                                            <p class="text-danger">{{$errors->first('image')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الصورة الحالية</label>
                                            <img src="{{asset('uploads/providers/'.$provider->image)}}" width="100%" height="300px">
                                            <p class="text-danger">{{$errors->first('image')}}</p>
                                        </div>
                                    </div>
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
                                                        <input name="is_special" value="1" class="custom-control-input" id="special" type="radio" @if($provider->is_special == 1) checked @endif>
                                                        <label class="custom-control-label" for="special">مميز</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="custom-control custom-radio mb-3">
                                                        <input name="is_special" value="0" class="custom-control-input" id="not_special" type="radio" @if($provider->is_special == 0) checked @endif>
                                                        <label class="custom-control-label" for="not_special">غير مميز</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">مميز حتي</label>
                                            <input type="date" name="special_until" value="{{$provider->special_until}}" class="form-control form-control-alternative" @if($provider->is_special != 1) disabled @endif>
                                            <p class="text-danger">{{$errors->first('special_until')}}</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="تعديل">
                                <a href="{{url('admin/providers')}}" class="btn btn-secondary">رجوع</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection
