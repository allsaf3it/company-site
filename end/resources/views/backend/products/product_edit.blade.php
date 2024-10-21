@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">


<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                </ol>
            </nav>
        </div>

    </div>
    @php
        $categories = App\Models\Category::get();
    @endphp
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-10">
                    <div class="card">
                        <div class="card-body">
                            <form id="myForm" method="post" action="{{route('update.products')}}" enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" name="id" value="{{$product->id}}" />
                                <input type="hidden" name="old_image" value="{{$product->image}}" />
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Name EN</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="Product Name" value="{{$product->name_en}}" name="name_en" />
                                        @error('name_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Name HINDI</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="Product Name" value="{{$product->name_ar}}" name="name_ar" />
                                        @error('name_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Category</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <select class="form-select mb-3" aria-label="Default select example" name="category_id" required>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}" @if($product->category_id == $category->id) selected @endif>{{(app()->getLocale()=='en')? $category->name_en:$category->name_ar}}</option>
                                            @endforeach   

                                        </select>
                                        @error('category_id')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Text EN</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" id="mytextarea" name="text_en" id="inputAddress" placeholder="Text Info" rows="10">{!! $product->text_en !!}</textarea>
                                            @error('text_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Text HINDI</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" id="mytextarea" name="text_ar" id="inputAddress" placeholder="Text Info" rows="10">{!! $product->text_ar !!}</textarea>
                                            @error('text_ar')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Image</h6>
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
                                        <img id="showImage" src="{{empty($product->image) ? url('uploads/no_image.jpg') : url('uploads/products/' . $product->image)}}" alt="product" style="width: 100px; height:100px;">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Upload Multi Images</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div class="form-group col-md-12">
                                            <hr>
                                                <div class="dropzone col-md-12 upload_images">
                                            </div>
                                        </div>
                                        
                                        @if($product->images())
                                            <div class="col-md-12">
                                                <div id="lightgallery" class="row mb-0">
                                                    @foreach($product->images() as $key=>$image)
                                                        <div class="col-xs-6 col-sm-2 col-md-2 col-xl-2 mb-2 pl-sm-2 pr-sm-2" data-responsive="{{url('uploads/products/'.$image->image)}}" data-src="{{url('uploads/products/'.$image->image)}}" data-sub-html="<h4> {{trans('home.image')}} {{$key+1}}</h4>">
                                                            <a href="">
                                                                <img class="img-responsive" style="width: 150px; height:100px; display: inline-block; margin-right:10px;" src="{{url('uploads/products/'.$image->image)}}">
                                                            </a>
                                                            <div>
                                                                <a href='#' data-image='{{$image->id}}' class='delete_img_btn' >Delete</a>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/dropzone.js"></script>
    
    <script type="text/javascript">

        var token = "{{ csrf_token() }}";
        //Dropzone.autoDiscover = true;
        Dropzone.autoDiscover = false;

        $("div.upload_images").dropzone({
            
            addRemoveLinks: true,
            acceptedFiles: ".jpeg,.jpg,.png,.gif,.webp",
            url: "{{ URL::to('admin/products/uploadImages') }}",

            init: function() {
                this.on("sending", function(file, xhr, formData) {
                    formData.append("productId", {{$product->id}});
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
                    url: "{{ URL::to('admin/products/removeUploadImages') }}",
                    data: {type:'product_image',name: fileName,request: 'delete'},
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
            var productId={{$product->id}};
            var btn = $(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:" {{url('admin/products/deleteImege')}}",
                method:'POST',
                data:{image:image , productId:productId },
                success:function(data)
                {
                    location.href = "{{route('edit.products',$product->id)}}";
                }
            });
        });
        
        

    </script>
@endsection