@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{trans('home.Edit MenuItem')}}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.Edit MenuItem')}}</li>
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
                            <form id="myForm" method="post" action="{{route('update.menuitem')}}">
                            @csrf
                                <input type="hidden" name="id" value="{{$menuItem->id}}" />
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.name_en')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="{{trans('home.name_en')}}" value="{{$menuItem->name_en}}" name="name_en" />
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
                                        <input type="text" class="form-control"  placeholder="{{trans('home.name_ar')}}" value="{{$menuItem->name_ar}}" name="name_ar" />
                                        @error('name_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.MenuItem Type')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <select class="form-select mb-3" aria-label="Default select example" name="type" required>
                                            <option value="home" @if($menuItem->type == 'home') selected @endif>{{trans('home.home')}}</option>
                                            <option value="about-us" @if($menuItem->type == 'about-us') selected @endif>{{trans('home.about-us')}}</option>
                                            <option value="projects" @if($menuItem->type == 'projects') selected @endif>{{trans('home.projects')}}</option>
                                            <option value="services" @if($menuItem->type == 'services') selected @endif>{{trans('home.services')}}</option>
                                            <option value="courses" @if($menuItem->type == 'courses') selected @endif>{{trans('home.courses')}}</option>
                                            <option value="blogs" @if($menuItem->type == 'blogs') selected @endif>{{trans('home.blogs')}}</option>
                                            <option value="contact" @if($menuItem->type == 'contact') selected @endif>{{trans('home.contact_us')}}</option>
                                        </select>
                                        @error('type')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.order')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="number" class="form-control"  placeholder="{{trans('home.order')}}" value="{{$menuItem->order}}" name="order" />
                                        @error('order')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="input-group mb-3">
									<div class="input-group-text">
										<input class="form-check-input" type="checkbox" name="status" {{($menuItem->status == 1) ? 'checked':''}} value="1" aria-label="Checkbox for following text input">
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
@endsection