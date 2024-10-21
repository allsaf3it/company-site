@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">


<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{trans('home.edit_project')}}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_project')}}</li>
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
                            <form id="myForm" method="post" action="{{route('update.project')}}" enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" name="id" value="{{$project->id}}" />
                                <input type="hidden" name="old_image" value="{{$project->image}}" />
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.name_en')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="{{trans('home.name_en')}}" value="{{$project->name_en}}" name="name_en" />
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
                                        <input type="text" class="form-control"  placeholder="{{trans('home.name_ar')}}" value="{{$project->name_ar}}" name="name_ar" />
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
                                        <input type="text" class="form-control" value="{{$project->link_en}}"  placeholder="{{trans('home.link_en')}}" name="link_en" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.link_ar')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control" value="{{$project->link_ar}}"  placeholder="{{trans('home.link_ar')}}" name="link_ar" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.parent_id')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <select class="form-select mb-3" aria-label="Default select example" name="parent_id" required>
                                            <option value="0" @if($project->parent_id == 0) selected @endif>{{trans('home.no_parent')}}</option>
                                            @foreach($projects as $projectItem)
                                                <option value="{{$projectItem->id}}" @if($project->parent_id == $projectItem->id) selected @endif>{{$project->{'name_'.$lang} }}</option>
                                            @endforeach   

                                        </select>
                                        @error('parent_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.short_text_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" id="mytextarea" name="short_text_en" id="inputAddress" placeholder="{{trans('home.short_text_en')}}" rows="10">{!! $project->short_text_en !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.short_text_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" id="mytextarea" name="short_text_ar" id="inputAddress" placeholder="{{trans('home.short_text_ar')}}" rows="10">{!! $project->short_text_ar !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.text_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" id="mytextarea" name="text_en" id="inputAddress" placeholder="{{trans('home.text_en')}}" rows="10">{!! $project->text_en !!}</textarea>
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
                                        <textarea class="form-control" id="mytextarea" name="text_ar" id="inputAddress" placeholder="{{trans('home.text_ar')}}" rows="10">{!! $project->text_ar !!}</textarea>
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
                                        <textarea class="form-control" id="mytextarea" name="left_desc_en" id="inputAddress" placeholder="{{trans('home.left_desc_en')}}" rows="10">{!! $project->left_desc_en !!}</textarea>
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
                                        <textarea class="form-control" id="mytextarea" name="left_desc_ar" id="inputAddress" placeholder="{{trans('home.left_desc_ar')}}" rows="10">{!! $project->left_desc_ar !!}</textarea>
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
                                        <textarea class="form-control" id="mytextarea" name="right_desc_en" id="inputAddress" placeholder="{{trans('home.right_desc_en')}}" rows="10">{!! $project->right_desc_en !!}</textarea>
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
                                        <textarea class="form-control" id="mytextarea" name="right_desc_ar" id="inputAddress" placeholder="{{trans('home.right_desc_ar')}}" rows="10">{!! $project->right_desc_ar !!}</textarea>
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
                                        <input type="text" class="form-control"  placeholder="{{trans('home.visit_link')}}" name="visit_link" value="{{$project->visit_link}}" />
                                        @error('visit_link')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.color')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="{{trans('home.color')}}" value="{{$project->color}}" name="color" />
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
                                        <img id="showImage" src="{{empty($project->image) ? url('uploads/no_image.jpg') : url('uploads/projects/' . $project->image)}}" alt="project" style="width: 100px; height:100px;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.alt_img')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="{{trans('home.alt_img')}}" value="{{$project->alt_img}}" name="alt_img" />
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
                                        <img id="showImage2" src="{{empty($project->breadcrump) ? url('uploads/no_image.jpg') : url('uploads/projects/' . $project->breadcrump)}}" alt="project" style="width: 100px; height:100px;">
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
                                <!-- <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.Upload Multi Images')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div class="form-group col-md-12">
                                            <hr>
                                                <div class="dropzone col-md-12 upload_images">
                                            </div>
                                        </div>
                                        
                                        @if($project->images())
                                            <div class="col-md-12">
                                                <div id="lightgallery" class="row mb-0">
                                                    @foreach($project->images() as $key=>$image)
                                                        <div class="col-xs-6 col-sm-2 col-md-2 col-xl-2 mb-2 pl-sm-2 pr-sm-2" data-responsive="{{url('uploads/projects/'.$image->image)}}" data-src="{{url('uploads/projects/'.$image->image)}}" data-sub-html="<h4> {{trans('home.image')}} {{$key+1}}</h4>">
                                                            <a href="">
                                                                <img class="img-responsive" style="width: 150px; height:100px; display: inline-block; margin-right:10px;" src="{{url('uploads/projects/'.$image->image)}}">
                                                            </a>
                                                            <div>
                                                                <a href='#' data-image='{{$image->id}}' class='delete_img_btn' >{{trans('home.delete')}}</a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div> -->
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_keywords_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="meta_keywords_en" id="inputAddress" placeholder="{{trans('home.meta_keywords_en')}}" rows="4">{!! $project->meta_keywords_en !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_keywords_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="meta_keywords_ar" id="inputAddress" placeholder="{{trans('home.meta_keywords_ar')}}" rows="4">{!! $project->meta_keywords_ar !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_descriptions_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="meta_descriptions_en" id="inputAddress" placeholder="{{trans('home.meta_descriptions_en')}}" rows="10">{!! $project->meta_descriptions_en !!}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_descriptions_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="meta_descriptions_ar" id="inputAddress" placeholder="{{trans('home.meta_descriptions_ar')}}" rows="10">{!! $project->meta_descriptions_ar !!}</textarea>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
									<div class="input-group-text">
										<input class="form-check-input" type="checkbox" name="status" {{($project->status == 1) ? 'checked':''}} value="1" aria-label="Checkbox for following text input">
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
                type: 'project_image',
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
                    location.href = "{{route('edit.project',$project->id)}}";
                }
            });
        });
        
        

    </script>
@endsection