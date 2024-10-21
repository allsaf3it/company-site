@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.security')}}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('securityAdmin')}}">{{trans('home.security')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_security')}}</li>
            </ol>
        </div>

        <div class="btn btn-list">
            <a href="{{route('createfeaturedetails',$id)}}"><button class="btn ripple btn-primary"><i class="fas fa-plus-circle"></i> {{trans('home.add')}}</button></a>
        </div>
    </div>
    <!-- End Page Header -->

    @if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->pull('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    {{-- add image  --}}
    <div class="row">
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h3 class="card-title ">{{trans('list feature')}}</h3>
                    </div>

                    <div class="table-responsive">
                        <table class="table" id="exportexample">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll"/></th>
                                    <th>{{trans('home.image')}}</th>
                                    <th>{{trans('Feature Name')}}</th>
                                    <th>{{trans('home.title_en')}}</th>
                                    <th>{{trans('home.title_ar')}}</th>
                                    <th>{{trans('home.status')}}</th>
                                    <th>{{trans('home.actions')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($feature as $item)
                                    <tr id="{{$item->id}}">
                                        <td> <input type="checkbox" name="checkbox"  class="tableChecked" value="{{$item->id}}" /> </td>
                                        <td>
                                            <a href="{{ route('editfeaturedetails', $item->id) }}">
                                                <img src="{{asset($item->icon)}}" class="img-fluid" width="60px">
                                            </a>
                                        </td>
                                        <td>
                                            @php
                                                $data = App\security::where('id', $id)->first();
                                            @endphp
                                            <a href="{{ route('editfeaturedetails', $item->id) }}">
                                                {{ $data->title_en }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('editfeaturedetails', $item->id) }}">
                                                {{ $item->title_en }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('editfeaturedetails', $item->id) }}">
                                                {{ $item->title_ar }}
                                            </a>
                                        </td>

                                        <td><a href="{{ route('editfeaturedetails', $item->id) }}">@if($item->status == 1) {{trans('home.yes')}} @else  {{trans('home.no')}} @endif</a></td>
                                        <td>
                                            <a href="{{ route('deletefeaturedetails' , $item->id) }}" class="btn btn-danger" >{{trans('home.delete')}}</a>
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
</div>

@endsection
