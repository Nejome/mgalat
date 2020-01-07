@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row mt-5 mb-5">

            @can('الدعم الفني')
                <div class="col-xl-7 mb-5 mb-xl-0">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">الاستعلامات الاخيرة</h3>
                                </div>
                                <div class="col text-left">
                                    <a href="{{url('admin/support')}}" class="btn btn-sm btn-primary">عرض الكل</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">

                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr class="text-center">
                                    <th scope="col">الاسم</th>
                                    <th scope="col">الموضوع</th>
                                    <th scope="col">التاريخ</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($last_5_support as $row)

                                    <tr class="text-center">

                                        <td>{{$row->name}}</td>

                                        <td>{{$row->subject}}</td>

                                        <td>{{$row->created_at->toDayDateTimeString()}}</td>

                                        <td>

                                            <a href="{{url('admin/support/'.$row->id.'/show')}}">
                                                <i class="fas fa-eye text-green"></i>
                                            </a>

                                        </td>

                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endcan

            @can('ادارة المدونة')
                <div class="col-xl-5">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h3 class="mb-0">المقالات الاخيرة</h3>
                                </div>
                                <div class="col text-left">
                                    <a href="{{url('admin/posts')}}" class="btn btn-sm btn-primary">عرض الكل</a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">

                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr class="text-center">
                                    <th scope="col">العنوان</th>
                                    <th scope="col">المشاهدات</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($last_5_posts as $row)

                                    <tr class="text-center">

                                        <td>{{$row->title}}</td>

                                        <td>{{$row->views}}</td>

                                    </tr>

                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            @endcan

        </div>

    </div>

@endsection
