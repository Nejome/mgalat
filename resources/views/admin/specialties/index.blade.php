@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h3 class="mb-0">التخصصات</h3>
                            </div>
                            <div class="col-6 text-left">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#CreateModal">اضافة تخصص</a>
                            </div>

                            <div class="modal fade" id="CreateModal" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <div class="card bg-secondary shadow border-0">
                                                <div class="card-header bg-transparent">
                                                    <div class="text-muted text-center mt-2 mb-2">اضافة تخصص</div>
                                                </div>
                                                <div class="card-body px-lg-5 py-lg-5">

                                                    <form method="POST" action="{{url('/admin/specialties/store')}}" role="form" enctype="multipart/form-data">
                                                        {{csrf_field()}}
                                                        <div class="text-center text-muted mb-2">
                                                            <small>العنوان (العربي)</small>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <div class="input-group input-group-alternative">
                                                                <input type="text" name="title_ar" class="form-control" placeholder="Title">
                                                            </div>
                                                        </div>

                                                        <div class="text-center text-muted mb-2">
                                                            <small>العنوان (English)</small>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <div class="input-group input-group-alternative">
                                                                <input type="text" name="title_en" class="form-control" placeholder="Title">
                                                            </div>
                                                        </div>

                                                        <div class="text-center text-muted mb-2">
                                                            <small>القسم</small>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <div class="input-group input-group-alternative">
                                                                <select name="department_id" class="form-control">
                                                                    <option disabled selected>اختر القسم</option>
                                                                    @foreach($departments as $row)
                                                                        <option value="{{$row->id}}">{{$row->title}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="text-center text-muted mb-2">
                                                            <small>الصورة</small>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <div class="input-group input-group-alternative">
                                                                <input type="file" name="image" class="form-control" placeholder="الصورة">
                                                            </div>
                                                        </div>

                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary my-4">اضافة</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @if($errors->any())
                            <ul class="alert alert-danger mt-3">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if(session()->has('created'))
                            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                                <span class="alert-inner--text">{{session()->get('created')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('updated'))
                            <div class="alert alert-warning alert-dismissible fade show mt-3" role="alert">
                                <span class="alert-inner--text">{{session()->get('updated')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('delete_error'))
                            <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('delete_error')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('deleted'))
                            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                                <span class="alert-inner--text">{{session()->get('deleted')}}</span>
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
                                <th scope="col">العنوان (العربي)</th>
                                <th scope="col">العنوان (English)</th>
                                <th scope="col">الصورة</th>
                                <th scope="col">القسم</th>
                                <th scope="col">مزودي الخدمات</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($specialties as $row)
                                <tr class="text-center">

                                    <td>{{$row->getTranslation('title', 'ar')}}</td>
                                    <td>{{$row->getTranslation('title', 'en')}}</td>
                                    <td>@if($row->image) <img src="{{asset('uploads/specialtiesImages/'.$row->image)}}" width="70px" height="70px"> @else - @endif</td>
                                    <td>{{$row->department->title}}</td>
                                    <td>{{$row->providers->count()}}</td>

                                    <td>
                                        <a href="{{url('admin/specialties/'.$row->id.'/edit')}}">
                                            <i class="fas fa-pen text-warning"></i>
                                        </a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="#" onclick="delete_confirm('{{$row->id}}', '{{url('admin/specialties/'.$row->id.'/delete')}}')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer">
                        {{$specialties->links()}}
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script>
        function delete_confirm(id, url) {
            var result = confirm('هل انت متأكد انك تريد حذف هذا التخصص ؟');
            if(result){
                location.href = url;
            }
        }
    </script>

@endsection
