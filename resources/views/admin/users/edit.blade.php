@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">تعديل بيانات المدير</h3>
                            </div>
                        </div>
                    </div>

                    <form method="POST" action="{{url('/admin/users/'.$user->id.'/update')}}">

                        <div class="card-body">

                            {{csrf_field()}}

                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >الاسم</label>
                                            <input type="text" value="{{$user->name}}" name="name" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('name')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">البريد الإلكتروني</label>
                                            <input type="email" value="{{$user->email}}" name="email" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('email')}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12"><hr></div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group focused">
                                            <label class="form-control-label" >كلمة المرور</label>
                                            <input type="password" name="password" class="form-control form-control-alternative">
                                            <p class="text-danger">{{$errors->first('password')}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">تأكيد كلمة المرور</label>
                                            <input type="password" name="password_confirmation" class="form-control form-control-alternative">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12"><hr></div>

                                <h3>الصلاحيات</h3>

                                <div class="row">
                                    @foreach($permissions as $permission)
                                        <div class="col-md-6 mb-2">
                                            <div class="custom-control custom-control-alternative custom-checkbox">
                                                <input type="checkbox" name="permissions[]" class="custom-control-input" value="{{$permission->id}}" id="{{$permission->id}}" @if($user_permissions->contains('name', $permission->name)) checked @endif>
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
                                <input type="submit" class="btn btn-primary" value="حفظ">
                                <a href="{{url('admin/users')}}" class="btn btn-secondary">رجوع</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

@endsection
