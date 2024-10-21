@extends('admin.admin_dashboard')
@section('style')
    <link href="{{asset('adminbackend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Gallery Videos</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Gallery Videos</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{route('add.video')}}" class="btn btn-primary">Add Gallery Video</a>
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
                                <th>num</th>
                                <th>Video</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($videos as $key => $video)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>   
                                        <iframe width="200" height="150"
                                            src="{{$video->youtube_link}}">
                                        </iframe>
                                    </td>
                                    <td>
                                        <a href="{{route('edit.video', $video->id)}}" class="btn btn-info">Edit</a>
                                        <a href="{{route('delete.video', $video->id)}}" id="delete" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>      
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>num</th>
                                <th>Video</th>
                                <th>Action</th>
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