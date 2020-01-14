@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">ايام عمل مزود خدمة</h3>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{url('/admin/providers/'.$provider->id.'/update_working_days')}}">

                        {{csrf_field()}}

                        <div class="card-body">

                            <div class="pl-lg-4">

                                <p class="text-yellow font-weight-600">- في حال لم تكن هناك قيمة للحقل، او كان اليوم اجازة، فقط اترك الحقل فارغ</p>

                                <div class="row">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h2 style="color: #525f7f;">السبت</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-control-label">من</label>
                                                    <input type="time" value="{{$week['saturday']['from']}}" name="saturday_from" class="form-control form-control-alternative">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-control-label">الي</label>
                                                    <input type="time" value="{{$week['saturday']['to']}}" name="saturday_to" class="form-control form-control-alternative">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h2 style="color: #525f7f;">الاحد</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-control-label">من</label>
                                                    <input type="time" value="{{$week['sunday']['from']}}" name="sunday_from" class="form-control form-control-alternative">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-control-label">الي</label>
                                                    <input type="time" value="{{$week['sunday']['to']}}" name="sunday_to" class="form-control form-control-alternative">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h2 style="color: #525f7f;">الاثنين</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-control-label">من</label>
                                                    <input type="time" value="{{$week['monday']['from']}}" name="monday_from" class="form-control form-control-alternative">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-control-label">الي</label>
                                                    <input type="time" value="{{$week['monday']['to']}}" name="monday_to" class="form-control form-control-alternative">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h2 style="color: #525f7f;">الثلاثاء</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-control-label">من</label>
                                                    <input type="time" value="{{$week['tuesday']['from']}}" name="tuesday_from" class="form-control form-control-alternative">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-control-label">الي</label>
                                                    <input type="time" value="{{$week['tuesday']['to']}}" name="tuesday_to" class="form-control form-control-alternative">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h2 style="color: #525f7f;">الاربعاء</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-control-label">من</label>
                                                    <input type="time" value="{{$week['wednesday']['from']}}" name="wednesday_from" class="form-control form-control-alternative">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-control-label">الي</label>
                                                    <input type="time" value="{{$week['wednesday']['to']}}" name="wednesday_to" class="form-control form-control-alternative">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <h2 style="color: #525f7f;">الخميس</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-control-label">من</label>
                                                    <input type="time" value="{{$week['thursday']['from']}}" name="thursday_from" class="form-control form-control-alternative">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-control-label">الي</label>
                                                    <input type="time" value="{{$week['thursday']['to']}}" name="thursday_to" class="form-control form-control-alternative">
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-6 m-auto">
                                        <div class="form-group">
                                            <h2 style="color: #525f7f;">الجمعة</h2>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="form-control-label">من</label>
                                                    <input type="time" value="{{$week['friday']['from']}}" name="friday_from" class="form-control form-control-alternative">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-control-label">الي</label>
                                                    <input type="time" value="{{$week['friday']['to']}}" name="friday_to" class="form-control form-control-alternative">
                                                </div>
                                            </div>
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
