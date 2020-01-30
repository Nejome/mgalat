<div class="col-md-7 m-auto">

    <form method="POST" action="{{url('/services_providers/search')}}" class="search-form">

        {{csrf_field()}}

        <input id="lat" type="hidden" name="lat">
        <input id="lng" type="hidden" name="lng">

        <div class="row">

            <div class="col-md-3 m-1 m-md-0 p-0">
                <a class="btn search-btn pt-2 search-form-btn-right" style="color: #fff;" data-toggle="modal" data-target="#locationModel"><i class="fa fa-map-marker"></i></a>
            </div>

            <div class="col-md-7 m-1 m-md-0 p-0">
                <input type="text" name="text" class="search-form-text" placeholder="كلمة البحث" required>
            </div>

            <div class="col-md-2 m-1 m-md-0 p-0">
                <button type="submit" class="btn search-btn pt-2 search-form-btn-left"><i class="fa fa-search"></i></button>
            </div>

            @if($errors->any())
                <div class="col-12 mt-1">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul class="m-0">
                            @foreach($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
             @endif

        </div>

    </form>

</div>

<div class="modal fade" id="locationModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">حدد موقعك في الخريطة ثم اضغط علي زر تم</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="searchMap" style="width: 100%; height: 420px;"></div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary m-auto" data-dismiss="modal">تم</a>
            </div>
        </div>
    </div>
</div>
