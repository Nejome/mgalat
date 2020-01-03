@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7 mb-7">

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">الاقسام</h2>
                            </div>
                            <div class="col-4 text-left">
                                <a href="{{url('admin/departments/create')}}" class="btn btn-sm btn-primary">اضافة قسم</a>
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

                        @if(session()->has('updated'))
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('updated')}}</span>
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

                        @if(session()->has('delete_error'))
                            <div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('delete_error')}}</span>
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
                                <th scope="col">الاسم</th>
                                <th scope="col">الصورة</th>
                                <th scope="col">الايقونة</th>
                                <th scope="col">اللون</th>
                                <th scope="col">التخصصات</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($departments as $department)
                                <tr class="text-center">

                                    <td>{{$department->title}}</td>

                                    <td><img src="{{asset('uploads/departmentsImages/'.$department->image)}}" width="70px" height="70px"></td>

                                    <td style="background-color: #777777;"><img src="{{asset('uploads/svg/'.$department->icon)}}" width="50px" height="50px"></td>

                                    <td><div class="m-auto" style="background-color: {{$department->color}}; color: {{$department->color}}; width: 40px; height: 40px; border-radius: 50%;">color</div></td>

                                    <td>{{$department->specialty->count()}}</td>

                                    <td>
                                        <a href="{{url('admin/departments/'.$department->id.'/edit')}}">
                                            <i class="fas fa-pen text-warning"></i>
                                        </a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="#" onclick="delete_confirm('{{$department->id}}', '{{url('admin/departments/'.$department->id.'/delete')}}')">
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

    <script>
        function delete_confirm(id, url) {
            var result = confirm('هل انت متأكد انك تريد حذف هذا القسم ؟');
            if(result){
                location.href = url;
            }
        }
    </script>

@endsection
