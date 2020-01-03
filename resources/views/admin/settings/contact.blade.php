<h3>التواصل</h3>

<div class="card shadow">

    <form method="POST" action="{{url('admin/settings/updateContact')}}">

        {{csrf_field()}}

        <div class="card-body bg-secondary">

            <div class="pl-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" >رقم الهاتف</label>
                            <input type="text" value="{{$setting->phone}}" name="phone" class="form-control form-control-alternative">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">البريد الالكتروني</label>
                            <input type="text" value="{{$setting->email}}" name="email" class="form-control form-control-alternative">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" >فيس بوك</label>
                            <input type="text" value="{{$setting->facebook}}" name="facebook" class="form-control form-control-alternative">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">تويتر</label>
                            <input type="text" value="{{$setting->twitter}}" name="twitter" class="form-control form-control-alternative">
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label" >انستجرام</label>
                            <input type="text" value="{{$setting->instagram}}" name="instagram" class="form-control form-control-alternative">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-control-label">واتساب</label>
                            <input type="text" value="{{$setting->whatsapp}}" name="whatsapp" class="form-control form-control-alternative">
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
