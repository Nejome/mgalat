@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">الصلاحيات</h2>
                            </div>
                            <div class="col-4 text-left">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create_permission_modal">اضافة صلاحية</a>
                            </div>
                        </div>

                        <div class="modal fade" id="create_permission_modal" tabindex="-1" role="dialog" aria-labelledby="modal-form" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                <div class="modal-content">
                                    <div class="modal-body p-0">
                                        <div class="card bg-secondary shadow border-0">

                                            <div class="card-header bg-transparent">
                                                <div class="text-muted text-center"><small>اضافة صلاحية</small></div>
                                            </div>

                                            <div class="card-body px-lg-5 py-lg-5">

                                                <form method="POST" action="{{url('/admin/dev/permissions/store')}}" role="form">

                                                    {{csrf_field()}}

                                                    <div class="form-group mb-3">
                                                        <div class="form-group focused">
                                                            <label class="form-control-label" >الاسم</label>
                                                            <input type="text" name="name" class="form-control form-control-alternative">
                                                        </div>
                                                    </div>

                                                    @if(!$roles->isEmpty())
                                                        <hr>
                                                    <h3>تعيين الصلاحية للادوار</h3>

                                                    <div class="row my-4">
                                                        @foreach($roles as $role)
                                                            <div class="col-12">
                                                                <div class="custom-control custom-control-alternative custom-checkbox">
                                                                    <input name="roles" class="custom-control-input" id="{{$role->id}}" type="checkbox">
                                                                    <label class="custom-control-label" for="{{$role->id}}">
                                                                        <span class="text-muted">{{$role->name}}</span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                         @endforeach
                                                    </div>
                                                    @endif

                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary my-4">حفظ</button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if(session()->has('added'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('added')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('deleted'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('deleted')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if($errors->any())
                            <ul class="alert alert-danger mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if(session()->has('updated'))
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('updated')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col">اسم الصلاحية</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($permissions as $permission)
                                <tr class="text-center">
                                    <td>{{$permission->name}}</td>
                                    <td>
                                        <a href="{{url('admin/dev/permissions/'.$permission->id.'/edit')}}">
                                            <i class="fas fa-pen text-warning"></i>
                                        </a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="{{url('admin/dev/permissions/'.$permission->id.'/delete')}}">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
