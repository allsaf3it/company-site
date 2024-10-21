@extends('layouts.admin')

@section('style')
<style>
    img {
        display:block !important;
    }
    .dz-hidden-input{
        position: absolute !important;
        top: 0px !important;
        left: 250px !important;
    }

</style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
@endsection
@section('content')

<div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.projects')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/projects')}}">{{trans('home.projects')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_project')}}</li>
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
                            <h6 class="card-title mb-1">{{trans('home.edit_project')}}</h6>
                        </div>
                        {!! Form::open(['method'=>'PATCH','url' => 'admin/projects/'.$project->id, 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label class="">{{trans('home.title_en')}}</label>
                                    <input class="form-control" name="title_en" type="text" placeholder="{{trans('home.title_en')}}" value="{{$project->title_en}}" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label class="">{{trans('home.title_ar')}}</label>
                                    <input class="form-control" name="title_ar" type="text" placeholder="{{trans('home.title_ar')}}"value="{{$project->title_ar}}" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="">{{trans('home.order')}}</label>
                                    <input class="form-control" name="order" type="text" placeholder="{{trans('home.order')}}"value="{{$project->order}}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label class="">{{trans('home.name_en')}}</label>
                                    <input class="form-control" name="name_en" type="text" placeholder="{{trans('home.name_en')}}" value="{{$project->name_en}}" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label class="">{{trans('home.name_ar')}}</label>
                                    <input class="form-control" name="name_ar" type="text" placeholder="{{trans('home.name_ar')}}"value="{{$project->name_ar}}" required>
                                </div>
                                
                                <div class="form-group col-md-3">
                                    <label for="name_en">{{trans('home.slug_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.name_en')}}" name="link_en" value="{{$project->link_en}}" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label for="name_ar">{{trans('home.slug_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.name_ar')}}" name="link_ar" value="{{$project->link_ar}}" required>
                                </div>
                                
                                {{--<div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.brand')}}</label>
                                    <select class="form-control select2" name="brand_id" required>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" {{($brand->id == $project->brand_id)?'selected':''}}>{{(app()->getLocale() == 'en')?$brand->name_en:$brand->name_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>--}}
                                
                                <div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.service')}}</label>
                                    <select class="form-control select2" name="service_id">
                                        @foreach($services as $service)
                                            <option value="{{$service->id}}" {{($service->id == $project->service_id)?'selected':''}}>{{(app()->getLocale() == 'en')?$service->name_service_en:$service->name_service_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="helperText">{{trans('home.parent')}}</label>
                                    <select class="form-control select2" name="parent_id" required>
                                        <option value="0" {{($project->parent_id == 0)?'selected':''}}>{{trans('home.no_parent')}}</option>
                                        @foreach($projects as $serv)
                                            <option value="{{$serv->id}}"  {{($serv->id ==$project->parent_id)?'selected':''}}>{{(app()->getLocale() == 'en')?$serv->name_en:$serv->name_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="color"> {{trans('home.color')}}</label>
                                    <input class="form-control" name="color" type="text" placeholder="{{trans('home.color')}}" value="{{$project->color}}">
                                </div>
                                
                                {{--<div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.category')}}</label>
                                    <select class="form-control select2" name="category_id" required>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{($category->id == $project->category_id)?'selected':''}}>{{(app()->getLocale() == 'en')?$category->name_en:$category->name_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>--}}
                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.title_en_inside')}}</label>
                                    <textarea class="form-control area1" name="title_en_inside" placeholder="{{trans('home.title_en_inside')}}">{!! $project->title_en_inside !!}</textarea>
                                </div>

                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.title_ar_inside')}}</label>
                                    <textarea class="form-control area1" name="title_ar_inside" placeholder="{{trans('home.title_ar_inside')}}">{!! $project->title_ar_inside !!}</textarea>
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
                                
                                
                                @if($project->image)
                                    <div class="col-md-3">
                                        <img src="{{url('\uploads\projects\source')}}\{{$project->image}}" width="150">
                                    </div>
                                @endif
                                @if($project->image2)
                                    <div class="col-md-3">
                                        <img src="{{url('\uploads\projects\source')}}\{{$project->image2}}" width="150">
                                    </div>
                                                         
                                @endif
                                @if($project->image3)
                                    <div class="col-md-3">
                                        <img src="{{url('\uploads\projects\source')}}\{{$project->image3}}" width="150">
                                    </div>
                                                         
                                @endif
                                @if($project->hello_video)
                                    <div class="form-group col-md-3">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/projects/source/' . $project->hello_video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif

                                
                                <div class="form-group col-md-6">
                                    <label for="text_en"> {{trans('home.text_en')}}</label>
                                    <textarea class="form-control area1" name="text_en" placeholder="{{trans('home.text_en')}}">{{$project->text_en}}</textarea>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="text_ar"> {{trans('home.text_ar')}}</label>
                                    <textarea class="form-control area1" name="text_ar" placeholder="{{trans('home.text_ar')}}">{{$project->text_ar}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="featurs_en"> {{trans('home.featurs_en')}}</label>
                                    <textarea class="form-control" name="featurs_en" placeholder="{{trans('home.featurs_en')}}">{{$project->featurs_en}}</textarea>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="featurs_ar"> {{trans('home.featurs_ar')}}</label>
                                    <textarea class="form-control" name="featurs_ar" placeholder="{{trans('home.featurs_ar')}}">{{$project->featurs_ar}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="challenge_title_en">{{trans('home.challenge_title_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.challenge_title_en')}}" name="challenge_title_en" value="{{$project->challenge_title_en}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="challenge_title_ar">{{trans('home.challenge_title_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.challenge_title_ar')}}" name="challenge_title_ar" value="{{$project->challenge_title_ar}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="challenge_text_en"> {{trans('home.challenge_text_en')}}</label>
                                    <textarea class="form-control area1" name="challenge_text_en" placeholder="{{trans('home.challenge_text_en')}}">{{$project->challenge_text_en}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="challenge_text_ar"> {{trans('home.challenge_text_ar')}}</label>
                                    <textarea class="form-control area1" name="challenge_text_ar" placeholder="{{trans('home.challenge_text_ar')}}">{{$project->challenge_text_ar}}</textarea>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="challenge_details_en"> {{trans('home.challenge_details_en')}}</label>
                                    <textarea class="form-control area1" name="challenge_details_en" placeholder="{{trans('home.challenge_details_en')}}">{{$project->challenge_details_en}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="challenge_details_ar"> {{trans('home.challenge_details_ar')}}</label>
                                    <textarea class="form-control area1" name="challenge_details_ar" placeholder="{{trans('home.challenge_details_ar')}}">{{$project->challenge_details_ar}}</textarea>
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
                                <div class="form-group col-md-6">
                                    <label for="ar_en_title_en">{{trans('home.ar_en_title_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.ar_en_title_en')}}" name="ar_en_title_en" value="{{$project->ar_en_title_en}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="ar_en_title_ar">{{trans('home.ar_en_title_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.ar_en_title_ar')}}" name="ar_en_title_ar" value="{{$project->ar_en_title_ar}}">
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
                                <div class="form-group col-md-6">
                                    <label for="city_map_title_en">{{trans('home.city_map_title_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.city_map_title_en')}}" name="city_map_title_en" value="{{$project->city_map_title_en}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="city_map_title_ar">{{trans('home.city_map_title_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.city_map_title_ar')}}" name="city_map_title_ar" value="{{$project->city_map_title_ar}}">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city_map_text_en"> {{trans('home.city_map_text_en')}}</label>
                                    <textarea class="form-control area1" name="city_map_text_en" placeholder="{{trans('home.city_map_text_en')}}">{{$project->city_map_text_en}}</textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="city_map_text_ar"> {{trans('home.city_map_text_ar')}}</label>
                                    <textarea class="form-control area1" name="city_map_text_ar" placeholder="{{trans('home.city_map_text_ar')}}">{{$project->city_map_text_ar}}</textarea>
                                </div>
                                <!--<div class="form-group col-md-6">-->
                                <!--    <label for="meta_keywords_en"> {{trans('home.meta_keywords_en')}}</label>-->
                                <!--    <textarea class="form-control" name="meta_keywords_en" placeholder="{{trans('home.meta_keywords_en')}}">{{$project->meta_keywords_en}}</textarea>-->
                                <!--</div>-->
                                <!--<div class="form-group col-md-6">-->
                                <!--    <label for="meta_keywords_ar"> {{trans('home.meta_keywords_ar')}}</label>-->
                                <!--    <textarea class="form-control" name="meta_keywords_ar" placeholder="{{trans('home.meta_keywords_ar')}}">{{$project->meta_keywords_ar}}</textarea>-->
                                <!--</div>-->
                                
                                <!--<div class="form-group col-md-6">-->
                                <!--    <label for="meta_description_en"> {{trans('home.meta_description_en')}}</label>-->
                                <!--    <textarea class="form-control" name="meta_description_en" placeholder="{{trans('home.meta_description_en')}}">{{$project->meta_description_en}}</textarea>-->
                                <!--</div>-->
                                <!--<div class="form-group col-md-6">-->
                                <!--    <label for="meta_description_ar"> {{trans('home.meta_description_ar')}}</label>-->
                                <!--    <textarea class="form-control" name="meta_description_ar" placeholder="{{trans('home.meta_description_ar')}}">{{$project->meta_description_ar}}</textarea>-->
                                <!--</div>-->
                                
                                <div class="form-group col-md-12">
                                    <hr>
                                    <label for="images">{{trans('home.project_images')}}</label>
                                        <div class="dropzone col-md-12 upload_images">
                                    </div>
                                </div>
                                
                                @if($project->images())
                                    <div class="col-md-12">
                                        <div id="lightgallery" class="row mb-0">
                                            @foreach($project->images() as $key=>$image)
                                                <div class="col-xs-6 col-sm-2 col-md-2 col-xl-2 mb-2 pl-sm-2 pr-sm-2" data-responsive="{{url('uploads/projects/source/'.$image->image)}}" data-src="{{url('uploads/projects/source/'.$image->image)}}" data-sub-html="<h4> {{trans('home.image')}} {{$key+1}}</h4>">
                                                    <a href="">
                                                        <img class="img-responsive" src="{{url('uploads/projects/source/'.$image->image)}}">
                                                    </a>
                                                    <div>
                                                        <a href='#' data-image='{{$image->id}}' class='delete_img_btn' >{{trans('home.delete')}}</a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group col-md-12">
                                    <label class="ckbox">
                                        <input name="status" value="1" {{($project->status == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
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
@section('script')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
    
    <script type="text/javascript">

        var token = "{{ csrf_token() }}";
        //Dropzone.autoDiscover = true;
        Dropzone.autoDiscover = false;

        $("div.upload_images").dropzone({
            
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp",
            url: "{{ URL::to('admin/projects/uploadImages') }}",

            init: function() {
                this.on("sending", function(file, xhr, formData) {
                    formData.append("projectId", {{$project->id}});
                });
            },
            
            params: {
                _token: token,
                type: 'product_image',
            },

            removedfile: function(file) {

                var fileName = file.name; 
                $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
                    $.ajax({
                    type: 'POST',
                    url: "{{ URL::to('admin/projects/removeUploadImages') }}",
                    data: {type:'project_image',name: fileName,request: 'delete'},
                    sucess: function(data){
                        console.log('success: ' + data);
                    }
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            }

        });
        
    
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 3, // MB
            accept: function(file, done) {

            },
        };
        
        
        $('.delete_img_btn').on('click',function(){
            var image = $(this).data('image');
            var projectId={{$project->id}};
            var btn = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:" {{url('admin/projects/deleteImege')}}",
                method:'POST',
                data:{image:image , projectId:projectId },
                success:function(data)
                {
                    location.href = "{{route('projects.edit',$project->id)}}";
                }
            });
        });

    </script>
    
@endsection

