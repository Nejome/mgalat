@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7 mb-7">

        <div class="col-5 ml-auto mr-auto mb-3 p-2 row" style="background-color: #fff; border: 1px solid #efefef; border-radius: 5px;">
            <span class="d-inline-block col-8 text-right">{{$room->name}} - {{$room->title}}</span>
            <a href="{{url('admin/chats')}}" class="d-inline-block col-4 text-left">رجوع</a>
        </div>

        <div class="row">

            <div class="col-7 m-auto">

                <admin-chat tokenprop="{{$room->token}}" roomid="{{$room->id}}" imageprop="{{asset('cp/images/loading.gif')}}"></admin-chat>

            </div>

        </div>
    </div>

@endsection
