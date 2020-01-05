<h3>النظام</h3>
<div class="nav-wrapper">
    <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">

        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#system-ar" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">العربية</a>
        </li>

        <li class="nav-item">
            <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#system-en" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">الانجليزية</a>
        </li>

    </ul>
</div>
<div class="card shadow">

    <form method="POST" action="{{url('admin/settings/updateSystem')}}">

        {{csrf_field()}}

        <div class="card-body bg-secondary">
            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active" id="system-ar" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                    <div class="pl-lg-4">
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label" >العنوان</label>
                                    <input type="text" value="{{$setting->getTranslation('title', 'ar')}}" name="title_ar" class="form-control form-control-alternative">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">المؤلف</label>
                                    <input type="text" value="{{$setting->author}}" name="author" class="form-control form-control-alternative">
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">اقصي عدد صور لمزودي الخدمات المميزين</label>
                                    <input type="text" value="{{$setting->max_providers_images}}" name="max_providers_images" class="form-control form-control-alternative">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" >الوصف</label>
                                    <textarea rows="10" name="description_ar" class="form-control form-control-alternative">
                                        {{$setting->getTranslation('description', 'ar')}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">كلمات البحث</label>
                                    <textarea rows="10" name="keywords" class="form-control form-control-alternative">
                                        {{$setting->keywords}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" >الشروط والاحكام</label>
                                    <textarea rows="10" name="terms_conditions_ar" class="form-control form-control-alternative">
                                        {{$setting->getTranslation('terms_conditions', 'ar')}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">سياسات الاستخدام</label>
                                    <textarea rows="10" name="usage_policy_ar" class="form-control form-control-alternative">
                                        {{$setting->getTranslation('usage_policy', 'ar')}}
                                    </textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="system-en" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                    <div class="pl-lg-4">
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" >العنوان</label>
                                    <input type="text" value="{{$setting->getTranslation('title', 'en')}}" name="title_en" class="form-control form-control-alternative">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" >الوصف</label>
                                    <textarea rows="10" name="description_en" class="form-control form-control-alternative">
                                        {{$setting->getTranslation('description', 'en')}}
                                    </textarea>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label" >الشروط والاحكام</label>
                                    <textarea rows="10" name="terms_conditions_en" class="form-control form-control-alternative">
                                        {{$setting->getTranslation('terms_conditions', 'en')}}
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">سياسات الاستخدام</label>
                                    <textarea rows="10" name="usage_policy_en" class="form-control form-control-alternative">
                                        {{$setting->getTranslation('usage_policy', 'en')}}
                                    </textarea>
                                </div>
                            </div>

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
