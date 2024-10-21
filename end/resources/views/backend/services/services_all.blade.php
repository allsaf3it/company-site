@extends('admin.admin_dashboard')
@section('style')
    <link href="{{asset('adminbackend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">{{trans('home.All Services')}}</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">{{trans('home.All Services')}}</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{route('add.service')}}" class="btn btn-primary">{{trans('home.add_service')}}</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <hr/>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{trans('home.num')}}</th>
                                <th>{{trans('home.name_en')}}</th>
                                <th>{{trans('home.name_ar')}}</th>
                                <th>{{trans('home.image')}}</th>
                                <th>{{trans('home.action')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $key => $service)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$service->name_en}}</td>
                                    <td>{{$service->name_ar}}</td>
                                    <td><img src="{{ !empty($service->image) ? asset('uploads/services/' . $service->image) : asset('uploads/no_image.jpg')}}" alt="service" style="width: 70px; height: 40px;"></td>
                                    <td>
                                        <a href="{{route('edit.service', $service->id)}}" class="btn btn-info">{{trans('home.edit')}}</a>
                                        <a href="{{route('delete.service', $service->id)}}" id="delete" class="btn btn-danger">{{trans('home.delete')}}</a>
                                    </td>
                                </tr>      
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>{{trans('home.num')}}</th>
                                <th>{{trans('home.name_en')}}</th>
                                <th>{{trans('home.name_ar')}}</th>
                                <th>{{trans('home.image')}}</th>
                                <th>{{trans('home.action')}}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
@section('script')
    <script src="{{asset('adminbackend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>
@endsection