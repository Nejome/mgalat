@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">اضافة مقال</h3>
                            </div>
                        </div>

                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                                        العربية
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                                        English
                                    </a>
                                </li>

                            </ul>
                        </div>

                    </div>

                    <form method="POST" action="{{url('/admin/posts/store')}}" enctype="multipart/form-data">

                        {{csrf_field()}}

                        <div class="card-body">

                            <div class="pl-lg-4">

                                <div class="tab-content" id="myTabContent">

                                    <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" >العنوان</label>
                                                    <input type="text" name="title_ar" value="{{old('title_ar')}}" class="form-control form-control-alternative">
                                                    <p class="text-danger">{{$errors->first('title_ar')}}</p>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">المؤلف</label>
                                                    <input type="text" name="author" value="{{old('author')}}" class="form-control form-control-alternative">
                                                    <p class="text-danger">{{$errors->first('author')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" >التفاصيل</label>
                                                    <textarea name="details_ar" rows="15" class="form-control form-control-alternative">{{old('details_ar')}}</textarea>
                                                    <p class="text-danger">{{$errors->first('details_ar')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">الصورة (230 * 360)</label>
                                                    <input type="file" name="image" class="form-control form-control-alternative">
                                                    <p class="text-danger">{{$errors->first('image')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">

                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" >العنوان</label>
                                                    <input type="text" name="title_en" value="{{old('title_en')}}" class="form-control form-control-alternative">
                                                    <p class="text-danger">{{$errors->first('title_en')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group focused">
                                                    <label class="form-control-label" >التفاصيل</label>
                                                    <textarea name="details_en" rows="15" class="form-control form-control-alternative">{{old('details_en')}}</textarea>
                                                    <p class="text-danger">{{$errors->first('details_en')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="حفظ">
                                <a href="{{url('admin/posts')}}" class="btn btn-secondary">رجوع</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>



@endsection
