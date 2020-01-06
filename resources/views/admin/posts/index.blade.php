@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7 mb-7">

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">المدونة</h2>
                            </div>
                            <div class="col-4 text-left">
                                <a href="{{url('admin/posts/create')}}" class="btn btn-sm btn-primary">اضافة مقال</a>
                            </div>
                        </div>

                        @if(session()->has('added'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('added')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

                        @if(session()->has('updated'))
                            <div class="alert alert-warning alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('updated')}}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif

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
                                <th scope="col">العنوان</th>
                                <th scope="col">المحرر</th>
                                <th scope="col">المؤلف</th>
                                <th scope="col">المشاهدات</th>
                                <th scope="col">التعليقات</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($posts as $post)

                                <tr class="text-center">

                                    <td>{{$post->title}}</td>

                                    <td>{{$post->user->name}}</td>

                                    <td>{{$post->author}}</td>

                                    <td>{{$post->views}}</td>

                                    <td>{{$post->comments->count()}}</td>

                                    <td>
                                        <a href="{{url('admin/posts/'.$post->id.'/comments')}}">
                                            <i class="fas fa-comments text-blue"></i>
                                        </a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="{{url('admin/posts/'.$post->id.'/edit')}}">
                                            <i class="fas fa-pen text-warning"></i>
                                        </a>
                                        &nbsp;&nbsp;&nbsp;
                                        <a href="#" onclick="delete_confirm('{{$post->id}}', '{{url('admin/posts/'.$post->id.'/delete')}}')">
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
            var result = confirm('هل انت متأكد انك تريد حذف هذه المقالة ؟');
            if(result){
                location.href = url;
            }
        }
    </script>

@endsection
