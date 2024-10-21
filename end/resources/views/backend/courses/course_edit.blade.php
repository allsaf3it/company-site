@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">


<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{trans('home.edit_course')}}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_course')}}</li>
                </ol>
            </nav>
        </div>

    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <form id="myForm" method="post" action="{{route('update.course')}}" enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" name="id" value="{{$course->id}}" />
                                <input type="hidden" name="old_image" value="{{$course->image}}" />
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.name_en')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="{{trans('home.name_en')}}" value="{{$course->name_en}}" name="name_en" />
                                        @error('name_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.name_ar')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="{{trans('home.name_ar')}}" value="{{$course->name_ar}}" name="name_ar" />
                                        @error('name_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.link_en')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{$course->link_en}}"  placeholder="{{trans('home.link_en')}}" name="link_en" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.link_ar')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{$course->link_ar}}"  placeholder="{{trans('home.link_ar')}}" name="link_ar" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.parent_id')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <select class="form-select mb-3" aria-label="Default select example" name="parent_id" required>
                                            <option value="0" @if($course->parent_id == 0) selected @endif>{{trans('home.no_parent')}}</option>
                                            @foreach($courses as $courseItem)
                                                <option value="{{$courseItem->id}}" @if($course->parent_id == $courseItem->id) selected @endif>{{$course->{'name_'.$lang} }}</option>
                                            @endforeach   

                                        </select>
                                        @error('parent_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.text_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" id="mytextarea" name="text_en" id="inputAddress" placeholder="{{trans('home.text_en')}}" rows="10">{!! $course->text_en !!}</textarea>
                                            @error('text_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.text_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" id="mytextarea" name="text_ar" id="inputAddress" placeholder="{{trans('home.text_ar')}}" rows="10">{!! $course->text_ar !!}</textarea>
                                            @error('text_ar')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.left_desc_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" id="mytextarea" name="left_desc_en" id="inputAddress" placeholder="{{trans('home.left_desc_en')}}" rows="10">{!! $course->left_desc_en !!}</textarea>
                                            @error('left_desc_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.left_desc_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" id="mytextarea" name="left_desc_ar" id="inputAddress" placeholder="{{trans('home.left_desc_ar')}}" rows="10">{!! $course->left_desc_ar !!}</textarea>
                                            @error('left_desc_ar')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.right_desc_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" id="mytextarea" name="right_desc_en" id="inputAddress" placeholder="{{trans('home.right_desc_en')}}" rows="10">{!! $course->right_desc_en !!}</textarea>
                                            @error('right_desc_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.right_desc_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" id="mytextarea" name="right_desc_ar" id="inputAddress" placeholder="{{trans('home.right_desc_ar')}}" rows="10">{!! $course->right_desc_ar !!}</textarea>
                                            @error('right_desc_ar')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.visit_link')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="{{trans('home.visit_link')}}" name="visit_link" value="{{$course->visit_link}}" />
                                        @error('visit_link')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.order')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="number" class="form-control"  placeholder="{{trans('home.order')}}" value="{{$course->order}}" name="order" />
                                        @error('order')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.color')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="{{trans('home.color')}}" value="{{$course->color}}" name="color" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.image')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" class="form-control" name="image" id="image" />
                                        @error('image')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <img id="showImage" src="{{empty($course->image) ? url('uploads/no_image.jpg') : url('uploads/courses/' . $course->image)}}" alt="course" style="width: 100px; height:100px;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.alt_img')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="{{trans('home.alt_img')}}" value="{{$course->alt_img}}" name="alt_img" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.breadcrump')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" class="form-control" name="breadcrump" id="image2" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <img id="showImage2" src="{{empty($course->breadcrump) ? url('uploads/no_image.jpg') : url('uploads/courses/' . $course->breadcrump)}}" alt="course" style="width: 100px; height:100px;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.youtube_link')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="{{trans('home.youtube_link')}}" value="{{$course->youtube_link}}" name="youtube_link" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.video')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="file" class="form-control" name="video" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_keywords_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="meta_keywords_en" id="inputAddress" placeholder="{{trans('home.meta_keywords_en')}}" rows="4">{!! $course->meta_keywords_en !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_keywords_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="meta_keywords_ar" id="inputAddress" placeholder="{{trans('home.meta_keywords_ar')}}" rows="4">{!! $course->meta_keywords_ar !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_descriptions_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="meta_descriptions_en" id="inputAddress" placeholder="{{trans('home.meta_descriptions_en')}}" rows="10">{!! $course->meta_descriptions_en !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_descriptions_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="meta_descriptions_ar" id="inputAddress" placeholder="{{trans('home.meta_descriptions_ar')}}" rows="10">{!! $course->meta_descriptions_ar !!}</textarea>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
									<div class="input-group-text">
										<input class="form-check-input" type="checkbox" name="status" {{($course->status == 1) ? 'checked':''}} value="1" aria-label="Checkbox for following text input">
									</div>
									<span class="tx-13">{{trans('home.publish')}}</span>
								</div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="{{trans('home.Save Changes')}}" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                brand_name: {
                    required : true,
                },
            },
            messages :{
                brand_name: {
                    required : 'Please Enter Brand Name',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

<script>
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src' , e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('#image2').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage2').attr('src' , e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection