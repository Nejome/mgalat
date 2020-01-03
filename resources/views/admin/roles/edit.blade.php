@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">الادوار</h3>
                            </div>
                        </div>

                    </div>

                    <form method="POST" action="{{url('/admin/dev/roles/'.$role->id.'/update')}}">

                        <div class="card-body">
                            {{csrf_field()}}

                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الاسم</label>
                                            <input type="text" value="{{$role->name}}" name="name" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('name')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <hr>
                                <h3>تعيين صلاحيات</h3>

                                <div class="row my-4">
                                    <p class="text-danger">{{$errors->first('permissions')}}</p>
                                    @foreach($permissions as $permission)
                                        <div class="col-12">
                                            <div class="custom-control custom-control-alternative custom-checkbox">
                                                <input type="checkbox" name="permissions[]" class="custom-control-input" value="{{$permission->id}}" id="{{$permission->id}}">
                                                <label class="custom-control-label" for="{{$permission->id}}">
                                                    <span class="text-muted">{{$permission->name}}</span>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="تعديل">
                                <a href="{{url('admin/dev/roles')}}" class="btn btn-secondary mr-3">رجوع</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection
