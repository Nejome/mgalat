@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">
        <div class="row">

            <div class="col-xl-10 order-xl-1 m-auto">
                <div class="card bg-secondary shadow mb-5">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">تعديل التخصص</h3>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{url('admin/specialties/'.$specialty->id.'/update')}}">

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
                                            <input type="text" name="title_ar" value="{{$specialty->getTranslation('title', 'ar')}}" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">العنوان (English)</label>
                                            <input type="text" name="title_en" value="{{$specialty->getTranslation('title', 'en')}}" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label">التخصص</label>
                                        <select name="department_id" class="form-control form-control-alternative">
                                            @foreach($departments as $row)
                                                <option value="{{$row->id}}" @if($specialty->department_id == $row->id) @endif> {{$row->title}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-primary" value="تعديل">
                            <a href="{{url('/admin/specialties')}}" class="btn btn-secondary">الغاء</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
