@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row mt-5 mb-5">

            <div class="col-md-12 mb-5">
                <div class="card shadow">

                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">مزودي الخدمات في انتظار الموافقة</h2>
                            </div>

                            @hasrole('superAdmin')
                            <div class="col-4 text-left">
                                <a href="{{url('admin/providers/create')}}" class="btn btn-sm btn-primary">اضافة مزود خدمة</a>
                            </div>
                            @endhasrole
                        </div>

                        @if(session()->has('activated'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('activated')}}</span>
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

                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col">الاسم</th>
                                <th scope="col">الدولة</th>
                                <th scope="col">التخصص</th>
                                <th scope="col">النشاط</th>
                                <th scope="col">الحالة</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($new_providers as $provider)
                                <tr class="text-center">

                                    <td>{{$provider->name}}</td>

                                    <td>{{$provider->country->title}}</td>

                                    <td>{{$provider->specialty->title}}</td>

                                    <td>
                                        @if($provider->active == 1)
                                            <span class="text-success">نشط</span>
                                        @elseif($provider->active == 0)
                                            <span class="text-blue">في انتظار الموافقة</span>
                                        @elseif($provider->active == 3)
                                            <span class="text-danger">معطل</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($provider->status == 1)
                                            <span class="text-success">متصل</span>
                                        @else
                                            <span class="text-danger">غير متصل</span>
                                        @endif
                                    </td>

                                    <td>

                                        @can('قبول رفض وتعطيل اعلان مزودي الخدمات')

                                            @if($provider->active == 0 || $provider->active == 3)
                                                <a href="#" onclick="active_confirm('{{$provider->id}}', '{{url('admin/providers/'.$provider->id.'/active')}}')" data-toggle="tooltip" data-placement="top" data-original-title="تفعيل">
                                                    <i class="fas fa-lock-open text-success"></i>
                                                </a>&nbsp;&nbsp;&nbsp;
                                            @elseif($provider->active == 1)
                                                <a href="#" onclick="disable_confirm('{{$provider->id}}', '{{url('admin/providers/'.$provider->id.'/disable')}}')" data-toggle="tooltip" data-placement="top" data-original-title="تعطيل">
                                                    <i class="fas fa-lock text-danger"></i>
                                                </a>&nbsp;&nbsp;&nbsp;
                                            @endif

                                        @endcan

                                        @canany(['قبول رفض وتعطيل اعلان مزودي الخدمات', 'عرض بيانات وتحديد مواقع مزودي الخدمات'])
                                            <a href="{{url('admin/providers/'.$provider->id.'/show')}}" data-toggle="tooltip" data-placement="top" data-original-title="عرض">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>&nbsp;&nbsp;&nbsp;
                                        @endcanany

                                        @hasrole('superAdmin')

                                        <a href="#" onclick="delete_confirm('{{$provider->id}}', '{{url('admin/providers/'.$provider->id.'/delete')}}')" data-toggle="tooltip" data-placement="top" data-original-title="حذف">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>&nbsp;&nbsp;&nbsp;

                                        @endhasrole

                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

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

    <script>
        function delete_confirm(id, url) {
            var result = confirm('هل انت متأكد انك تريد حذف مزود الخدمة هذا ؟');
            if(result){
                location.href = url;
            }
        }

        function active_confirm(id, url) {
            var result = confirm('هل انت متأكد انك تريد تفعيل مزود الخدمة هذا ؟');
            if(result){
                location.href = url;
            }
        }

    </script>

@endsection
