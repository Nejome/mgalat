@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">معلومات تواصل مزود خدمة</h3>
                            </div>
                        </div>

                    </div>

                    <form method="POST" action="{{url('/admin/providers/'.$provider->id.'/updateContact')}}">

                        <div class="card-body">

                            {{csrf_field()}}

                            <div class="pl-lg-4">
                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">البريد الالكتروني</label>
                                            <input type="email" value="{{$provider->email}}" name="email" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" >فيس بوك</label>
                                            <input type="text" value="{{$provider->facebook}}" name="facebook" class="form-control form-control-alternative">
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">تويتر</label>
                                            <input type="text" value="{{$provider->twitter}}" name="twitter" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" >انستجرام</label>
                                            <input type="text" value="{{$provider->instagram}}" name="instagram" class="form-control form-control-alternative">
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">واتساب</label>
                                            <input type="text" value="{{$provider->whatsapp}}" name="whatsapp" class="form-control form-control-alternative">
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" >سناب جات</label>
                                            <input type="text" value="{{$provider->snapchat}}" name="snapchat" class="form-control form-control-alternative">
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" >الموقع الالكتروني</label>
                                            <input type="text" value="{{$provider->website}}" name="website" class="form-control form-control-alternative">
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
