@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7 mb-7">

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">تعليقات مقال {{$post->title}}</h2>
                            </div>
                            <div class="col-4 text-left">
                                <a href="{{url('admin/posts')}}" class="btn btn-sm btn-secondary">رجوع</a>
                            </div>
                        </div>

                        @if(session()->has('deleted'))
                            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('deleted')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr class="text-center">
                                <th scope="col">الاسم</th>
                                <th scope="col">البريد الالكتروني</th>
                                <th scope="col">التعليق</th>
                                <th scope="col">التاريخ</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($post->comments as $comment)

                                <tr class="text-center">

                                    <td>{{$comment->name}}</td>

                                    <td>{{$comment->email}}</td>

                                    <td>{{$comment->comment}}</td>

                                    <td>{{$comment->created_at->diffForHumans()}}</td>

                                    <td>
                                        <a href="#" onclick="delete_confirm('{{$post->id}}', '{{url('admin/posts/comments/'.$comment->id.'/delete')}}')">
                                            <i class="fas fa-trash text-danger"></i>
                                        </a>
                                    </td>

                                </tr>

                            @endforeach

                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <script>
        function delete_confirm(id, url) {
            var result = confirm('هل انت متأكد انك تريد حذف هذا التعليق ؟');
            if(result){
                location.href = url;
            }
        }
    </script>

@endsection
