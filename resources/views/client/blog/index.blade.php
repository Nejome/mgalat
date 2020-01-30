@extends('client.layouts.master')

@section('content')

    <section class="pt-md-5 pt-3 mb-md-5 mb-3" style="margin-top: 85px;">
        <div class="container">
            <div class="row">

                <div class="col-12 text-right mb-md-4 mb-2">
                    <h2>المقالات</h2>
                </div>

                @if($posts->count())
                    @foreach($posts as $post)

                        <div class="col-md-6 mb-5">
                            <div class="post-container">
                                <a href="{{url('blog/posts/'.$post->id.'/show')}}">
                                    <img src="{{asset('uploads/posts/'.$post->image)}}" width="100%" height="350px">
                                </a>
                                <div class="row mt-3 mr-1 ml-1">
                                    <div class="col-12 text-right pt-2">
                                        <a href="{{url('blog/posts/'.$post->id.'/show')}}">
                                            <h2>{{$post->title}}</h2>
                                        </a>
                                    </div>
                                    <div class="col-9 mb-3 text-right date">
                                        {{$post->created_at->toDayDateTimeString()}}
                                    </div>
                                    <div class="col-3 mb-3 text-center pt-1">
                                        <div style="font-size: 13px;">
                                            <i class="fa fa-eye"></i>&nbsp;&nbsp;
                                            {{$post->views}} مشاهدة
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                @else
                    <div class="col-12 text-center">
                        <h3>لم نقم بإضافة مقالات حتي الان</h3>
                    </div>
                @endif

            </div>

            <div class="w-100 mt-5">
                {{$posts->links()}}
            </div>

        </div>
    </section>

@endsection
