<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-right navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Brand -->
        <a class="navbar-brand hide_in_phone" style="color: #2386c9 !important;" href="{{url('/admin/home')}}">
            <i class="fas fa-tachometer-alt fa-3x"></i>
        </a>

        <!-- User -->
        <ul class="nav align-items-center d-md-none">

            <li class="nav-item dropdown">

                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #2dce89 !important;">
                    <i class="fas fa-user-tie fa-2x"></i>
                </a>

                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right text-right">

                    <a href="#" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>ملفي الشخصي</span>
                    </a>


                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>تسجيل الخروج</span>
                    </a>
                </div>

            </li>
        </ul>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">

                    <div class="col-6 collapse-brand">
                        <a href="#">

                        </a>
                    </div>

                    <div class="col-6 collapse-close text-left">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>

                </div>
            </div>


            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/home')}}">
                        <i class="ni ni-tv-2 text-primary"></i> لوحة التحكم
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/profile')}}">
                        <i class="fa fa-user text-gray"></i> الملف الشخصي
                    </a>
                </li>

                {{--Super admin only--}}
                @hasrole('superAdmin')

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/users')}}">
                        <i class="fa fa-users text-blue"></i> المدراء
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/settings')}}">
                        <i class="fas fa-cog"></i> الإعدادات
                    </a>
                </li>

                @endhasrole
                {{--End super admin only--}}

                @can('ادارة الدول والاقسام والتخصصات')

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/departments')}}">
                            <i class="fa fa-tags text-success"></i>الاقسام
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/specialties')}}">
                            <i class="fa fa-list text-info"></i>التخصصات
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/cities')}}">
                            <i class="fas fa-flag text-yellow"></i> المدن
                        </a>
                    </li>

                @endcan

                @canany(['قبول رفض وتعطيل اعلان مزودي الخدمات', 'عرض بيانات وتحديد مواقع مزودي الخدمات'])
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/providers')}}">
                            <i class="fa fa-user-md text-green"></i>مزودي الخدمات
                        </a>
                    </li>
                @endcanany

                @can('ادارة المدونة')
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/admin/posts')}}">
                            <i class="fa fa-book text-indigo"></i>المدونة
                        </a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link" href="{{url('/admin/logout')}}">
                        <i class="fas fa-sign-out-alt text-danger"></i> تسجيل الخروج
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>
