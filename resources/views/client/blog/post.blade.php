@extends('client.layouts.master')

@section('content')

    <section class="post-section" style="margin-top: 120px;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mr-auto ml-auto text-center post-info mb-2">
                    بواسطة {{$post->author}} &nbsp;-&nbsp; {{$post->created_at->toDayDateTimeString()}}
                    &nbsp;
                    <div class="d-inline-block">
                        <i class="fa fa-eye d-inline-block ml-1"></i>{{$post->views}}
                    </div>
                    &nbsp;
                    <div class="d-inline-block">
                        <i class="fa fa-comments d-inline-block ml-1"></i>{{$post->comments->count()}}
                    </div>

                </div>
                <div class="col-md-10 m-auto">
                    <div class="post-image">
                        <img src="{{asset('uploads/posts/'.$post->image)}}" width="100%" height="100%">
                    </div>
                </div>
                <div class="col-12 text-center mt-4 mb-5">
                    <h2>{{$post->title}}</h2>
                </div>
                <div class="col-md-10 m-auto" style="direction: rtl;">{!! $post->details !!}</div>

                <div class="col-12"><hr></div>

                @if(session()->has('created'))
                    <div class="col-md-6 m-auto">
                        <div class="alert alert-success">{{session()->get('created')}}</div>
                    </div>
                @endif

                <div class="col-12 mt-3 mb-3">
                    <h3>التعليقات</h3>
                </div>

                <div class="col-md-8 ml-auto">

                    @foreach($post->comments as $comment)
                        <div class="an-comment mb-3 w-100">
                            <span style="font-size: 18px; font-weight: 600;">{{$comment->name}}</span>
                            &nbsp;&nbsp;
                            <span style="font-size: 12px;">{{$comment->created_at->diffForHumans()}}</span>
                            <p class="mt-1">{{$comment->comment}}</p>
                        </div>
                    @endforeach

                </div>

                <div class="col-md-8 mb-5 mr-auto ml-auto mt-5">
                    <p class="text-center">لن يتم نشر عنوان بريدك الالكتروني</p>

                    <form method="POST" action="{{url('blog/posts/'.$post->id.'/comment')}}" class="row">

                        {{csrf_field()}}

                        <div class="form-group col-12">
                            <textarea name="comment" class="form-control" rows="8" placeholder="تعليقك"></textarea>
                            <p class="text-danger">{{$errors->first('comment')}}</p>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <input name="name" type="text" class="form-control" placeholder="اسمك">
                            <p class="text-danger">{{$errors->first('name')}}</p>
                        </div>

                        <div class="form-group col-md-6 mb-3">
                            <input type="email" name="email" class="form-control" placeholder="بريدك الالكتروني">
                            <p class="text-danger">{{$errors->first('email')}}</p>
                        </div>

                        <div class="form-group m-auto">
                            <button type="submit" class="btn btn-primary pr-5 pl-5 pt-2">اضف تعليقاً</button>
                        </div>

                    </form>

                </div>

                <div class="col-12 mb-5 mt-5 row">
                    <div class="col-12 text-right mb-3">
                        <h3 style="color:#f29549;">مقالات اخري</h3>
                    </div>

                    @foreach($posts as $post)
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
        </div>
    </section>

@endsection
