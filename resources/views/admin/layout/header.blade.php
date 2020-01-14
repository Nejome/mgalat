
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">

        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{url('admin/home')}}">لوحة التحكم</a>

        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">


                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{Auth::user()->name}}</span>
                        </div>

                    </div>
                </a>

                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right text-right">

                    @hasrole('superAdmin')

                    <a href="{{url('/admin/settings')}}" class="dropdown-item">
                        <i class="fas fa-cog"></i>
                        <span>الإعدادات</span>
                    </a>

                    @endhasrole

                    <a href="{{url('/admin/profile')}}" class="dropdown-item">
                        <i class="fa fa-user"></i>
                        <span>الملف الشخصي</span>
                    </a>

                    <div class="dropdown-divider"></div>
                    <a href="{{url('/admin/logout')}}" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>تسجيل الخروج</span>
                    </a>

                </div>
            </li>
        </ul>
    </div>
</nav>


<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8 mb-5">
    <div class="container-fluid">
        <div class="header-body">

            <div class="row">

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">الاقسام</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$g_departments_count}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                        <i class="fa fa-tags"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">التخصصات</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$g_specialties_count}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                        <i class="fa fa-list"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">الدول</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$g_countries_count}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                        <i class="fas fa-flag"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">مزودي الخدمات</h5>
                                    <span class="h2 font-weight-bold mb-0">{{$g_providers_count}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-green text-white rounded-circle shadow">
                                        <i class="fa fa-user-md"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
