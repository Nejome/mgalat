<div class="row align-items-center mb-3">
    <div class="col">
        <h2 class="mb-0">صور التطبيق</h2>
    </div>
    <div class="col-4 text-left">
        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#create-image">اضافة صورة</a>

        <div class="modal fade" id="create-image" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">

                    <div class="modal-body p-0">


                        <div class="card bg-secondary shadow border-0">
                            <div class="card-header bg-transparent pb-1">
                                <h2 class="text-muted text-center mt-2 mb-3">اضافة صورة</h2>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5">

                                <form method="POST" action="{{url('admin/settings/applicationImage/store')}}" role="form" enctype="multipart/form-data">

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
                                        <label class="float-right">الصورة (280*360)</label>
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

    </div>
</div>

<div class="card shadow">
    <div class="card-body bg-secondary">
        <div class="row">

            @foreach($images as $image)
                <div class="col-md-4">
                    <div class="bg-white p-0">
                        <img src="{{asset('uploads/applicationImages/'.$image->image)}}" width="100%" height="200px">
                        <p class="text-right mt-2 pr-2 pl-2 pt-1">
                            {{$image->title}}
                            <a href="{{url('admin/settings/applicationImage/'.$image->id.'/delete')}}" class="text-danger text-left d-block mr-auto"><i class="fa fa-trash"></i></a>
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
