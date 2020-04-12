@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">

            <div class="col-xl-12 m-auto">
                <div class="card bg-secondary shadow mb-8">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">موقع مزود الخدمة</h3>
                            </div>
                        </div>

                    </div>

                    <form method="POST" action="{{url('admin/providers/'.$provider->id.'/updateLocation')}}">

                        {{csrf_field()}}

                        <div class="card-body">

                            <!-- Current -->
                            <input id="initLat" type="hidden" value="{{$lat}}">
                            <input id="initLng" type="hidden" value="{{$lng}}">

                            <!-- New -->
                            <input id="lat" name="lat" type="hidden" value="{{$lat}}">
                            <input id="lng" name="lng" type="hidden" value="{{$lng}}">

                            <div class="pl-lg-4">

                                <div class="row">
                                    <div class="col-12">
                                        <div id="map" style="height: 400px;"></div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-center">
                                <input type="submit" class="btn btn-primary" value="حفظ">
                                <a href="{{url('admin/providers')}}" class="btn btn-secondary">رجوع</a>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>

    @push('pageScript')

        <script src="{{asset('cp/assets/js/providerLocation.js')}}"></script>

    @endpush

@endsection
