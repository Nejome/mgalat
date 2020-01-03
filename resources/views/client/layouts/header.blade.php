<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">

            <a class="navbar-brand" href="{{url('/')}}">
                <span class="logo_h">
                    <img src="{{asset('client/images/header_logo.svg')}}" alt="مجالات تك" width="100%" height="100%">
                </span>
                <h3>مجالات تك</h3>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                <ul class="nav navbar-nav menu_nav m-auto">

                    <li class="nav-item @if(isset($current) && $current == 'home') active @endif"><a class="nav-link" href="{{url('/')}}">{{__('home.menu_home')}}</a></li>
                    <li class="nav-item @if(isset($current) && $current == 'application') active @endif"><a class="nav-link" href="{{url('/application')}}">تطبيق مجالات تك</a></li>
                    <li class="nav-item @if(isset($current) && $current == 'services') active @endif"><a class="nav-link" href="{{url('/services')}}">الخدمات</a></li>
                    <li class="nav-item @if(isset($current) && $current == 'blog') active @endif"><a class="nav-link" href="{{url('/blog')}}">المدونة</a></li>

                    <li class="nav-item"><a class="nav-support-link" href="{{url('/support')}}">الدعم الفني</a></li>
                    <li class="nav-item">
                        <a class="nav-login-link" href="{{url('/welcome')}}">
                            <i class="fa fa-user"></i>
                            تسجيل الدخول
                        </a>
                    </li>

                </ul>
            </div>

        </nav>
    </div>
</header>
