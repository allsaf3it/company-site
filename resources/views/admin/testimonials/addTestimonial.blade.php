@extends('layouts.admin')
<title>{{trans('home.add_testimonial')}}</title>
@section('content')

<div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.testimonials')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/testimonials')}}">{{trans('home.testimonials')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.add_testimonial')}}</li>
                </ol>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Row-->
        <div class="row">
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <div class="card custom-card overflow-hidden">
                    
                    <div class="card-body">
                        <div>
                            <h6 class="card-title mb-1">{{trans('home.add_testimonial')}}</h6>
                        </div>
                        {!! Form::open(['route' => 'testimonials.store', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label class="">{{trans('home.name')}}</label>
                                    <input class="form-control" name="name" type="text" placeholder="{{trans('home.name')}}">
                                </div>
                                
                                <!-- <div class="form-group col-md-3">
                                    <label class="">{{trans('home.position')}}</label>
                                    <input class="form-control" name="position" type="text" placeholder="{{trans('home.position')}}">
                                </div> -->
                                
                                <div class="col-md-4">
                                    <label>{{trans('home.pdf')}}</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="pdf">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_pdf')}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="helperText">{{trans('home.lang')}}</label>
                                    <select class="form-control select2" name="lang" required>
                                        <option value="en">{{trans('home.english')}}</option>
                                        <option value="ar">{{trans('home.arabic')}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="">{{trans('home.text')}}</label>
                                    <textarea class="form-control" name="text"  placeholder="{{trans('home.text')}}"></textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="ckbox">
                                        <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                    </label>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                    <a href="{{url('/admin/testimonials')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
                                </div>
                                
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>

@endsection

