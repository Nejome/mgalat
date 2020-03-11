@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7 mb-7">

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">

                            <div class="col">
                                <h2 class="mb-0">المحادثات</h2>
                            </div>

                        </div>

                        @if(session()->has('deleted'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
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
                                <th scope="col">الاسم</th>
                                <th scope="col">العنوان</th>
                                <th scope="col">البريد الالكتروني</th>
                                <th scope="col">رقم الهاتف</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($rooms as $row)

                                <tr class="text-center">

                                    <td>{{$row->name}}</td>

                                    <td>{{$row->title}}</td>

                                    <td>{{$row->email}}</td>

                                    <td>{{$row->phone}}</td>

                                    <td>{{$row->created_at->toDayDateTimeString()}}</td>

                                    <td>

                                        <a href="{{url('admin/chats/'.$row->id.'/chat')}}">
                                            <i class="fas fa-eye text-green"></i>
                                        </a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="#" onclick="delete_confirm('{{$row->id}}', '{{url('admin/chats/'.$row->id.'/delete')}}')">
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
            var result = confirm('هل انت متأكد انك تريد حذف هذه المحادثة؟');
            if(result){
                location.href = url;
            }
        }
    </script>

@endsection
