@extends('admin.layout.master')

@section('content')

    <div class="container-fluid mt--7">

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-header border-0">

                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="mb-0">مزودي الخدمات الغير مفعلين</h2>
                            </div>
                        </div>

                        @if(session()->has('group_active'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <span class="alert-inner--text">{{session()->get('group_active')}}</span>
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
                                <th scope="col">اسم</th>
                                <th scope="col">التخصص</th>
                                <th scope="col">رقم الهاتف</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <div class="card-footer py-4">
                        <nav>
                            <ul class="pagination justify-content-end mb-0 float-right">

                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection
