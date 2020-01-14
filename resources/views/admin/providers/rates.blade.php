@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7 mb-7">

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">تقييمات {{$provider->name}}</h2>
                            </div>
                            <div class="col-4 text-left">
                                <a href="{{url('admin/providers')}}" class="btn btn-sm btn-secondary">رجوع</a>
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
                                <th scope="col">#</th>
                                <th scope="col">التعليق</th>
                                <th scope="col">الطاقم</th>
                                <th scope="col">الوقت</th>
                                <th scope="col">الجودة</th>
                                <th scope="col">التعامل مره اخري</th>
                                <th scope="col">السعر</th>
                                <th scope="col">المجموع</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @php $x = 1; @endphp
                            @foreach($provider->rate as $row)

                                <tr class="text-center">

                                    <td>{{$x}}</td>

                                    <td>{{$row->comment}}</td>

                                    <td>5/{{$row->team}}</td>

                                    <td>5/{{$row->time}}</td>

                                    <td>5/{{$row->good}}</td>

                                    <td>5/{{$row->another}}</td>

                                    <td>5/{{$row->price}}</td>

                                    <td>5/{{$row->total}}</td>

                                    <td>{{$row->created_at->diffForHumans()}}</td>

                                    <td>
                                        <a href="#" onclick="delete_confirm('{{$row->id}}', '{{url('admin/providers/rates/'.$row->id.'/delete')}}')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </td>

                                </tr>

                                @php $x += 1; @endphp
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
            var result = confirm('هل انت متأكد انك تريد حذف هذا التقييم ؟');
            if(result){
                location.href = url;
            }
        }
    </script>

@endsection
