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

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" >الاسم</label>
                                        <p>{{$support->name}}</p>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label">الموضوع</label>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label">رقم الهاتف</label>
                                    </div>
                                </div>


                                <div class="col-lg-6">
                                    <div class="form-group">

                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">

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
