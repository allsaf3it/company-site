@extends('layouts.admin')
@section('content')

<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.security')}}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                <li class="breadcrumb-item"><a href="{{url('admin/security')}}">{{trans('home.security')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_security')}}</li>
            </ol>
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

    {{-- add image --}}
    <div class="row">
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card overflow-hidden">
                <div class="card-body">
                    <div>
                        <h3 class="card-title ">{{trans('editfeature')}}</h3>
                    </div>
                    {!! Form::open(['method'=>'POST','route' => 'updategoal', 'data-toggle'=>'validator',
                    'files'=>'true']) !!}
                    <div class="row">
                        <input class="form-control" name="name" type="hidden" value="statmentgoal">
                        <input class="form-control" name="goalid" type="hidden" value="{{ $data->id }}">
                        {{-- title --}}
                        <div class="form-group col-md-6">
                            <label class="">{{trans('home.title_en')}}</label>
                            <input class="form-control" name="title_en" type="text" value="{{ $data->title_en }}"
                                placeholder="{{trans('home.title_en')}}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="">{{trans('home.title_ar')}}</label>
                            <input class="form-control" name="title_ar" type="text" value="{{ $data->title_ar }}"
                                placeholder="{{trans('home.title_ar')}}" required>
                        </div>
                        {{-- description --}}
                        <div class="form-group col-md-6 ">
                            <label for="text_en">{{trans('home.text_en')}}</label>
                            <textarea class="form-control area1" name="descrption_en"
                                placeholder="{{trans('home.text_en')}}">{{ $data->descrption_en}}</textarea>
                        </div>

                        <div class="form-group col-md-6 ">
                            <label for="text_ar">{{trans('home.text_ar')}}</label>
                            <textarea class="form-control area1" name="descrption_ar"
                                placeholder="{{trans('home.text_ar')}}">{{ $data->descrption_ar}}</textarea>
                        </div>
                        {{-- publish --}}
                        @if ($data->status == 1)
                            <div class="form-group col-md-12">
                                <label class="ckbox">
                                    <input name="status" value="1" type="checkbox" checked><span
                                        class="tx-13">{{trans('home.publish')}}</span>
                                </label>
                            </div>
                        @else
                            <div class="form-group col-md-12">
                                <label class="ckbox">
                                    <input name="status" value="1" type="checkbox"><span
                                        class="tx-13">{{trans('home.publish')}}</span>
                                </label>
                            </div>
                        @endif
                        {{-- submit --}}
                        <div class="form-group col-md-12">
                            <button type="submit" class="btn btn-success"><i class="icon-note"></i>
                                {{trans('home.save')}} </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
