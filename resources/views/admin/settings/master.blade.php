@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--8 mb-8">
        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">الإعدادات</h2>
                            </div>
                        </div>
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#system" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">
                                        <i class="fa fa-cog ml-2"></i>النظام
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">
                                        <i class="fa fa-phone ml-2"></i>التواصل
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#application" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">
                                        <i class="fa fa-mobile-alt ml-2"></i>التطبيق
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#application-images" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">
                                        <i class="fa fa-camera ml-2"></i>صور التطبيق
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <!-- Errors and Flash messages -->

                        @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif

                        @if(session()->has('updated'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-inner--text">{{session()->get('updated')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('created'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-inner--text">{{session()->get('created')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('deleted'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
                                <span class="alert-inner--text">{{session()->get('deleted')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="system" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                @include('admin.settings.system')
                            </div>

                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                @include('admin.settings.contact')
                            </div>

                            <div class="tab-pane fade" id="application" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                @include('admin.settings.application')
                            </div>

                            <div class="tab-pane fade" id="application-images" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                @include('admin.settings.application-images')
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
