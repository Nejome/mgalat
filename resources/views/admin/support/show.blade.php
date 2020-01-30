@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">تفاصيل الاستعلام</h3>
                            </div>
                        </div>

                    </div>

                    <div class="card-body">

                        <div class="pl-lg-4">

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label" >الاسم</label>
                                        <p>{{$support->name}}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">البريد الالكتروني</label>
                                        <p>{{$support->email}}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control-label">رقم الهاتف</label>
                                        <p>{{$support->phone}}</p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-control-label">الموضوع</label>
                                        <p>{{$support->subject}}</p>
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3 mb-3">
                                    <div class="form-group">
                                        <p>{{$support->description}}</p>
                                    </div>
                                </div>

                                <div class="col-md-6 text-left mr-auto">
                                    <div class="form-group">
                                        {{$support->created_at->toDayDateTimeString()}}
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="text-center">
                            <a href="{{url('admin/support')}}" class="btn btn-secondary">رجوع</a>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

@endsection
