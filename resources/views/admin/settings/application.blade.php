<h3>التطبيق</h3>

<div class="card shadow">

    <form method="POST" action="{{url('admin/settings/updateApplication')}}">

        {{csrf_field()}}

        <div class="card-body bg-secondary">

            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" >رابط قوقل بلاي</label>
                            <input type="text" value="{{$setting->android_link}}" name="android_link" class="form-control form-control-alternative">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">رابط ابل استور</label>
                            <input type="text" value="{{$setting->ios_link}}" name="ios_link" class="form-control form-control-alternative">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" >اصدار التطبيق الحالي</label>
                            <input type="text" value="{{$setting->application_version}}" name="application_version" class="form-control form-control-alternative">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">رابط فيديو التطبيق</label>
                            <input type="text" value="{{$setting->application_video_link}}" name="application_video_link" class="form-control form-control-alternative">
                            <span>مثال : https://www.youtube.com/embed/video ID</span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="card-footer text-center">
            <input type="submit" class="btn btn-primary" value="تعديل">
        </div>
    </form>

</div>
