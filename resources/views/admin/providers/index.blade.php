@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7 mb-7">

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">مزودي الخدمات</h2>
                            </div>

                            @hasrole('superAdmin')
                            <div class="col-4 text-left">
                                <a href="{{url('admin/providers/create')}}" class="btn btn-sm btn-primary">اضافة مزود خدمة</a>
                            </div>
                            @endhasrole
                        </div>

                        @if(session()->has('created'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('created')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('activated'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('activated')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('disabled'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('disabled')}}</span>
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

                        @if(session()->has('contactUpdated'))
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('contactUpdated')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('locationUpdated'))
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('locationUpdated')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('daysUpdated'))
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('daysUpdated')}}</span>
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
                                <th scope="col">المشاهدات</th>
                                <th scope="col">مميز ؟</th>
                                <th scope="col">النشاط</th>
                                <th scope="col">الحالة</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($providers as $provider)
                                <tr class="text-center">

                                    <td>{{$provider->name}}</td>

                                    <td>{{$provider->country->title}}</td>

                                    <td>{{$provider->specialty->title}}</td>

                                    <td>{{$provider->views}}</td>

                                    <td>
                                        @if($provider->is_special == 1)
                                            <span style="color: #ffca36;">نعم</span>
                                        @else
                                            <span class="text-danger">لا</span>
                                        @endif
                                    </td>

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

                                        @can('عرض بيانات وتحديد مواقع مزودي الخدمات')

                                            <a href="{{url('admin/providers/'.$provider->id.'/location')}}" data-toggle="tooltip" data-placement="top" data-original-title="الموقع">
                                                <i class="fa fa-map-marker text-muted"></i>
                                            </a>&nbsp;&nbsp;&nbsp;

                                        @endcan

                                        @canany(['قبول رفض وتعطيل اعلان مزودي الخدمات', 'عرض بيانات وتحديد مواقع مزودي الخدمات'])
                                            <a href="#" data-toggle="tooltip" data-placement="top" data-original-title="عرض">
                                                <i class="fas fa-eye text-primary"></i>
                                            </a>&nbsp;&nbsp;&nbsp;
                                        @endcanany

                                        @hasrole('superAdmin')

                                            <a href="{{url('admin/providers/'.$provider->id.'/edit')}}" data-toggle="tooltip" data-placement="top" data-original-title="المعلومات الاساسية">
                                                <i class="fas fa-pen text-warning"></i>
                                            </a>&nbsp;&nbsp;&nbsp;

                                            <a href="{{url('admin/providers/'.$provider->id.'/contact')}}" data-toggle="tooltip" data-placement="top" data-original-title="معلومات التواصل">
                                                <i class="fas fa-phone text-yellow"></i>
                                            </a>&nbsp;&nbsp;&nbsp;

                                            <a href="{{url('admin/providers/'.$provider->id.'/working_days')}}" data-toggle="tooltip" data-placement="top" data-original-title="ايام العمل">
                                                <i class="fa fa-calendar text-blue"></i>
                                            </a>&nbsp;&nbsp;&nbsp;

                                            <a href="{{url('admin/providers/'.$provider->id.'/images')}}" data-toggle="tooltip" data-placement="top" data-original-title="صور مزود الخدمة">
                                                <i class="fa fa-images text-success"></i>
                                            </a>&nbsp;&nbsp;&nbsp;

                                            <a href="{{url('admin/providers/'.$provider->id.'/rates')}}" data-toggle="tooltip" data-placement="top" data-original-title="التقييمات">
                                                <i class="fa fa-users"></i>
                                            </a>&nbsp;&nbsp;&nbsp;

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

                    <div class="card-footer">
                        {{$providers->links()}}
                    </div>

                </div>
            </div>
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

        function disable_confirm(id, url) {
            var result = confirm('هل انت متأكد انك تريد تعطيل مزود الخدمة هذا ؟');
            if(result){
                location.href = url;
            }
        }

    </script>

@endsection
