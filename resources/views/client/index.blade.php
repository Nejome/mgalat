@extends('client.layouts.master')

@section('content')

    <section class="banner">

        <div class="banner-text">
            <h1>أفضل مقدمي الخدمات المميزين</h1>
            <p>من بين العديد من الخدمات .. فقط حدد ما تحتاج ، وابحث عن مقدم الخدمة الانسب لك واحصل علي عرض الأسعار مجاناً</p>
        </div>

        <div class="banner-search-container">
            <div class="col-md-7 m-auto">

                <form method="POST" action="{{url('/services_providers/search')}}" class="search-form">

                    {{csrf_field()}}

                    <div class="row">

                        <div class="col-md-4 m-1 m-md-0 p-0">
                            <select name="city">
                                @foreach($g_cities as $city)
                                    <option value="{{$city->id}}">{{$city->title}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6 m-1 m-md-0 p-0">
                            <input type="text" name="text" placeholder="كلمة البحث" required>
                        </div>

                        <div class="col-md-2 m-1 m-md-0 p-0">
                            <button type="submit" class="search-btn pt-2"><i class="fa fa-search"></i></button>
                        </div>

                    </div>

                </form>

            </div>
        </div>

    </section>

    <section class="steps-area">
        <div class="container">
            <h3 class="section-title">كيف تطلب خدمتك من مجالات تك ؟</h3>
            <div class="row mt-5">
                <div class="col-md-4 p-0 pt-5">
                    <div class="step-card">
                        <svg xmlns="http://www.w3.org/2000/svg" height="480pt" viewBox="0 -19 480 479" width="480pt"><path d="m408 208.5h-96v-80c0-13.601562-10.398438-24-24-24h-8c-13.601562 0-24 10.398438-24 24v104h-16c-13.601562 0-24 10.398438-24 24v58.398438l48 88v37.601562h144v-38.398438l24-56v-113.601562c0-13.601562-10.398438-24-24-24zm-128 216v-16h112v16zm136-81.601562-21.601562 49.601562h-117.597657l-44.800781-82.398438v-53.601562c0-4.800781 3.199219-8 8-8h16v32h16v-152c0-4.800781 3.199219-8 8-8h8c4.800781 0 8 3.199219 8 8v136h16v-40h24v40h16v-40h24v40h16v-40h16c4.800781 0 8 3.199219 8 8zm0 0"></path><path d="m376 350.101562-14.398438 21.597657 12.796876 9.601562 17.601562-26.402343v-34.398438h-16zm0 0"></path><path d="m456 .5h-432c-13.601562 0-24 10.398438-24 24v304c0 13.601562 10.398438 24 24 24h184v-16h-184c-4.800781 0-8-3.199219-8-8v-304c0-4.800781 3.199219-8 8-8h432c4.800781 0 8 3.199219 8 8v304c0 4.800781-3.199219 8-8 8h-8v16h8c13.601562 0 24-10.398438 24-24v-304c0-13.601562-10.398438-24-24-24zm0 0"></path><path d="m40 72.5h176v16h-176zm0 0"></path><path d="m344 72.5h96v16h-96zm0 0"></path><path d="m88 128.5c-26.398438 0-48 21.601562-48 48s21.601562 48 48 48 48-21.601562 48-48-21.601562-48-48-48zm0 80c-17.601562 0-32-14.398438-32-32s14.398438-32 32-32 32 14.398438 32 32-14.398438 32-32 32zm0 0"></path><path d="m152 168.5h88v16h-88zm0 0"></path><path d="m328 168.5h112v16h-112zm0 0"></path><path d="m200 240.5v-16c-26.398438 0-48 21.601562-48 48s21.601562 48 48 48v-16c-17.601562 0-32-14.398438-32-32s14.398438-32 32-32zm0 0"></path><path d="m40 264.5h96v16h-96zm0 0"></path><path d="m324 99.699219c10.398438-24-.800781-52.800781-24.800781-63.199219s-52.800781.800781-63.199219 24.800781c-5.601562 12-5.601562 26.398438 0 38.398438l14.398438-6.398438c-5.597657-12-2.398438-26.402343 6.402343-35.199219 12.800781-12 32.800781-12 45.597657 0 9.601562 9.597657 12 23.199219 6.402343 35.199219zm0 0"></path></svg>
                        <h3 class="mt-4">حدد موقعك</h3>
                        <p>يعتمد كلياً التطبيق علي تحديد موقعك بالخريطة  وسوف يتم عرض الكثير من مزودي الخدمات</p>
                        <div class="text-center">
                            <span class="dot avtive-dot"></span>
                            <span class="dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 p-0 mt-5 mt-md-0">
                    <div class="step-card step-mid-card">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="964.8px" height="964.8px" viewBox="0 0 964.8 964.8" style="enable-background:new 0 0 964.8 964.8;" xml:space="preserve">
<g>
    <g>
        <path d="M166.48,328.9c4.4-5.6,8.9-11.1,13.6-16.4c6-6.9,12.3-13.7,18.9-20.2c23.7-23.7,49.9-44,78.4-60.9v-6.6    c0-15.4-12.5-27.8-27.8-27.8h-30.9c-5.5,0-10.6,2.6-13.7,7.1l-45.6,64.5l-11.1-23.4l17.7-37.2c2.4-5.1-1.3-11-6.9-11h-35.4    c-5.6,0-9.4,5.9-6.9,11l17.7,37.2l-10.9,23l-44.5-63.9c-3.1-4.5-8.3-7.3-13.8-7.3h-32.5c-15.4,0-27.8,12.5-27.8,27.8v184.9h112.7    C130.78,380.8,147.081,353.8,166.48,328.9z"></path>
        <path d="M51.48,89.6c0,49.4,40.2,89.6,89.6,89.6s89.6-40.2,89.6-89.6c0-49.4-40.2-89.6-89.6-89.6S51.48,40.2,51.48,89.6z"></path>
        <path d="M896.28,197c-5.5,0-10.6,2.6-13.7,7.1l-45.6,64.5l-11.1-23.4L843.58,208c2.4-5.1-1.3-11-6.899-11h-35.4    c-5.6,0-9.399,5.9-6.899,11l17.699,37.2l-10.899,23l-44.4-63.9c-3.1-4.5-8.3-7.3-13.8-7.3h-32.5c-15.4,0-27.8,12.5-27.8,27.8v7.1    c28.1,16.7,54,36.9,77.399,60.3c6.801,6.8,13.301,13.8,19.5,20.9c4.4,5.1,8.801,10.4,12.9,15.7c19.4,24.9,35.8,51.9,48.8,80.8    h113.7V224.8c0-15.4-12.5-27.8-27.8-27.8H896.28L896.28,197z"></path>
        <path d="M729.181,89.6c0,49.4,40.2,89.6,89.6,89.6c49.4,0,89.601-40.2,89.601-89.6c0-49.4-40.2-89.6-89.601-89.6    C769.381,0,729.181,40.2,729.181,89.6z"></path>
        <path d="M940.28,875.2L817.381,781c-16.101,26.2-35.301,50.399-57.301,72.399c-1.8,1.801-3.699,3.601-5.6,5.4l124.9,95.7    c9.1,7,19.8,10.3,30.399,10.3c15,0,29.9-6.7,39.7-19.6C966.28,923.399,962.181,892,940.28,875.2z"></path>
        <path d="M616.08,571c0-15.4-12.5-27.8-27.8-27.8h-30.899c-5.5,0-10.601,2.6-13.7,7.1l-45.601,64.5l-11.1-23.4l17.7-37.199    c2.399-5.101-1.3-11-6.9-11h-35.399c-5.601,0-9.4,5.899-6.9,11l17.7,37.199l-10.9,23l-44.3-63.899c-3.1-4.5-8.3-7.3-13.8-7.3    h-32.5c-15.4,0-27.8,12.5-27.8,27.8v184.899h272.3V571H616.08z"></path>
        <path d="M479.98,525.5c49.4,0,89.6-40.2,89.6-89.601c0-49.399-40.199-89.6-89.6-89.6s-89.6,40.2-89.6,89.6    C390.381,485.3,430.58,525.5,479.98,525.5z"></path>
        <path d="M334.78,915.399c45.9,19.4,94.601,29.2,144.7,29.2c50.2,0,98.9-9.8,144.7-29.2c40.899-17.3,77.899-41.5,110.2-71.899    c2.699-2.5,5.399-5.101,8-7.7c21.199-21.2,39.6-44.7,55-70c9.3-15.5,17.6-31.5,24.6-48.2c19.4-45.899,29.2-94.6,29.2-144.7    c0-50.1-9.8-98.899-29.2-144.699c-2.6-6.2-5.4-12.4-8.4-18.4c-18-36.9-41.899-70.4-71.3-99.8c-18.3-18.3-38.3-34.5-59.7-48.5    c-18.5-12.1-38-22.5-58.5-31.2c-45.899-19.4-94.6-29.2-144.699-29.2c-50.2,0-98.9,9.8-144.7,29.2c-20.101,8.5-39.3,18.7-57.5,30.5    c-21.8,14.1-42.1,30.5-60.7,49.1c-29.3,29.3-53.2,62.8-71.3,99.8c-2.9,6-5.8,12.199-8.4,18.399c-19.4,45.9-29.2,94.601-29.2,144.7    s9.8,98.9,29.2,144.7c18.7,44.3,45.5,84,79.7,118.2C250.681,869.8,290.48,896.6,334.78,915.399z M271.181,409.7c2-2.5,4-5,6.1-7.4    c4.8-5.7,9.8-11.2,15.2-16.5c50-50,116.4-77.5,187.1-77.5c70.7,0,137.101,27.5,187,77.5c5.7,5.7,11.101,11.6,16.2,17.7    c1.7,2.1,3.4,4.1,5.101,6.3c36.5,46.4,56.199,103.2,56.199,163.1c0,70.7-27.5,137.101-77.5,187.101s-116.399,77.5-187,77.5    c-70.6,0-137.1-27.5-187-77.5c-50-50-77.5-116.4-77.5-187.101C214.98,512.899,234.78,456.1,271.181,409.7z"></path>
    </g>
</g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
</svg>
                        <h3 class="mt-4">ابحث عن خدمة</h3>
                        <p>اخبرنا عن ما تحتاجه وابحث عن خدمتك ضمن التصنيفات</p>
                        <div class="text-center">
                            <span class="dot avtive-dot"></span>
                            <span class="dot avtive-dot"></span>
                            <span class="dot"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 p-0 pt-5">
                    <div class="step-card">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
<g>
    <g>
        <path d="M89.38,278.424c-34.268,0-62.146,27.878-62.146,62.146c0,18.02,7.716,34.265,20.008,45.626    C19.148,401.278,0,430.943,0,465v15h107.003v-13.766c0-30.149,9-59.216,26.026-84.058c4.039-5.893,8.474-11.443,13.246-16.647    c3.367-7.645,5.25-16.084,5.25-24.959C151.525,306.303,123.647,278.424,89.38,278.424z"></path>
    </g>
</g>
                            <g>
                                <g>
                                    <path d="M464.758,386.196c12.293-11.361,20.008-27.606,20.008-45.626c0-34.267-27.878-62.146-62.146-62.146    c-34.267,0-62.146,27.878-62.146,62.146c0,8.875,1.883,17.315,5.25,24.959c4.772,5.205,9.208,10.755,13.246,16.647    c17.026,24.841,26.026,53.908,26.026,84.058V480H512v-15C512,430.943,492.852,401.279,464.758,386.196z"></path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <path d="M300.88,356.033c21.452-14.468,35.587-38.993,35.587-66.758c0-44.37-36.097-80.467-80.467-80.467    s-80.467,36.097-80.467,80.467c0,27.765,14.135,52.29,35.587,66.758c-43.432,17.752-74.117,60.457-74.117,110.201V480h237.994    v-13.766C374.997,416.49,344.312,373.785,300.88,356.033z"></path>
                                </g>
                            </g>
                            <g>
                                <g>
                                    <polygon points="293.569,74.536 271,94.597 271,32 241,32 241,94.597 218.431,74.536 198.5,96.958 256,148.069 313.499,96.958       "></polygon>
                                </g>
                            </g>
                            <g>
                                <g>

                                    <rect x="146.458" y="129.381" transform="matrix(0.6412 -0.7674 0.7674 0.6412 -61.2222 179.6146)" width="30.001" height="51.788"></rect>
                                </g>
                            </g>
                            <g>
                                <g>

                                    <rect x="111.995" y="196.861" transform="matrix(0.3806 -0.9247 0.9247 0.3806 -121.1021 251.2481)" width="30.002" height="38.322"></rect>
                                </g>
                            </g>
                            <g>
                                <g>

                                    <rect x="324.64" y="140.254" transform="matrix(0.7674 -0.6411 0.6411 0.7674 -18.0157 260.8427)" width="51.785" height="29.999"></rect>
                                </g>
                            </g>
                            <g>
                                <g>

                                    <rect x="365.818" y="201.004" transform="matrix(0.9247 -0.3806 0.3806 0.9247 -53.2367 162.7693)" width="38.322" height="30.002"></rect>
                                </g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
                            <g>
                            </g>
</svg>
                        <h3 class="mt-4">أختر مقدم الخدمة  الانسب</h3>
                        <p>العديد من مقدمي الخدمات بإنتظارك قم بإختيار الافضل</p>
                        <div class="text-center">
                            <span class="dot avtive-dot"></span>
                            <span class="dot avtive-dot"></span>
                            <span class="dot avtive-dot"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="order-now-area">
        <div class="container">
            <h4>الخيار الأسهل والأسرع لتلبية كافة احتياجاتك</h4>
            <h3 class="mb-3">مجالات تك يمكنك من الوصول الي افضل الخبرات حولك ويضعها بين يديك</h3>
            <a href="{{url('departments')}}" class="order-now-btn">اطلب خدمتك الأن</a>
        </div>
    </section>

    <section class="latest-provider">
        <div class="container">

            <h3 class="section-title text-center mb-5">أحدث مقدمي الخدمات</h3>

            <div class="row">

                @foreach($g_6_providers as $row)
                    <div class="col-md-3 mb-4">
                        <img src="{{asset('uploads/providers/'.$row->image)}}" width="100%" height="200px">
                        <div class="text-right mt-3">
                            <span style="font-size: 16px;">{{$row->specialty->title}}</span>
                            <a href="{{url('/services_providers/'.$row->id.'/details')}}"><h3 style="margin-bottom: 0;">{{$row->name}}</h3></a>
                            <div>
                                <div class="stars d-inline-block m-2">
                                    <i class="fa fa-star @if($row->ratingTotal() >= 1) filled-star-selected @endif"></i>
                                    <i class="fa fa-star @if($row->ratingTotal() >= 2) filled-star-selected @endif"></i>
                                    <i class="fa fa-star @if($row->ratingTotal() >= 3) filled-star-selected @endif"></i>
                                    <i class="fa fa-star @if($row->ratingTotal() >= 4) filled-star-selected @endif"></i>
                                    <i class="fa fa-star @if($row->ratingTotal() >= 5) filled-star-selected @endif"></i>
                                </div>
                                <span><i class="fa fa-thumbs-o-up"></i>({{$row->rate->count()}} تقييمات)</span>
                            </div>
                        </div>
                        @if($row->is_special)
                            <button class="checked-btn in-image" disabled>
                                <span class="checked-btn-icon"><i class="fa fa-check sp-tags-icon"></i></span>
                                مميز
                            </button>
                        @endif
                    </div>
                @endforeach

            </div>

        </div>
    </section>

    <section class="latest-articles mb-5">
        <div class="container">

            <h3 class="section-title text-center mb-5">أحدث المقالات</h3>

            <div class="row">

                @foreach($g_3_posts as $post)
                    <div class="col-md-4">
                        <img src="{{asset('uploads/posts/'.$post->image)}}" width="100%" height="180px">
                        <div class="text-right home-article-link mt-3">
                            {{$post->created_at->toDayDateTimeString()}}
                            <h3>{{$post->title}}</h3>
                            <a href="{{url('/blog/posts/'.$post->id.'/show')}}">
                                <span><i class="fa fa-th-large"></i></span>
                                أقرا المزيد
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

@endsection
