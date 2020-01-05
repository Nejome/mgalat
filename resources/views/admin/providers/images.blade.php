@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">صور مزود الخدمة</h3>
                            </div>
                            <div class="col-4 text-left">
                                <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-image">اضافة صورة</a>
                            </div>
                        </div>

                            <div class="modal fade" id="create-image" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">

                                        <div class="modal-body p-0">

                                            <div class="card bg-secondary shadow border-0">
                                                <div class="card-header bg-transparent pb-1">
                                                    <h2 class="text-muted text-center mt-2 mb-3">اضافة صورة</h2>
                                                </div>
                                                <div class="card-body px-lg-5 py-lg-5">

                                                    <form method="POST" action="{{url('admin/providers/'.$provider->id.'/store_image')}}" role="form" enctype="multipart/form-data">

                                                        {{csrf_field()}}

                                                        <div class="form-group mb-3">
                                                            <label class="float-right">العنوان باللغة العربية</label>
                                                            <div class="input-group input-group-alternative">
                                                                <input class="form-control" type="text" name="title_ar">
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label class="float-right">العنوان باللغة الانجليزية</label>
                                                            <div class="input-group input-group-alternative">
                                                                <input class="form-control" type="text" name="title_en">
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3">
                                                            <label class="float-right">الصورة</label>
                                                            <div class="input-group input-group-alternative">
                                                                <input class="form-control" type="file" name="image">
                                                            </div>
                                                        </div>

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

                        @if(session()->has('created'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('created')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('max'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('max')}}</span>
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

                    <div class="card-body">
                        <div class="row">

                            <div class="col-12 text-left">{{$setting->max_providers_images}} / {{$images->count()}}</div>

                            @foreach($images as $image)
                                <div class="col-md-4">
                                    <div class="bg-white p-0">
                                        <img src="{{asset('uploads/providers_images/'.$image->image)}}" width="100%" height="200px">
                                        <p class="text-right mt-2 pr-2 pl-2 pt-1">
                                            {{$image->title}}
                                            <a href="#" onclick="delete_confirm('{{$image->id}}', '{{url('admin/providers/'.$image->id.'/delete_image')}}')" class="text-danger text-left d-block mr-auto"><i class="fa fa-trash"></i></a>
                                        </p>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>

                        <div class="card-footer text-center">
                            <a href="{{url('admin/providers')}}" class="btn btn-secondary">رجوع</a>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

    <script>
        function delete_confirm(id, url) {
            var result = confirm('هل انت متأكد انك تريد حذف هذه الصورة ؟');
            if(result){
                location.href = url;
            }
        }
    </script>

@endsection

