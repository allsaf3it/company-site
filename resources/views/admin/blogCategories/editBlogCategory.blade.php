@extends('layouts.admin')
<title>{{trans('home.edit_blog_category')}}</title>
@section('content')

<div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.blogCategories')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/blog-categories')}}">{{trans('home.blogCategories')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_blog_category')}}</li>
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
                            <h6 class="card-title ">{{trans('home.edit_blog_category')}}</h6>
                        </div>
                        {!! Form::open(['method'=>'PATCH','url' => 'admin/blog-categories/'.$blogCategory->id, 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="title_en">{{trans('home.title_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.title_en')}}" name="title_en"value="{{$blogCategory->title_en}}" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="title_ar">{{trans('home.title_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.title_ar')}}" name="title_ar"value="{{$blogCategory->title_ar}}">
                                </div>


                                <div class="form-group col-md-6 ">
                                    <label for="text_en">{{trans('home.text_en')}}</label>
                                    <textarea class="form-control " name="text_en" placeholder="{{trans('home.text_en')}}" >{{$blogCategory->text_en}}</textarea>
                                </div>

                                <div class="form-group col-md-6 "> 
                                    <label for="text_ar">{{trans('home.text_ar')}}</label>
                                    <textarea class="form-control " name="text_ar" placeholder="{{trans('home.text_ar')}}" >{{$blogCategory->text_ar}}</textarea>
                                </div>

                                <div class="form-group col-md-6 ">
                                        <label for="blogcategory">{{trans('home.meta_keywords')}}</label>
                                        <textarea class="form-control " name="meta_keywords" placeholder="{{trans('home.meta_keywords')}}" >{{$blogCategory->meta_keywords}}</textarea>
                                </div>

                                <div class="form-group col-md-6 "> 
                                    <label for="blogcategory">{{trans('home.meta_description')}}</label>
                                    <textarea class="form-control " name="meta_description" placeholder="{{trans('home.meta_description')}}" >{{$blogCategory->meta_description}}</textarea>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="ckbox">
                                        <input name="status" value="1" {{($blogCategory->status == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                    </label>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                    <a href="{{url('/admin/blog-categories')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
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

