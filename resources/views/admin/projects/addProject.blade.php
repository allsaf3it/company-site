@extends('layouts.admin')
@section('content')

<div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.projects')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/projects')}}">{{trans('home.projects')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.add_project')}}</li>
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
                            <h6 class="card-title mb-1">{{trans('home.add_project')}}</h6>
                        </div>
                        {!! Form::open(['route' => 'projects.store', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label class="">{{trans('home.title_en')}}</label>
                                    <input class="form-control" name="title_en" type="text" placeholder="{{trans('home.title_en')}}" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="">{{trans('home.title_ar')}}</label>
                                    <input class="form-control" name="title_ar" type="text" placeholder="{{trans('home.title_ar')}}" required>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label class="">{{trans('home.order')}}</label>
                                    <input class="form-control" name="order" type="text" placeholder="{{trans('home.order')}}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="">{{trans('home.name_en')}}</label>
                                    <input class="form-control" name="name_en" type="text" placeholder="{{trans('home.name_en')}}" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="">{{trans('home.name_ar')}}</label>
                                    <input class="form-control" name="name_ar" type="text" placeholder="{{trans('home.name_ar')}}" required>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label for="name_en">{{trans('home.slug_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.slug_en')}}" name="link_en" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="name_ar">{{trans('home.slug_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.slug_ar')}}" name="link_ar" required>
                                </div>

                                
                                {{--<div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.brand')}}</label>
                                    <select class="form-control select2" name="brand_id" required>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{(app()->getLocale() == 'en')?$brand->name_en:$brand->name_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>--}}
                                
                                <div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.service')}}</label>
                                    <select class="form-control select2" name="service_id">
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}">{{(app()->getLocale() == 'en')?$service->name_service_en:$service->name_service_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                                                
                                <div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.parent')}}</label>
                                    <select class="form-control select2" name="parent_id" required>
                                        <option value="0">{{trans('home.no_parent')}}</option>
                                        @foreach($projects as $serv)
                                            <option value="{{$serv->id}}">{{(app()->getLocale() == 'en')?$serv->name_en:$serv->name_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                {{--<div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.category')}}</label>
                                    <select class="form-control select2" name="category_id" required>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{(app()->getLocale() == 'en')?$category->name_en:$category->name_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>--}}
                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.title_en_inside')}}</label>
                                    <textarea class="form-control area1" name="title_en_inside" placeholder="{{trans('home.title_en_inside')}}"></textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.title_ar_inside')}}</label>
                                    
                                    <textarea class="form-control area1" name="title_ar_inside" placeholder="{{trans('home.title_ar_inside')}}"></textarea>
                                </div>
                                <div class="col-md-3">
                                    <label>{{trans('home.main_image')}}</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>{{trans('home.image2')}}</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image2">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>{{trans('home.image')}}3</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="image3">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label>{{trans('home.hello_video')}}</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="hello_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group col-md-4">
                                    <label for="color"> {{trans('home.color')}}</label>
                                    <input class="form-control" name="color" type="text" placeholder="{{trans('home.color')}}">
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="text_en"> {{trans('home.text_en')}}</label>
                                    <textarea class="form-control area1" name="text_en" placeholder="{{trans('home.text_en')}}"></textarea>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="text_ar"> {{trans('home.text_ar')}}</label>
                                    <textarea class="form-control area1" name="text_ar" placeholder="{{trans('home.text_ar')}}"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="featurs_en"> {{trans('home.featurs_en')}}</label>
                                    <textarea class="form-control" name="featurs_en" placeholder="{{trans('home.featurs_en')}}"></textarea>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="featurs_ar"> {{trans('home.featurs_ar')}}</label>
                                    <textarea class="form-control" name="featurs_ar" placeholder="{{trans('home.featurs_ar')}}"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="challenge_title_en">{{trans('home.challenge_title_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.challenge_title_en')}}" name="challenge_title_en">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="challenge_title_ar">{{trans('home.challenge_title_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.challenge_title_ar')}}" name="challenge_title_ar">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="challenge_text_en"> {{trans('home.challenge_text_en')}}</label>
                                    <textarea class="form-control area1" name="challenge_text_en" placeholder="{{trans('home.challenge_text_en')}}"></textarea>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="challenge_text_ar"> {{trans('home.challenge_text_ar')}}</label>
                                    <textarea class="form-control area1" name="challenge_text_ar" placeholder="{{trans('home.challenge_text_ar')}}"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="challenge_details_en"> {{trans('home.challenge_details_en')}}</label>
                                    <textarea class="form-control area1" name="challenge_details_en" placeholder="{{trans('home.challenge_details_en')}}"></textarea>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="challenge_details_ar"> {{trans('home.challenge_details_ar')}}</label>
                                    <textarea class="form-control area1" name="challenge_details_ar" placeholder="{{trans('home.challenge_details_ar')}}"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label>{{trans('home.ar_en_video')}}</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="ar_en_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ar_en_title_en">{{trans('home.ar_en_title_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.ar_en_title_en')}}" name="ar_en_title_en">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="ar_en_title_ar">{{trans('home.ar_en_title_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.ar_en_title_ar')}}" name="ar_en_title_ar">
                                </div>
                                <div class="col-md-6">
                                    <label>{{trans('home.city_map_video')}}</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="city_map_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6"></div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city_map_title_en">{{trans('home.city_map_title_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.city_map_title_en')}}" name="city_map_title_en">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="city_map_title_ar">{{trans('home.city_map_title_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.city_map_title_ar')}}" name="city_map_title_ar">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city_map_text_en"> {{trans('home.city_map_text_en')}}</label>
                                    <textarea class="form-control area1" name="city_map_text_en" placeholder="{{trans('home.city_map_text_en')}}"></textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city_map_text_ar"> {{trans('home.city_map_text_ar')}}</label>
                                    <textarea class="form-control area1" name="city_map_text_ar" placeholder="{{trans('home.city_map_text_ar')}}"></textarea>
                                </div>
                                <!--<div class="form-group col-md-6">-->
                                <!--    <label for="meta_keywords_en"> {{trans('home.meta_keywords_en')}}</label>-->
                                <!--    <textarea class="form-control" name="meta_keywords_en" placeholder="{{trans('home.meta_keywords_en')}}"></textarea>-->
                                <!--</div>-->
                                <!--<div class="form-group col-md-6">-->
                                <!--    <label for="meta_keywords_ar"> {{trans('home.meta_keywords_ar')}}</label>-->
                                <!--    <textarea class="form-control" name="meta_keywords_ar" placeholder="{{trans('home.meta_keywords_ar')}}"></textarea>-->
                                <!--</div>-->
                                
                                <!--<div class="form-group col-md-6">-->
                                <!--    <label for="meta_description_en"> {{trans('home.meta_description_en')}}</label>-->
                                <!--    <textarea class="form-control" name="meta_description_en" placeholder="{{trans('home.meta_description_en')}}"></textarea>-->
                                <!--</div>-->
                                <!--<div class="form-group col-md-6">-->
                                <!--    <label for="meta_description_ar"> {{trans('home.meta_description_ar')}}</label>-->
                                <!--    <textarea class="form-control" name="meta_description_ar" placeholder="{{trans('home.meta_description_ar')}}"></textarea>-->
                                <!--</div>-->

                                <div class="form-group col-md-12">
                                    <label class="ckbox">
                                        <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                    </label>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                    <a href="{{url('/admin/projects')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
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

