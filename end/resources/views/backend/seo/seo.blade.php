@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{trans('home.Edit Seo')}}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.Edit Seo')}}</li>
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
                            <form id="myForm" method="post" action="{{route('admin.seo.update')}}">
                            @csrf
                                <input type="hidden" name="id" value="{{$seo->id}}" />
                                <div class="card-title d-flex align-items-center">
									<!-- <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div> -->
									<h5 class="mb-0 text-primary">{{trans('home.home_page')}}</h5>
								</div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="home_meta_title_en" id="inputAddress" placeholder="{{trans('home.meta_title_en')}}" rows="5">{{$seo->home_meta_title_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="home_meta_title_ar" id="inputAddress" placeholder="{{trans('home.meta_title_ar')}}" rows="5">{{$seo->home_meta_title_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="home_meta_desc_en" id="inputAddress" placeholder="{{trans('home.meta_desc_en')}}" rows="5">{{$seo->home_meta_desc_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="home_meta_desc_ar" id="inputAddress" placeholder="{{trans('home.meta_desc_ar')}}" rows="5">{{$seo->home_meta_desc_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
									<div class="input-group-text">
										<input class="form-check-input" type="checkbox" name="home_meta_robots" {{($seo->home_meta_robots == 1) ? 'checked':''}} value="1" aria-label="Checkbox for following text input">
									</div>
									<span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
								</div>
                                <div class="card-title d-flex align-items-center">
									<!-- <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div> -->
									<h5 class="mb-0 text-primary">{{trans('home.about-us')}}</h5>
								</div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="about_meta_title_en" id="inputAddress" placeholder="{{trans('home.meta_title_en')}}" rows="5">{{$seo->about_meta_title_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="about_meta_title_ar" id="inputAddress" placeholder="{{trans('home.meta_title_ar')}}" rows="5">{{$seo->about_meta_title_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="about_meta_desc_en" id="inputAddress" placeholder="{{trans('home.meta_desc_en')}}" rows="5">{{$seo->about_meta_desc_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="about_meta_desc_ar" id="inputAddress" placeholder="{{trans('home.meta_desc_ar')}}" rows="5">{{$seo->about_meta_desc_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
									<div class="input-group-text">
										<input class="form-check-input" type="checkbox" name="about_meta_robots" {{($seo->about_meta_robots == 1) ? 'checked':''}} value="1" aria-label="Checkbox for following text input">
									</div>
									<span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
								</div>
                                <div class="card-title d-flex align-items-center">
									<!-- <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div> -->
									<h5 class="mb-0 text-primary">{{trans('home.contact_page')}}</h5>
								</div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="contact_meta_title_en" id="inputAddress" placeholder="{{trans('home.meta_title_en')}}" rows="5">{{$seo->contact_meta_title_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="contact_meta_title_ar" id="inputAddress" placeholder="{{trans('home.meta_title_ar')}}" rows="5">{{$seo->contact_meta_title_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="contact_meta_desc_en" id="inputAddress" placeholder="{{trans('home.meta_desc_en')}}" rows="5">{{$seo->contact_meta_desc_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="contact_meta_desc_ar" id="inputAddress" placeholder="{{trans('home.meta_desc_ar')}}" rows="5">{{$seo->contact_meta_desc_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
									<div class="input-group-text">
										<input class="form-check-input" type="checkbox" name="contact_meta_robots" {{($seo->contact_meta_robots == 1) ? 'checked':''}} value="1" aria-label="Checkbox for following text input">
									</div>
									<span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
								</div>
                                
                                <div class="card-title d-flex align-items-center">
									<!-- <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div> -->
									<h5 class="mb-0 text-primary">{{trans('home.services_page')}}</h5>
								</div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="services_meta_title_en" id="inputAddress" placeholder="{{trans('home.meta_title_en')}}" rows="5">{{$seo->services_meta_title_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="services_meta_title_ar" id="inputAddress" placeholder="{{trans('home.meta_title_ar')}}" rows="5">{{$seo->services_meta_title_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="services_meta_desc_en" id="inputAddress" placeholder="{{trans('home.meta_desc_en')}}" rows="5">{{$seo->services_meta_desc_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="services_meta_desc_ar" id="inputAddress" placeholder="{{trans('home.meta_desc_ar')}}" rows="5">{{$seo->services_meta_desc_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
									<div class="input-group-text">
										<input class="form-check-input" type="checkbox" name="services_meta_robots" {{($seo->services_meta_robots == 1) ? 'checked':''}} value="1" aria-label="Checkbox for following text input">
									</div>
									<span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
								</div>
                                <div class="card-title d-flex align-items-center">
									<!-- <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div> -->
									<h5 class="mb-0 text-primary">{{trans('home.projects_page')}}</h5>
								</div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="projects_meta_title_en" id="inputAddress" placeholder="{{trans('home.meta_title_en')}}" rows="5">{{$seo->projects_meta_title_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="projects_meta_title_ar" id="inputAddress" placeholder="{{trans('home.meta_title_ar')}}" rows="5">{{$seo->projects_meta_title_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="projects_meta_desc_en" id="inputAddress" placeholder="{{trans('home.meta_desc_en')}}" rows="5">{{$seo->projects_meta_desc_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="projects_meta_desc_ar" id="inputAddress" placeholder="{{trans('home.meta_desc_ar')}}" rows="5">{{$seo->projects_meta_desc_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
									<div class="input-group-text">
										<input class="form-check-input" type="checkbox" name="projects_meta_robots" {{($seo->projects_meta_robots == 1) ? 'checked':''}} value="1" aria-label="Checkbox for following text input">
									</div>
									<span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
								</div>
                                <div class="card-title d-flex align-items-center">
									<!-- <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div> -->
									<h5 class="mb-0 text-primary">{{trans('home.blogs_page')}}</h5>
								</div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="blogs_meta_title_en" id="inputAddress" placeholder="{{trans('home.meta_title_en')}}" rows="5">{{$seo->blogs_meta_title_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="blogs_meta_title_ar" id="inputAddress" placeholder="{{trans('home.meta_title_ar')}}" rows="5">{{$seo->blogs_meta_title_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="blogs_meta_desc_en" id="inputAddress" placeholder="{{trans('home.meta_desc_en')}}" rows="5">{{$seo->blogs_meta_desc_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="blogs_meta_desc_ar" id="inputAddress" placeholder="{{trans('home.meta_desc_ar')}}" rows="5">{{$seo->blogs_meta_desc_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
									<div class="input-group-text">
										<input class="form-check-input" type="checkbox" name="blogs_meta_robots" {{($seo->blogs_meta_robots == 1) ? 'checked':''}} value="1" aria-label="Checkbox for following text input">
									</div>
									<span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
								</div>
                                <div class="card-title d-flex align-items-center">
									<!-- <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
									</div> -->
									<h5 class="mb-0 text-primary">{{trans('home.courses_page')}}</h5>
								</div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="courses_meta_title_en" id="inputAddress" placeholder="{{trans('home.meta_title_en')}}" rows="5">{{$seo->courses_meta_title_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_title_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="courses_meta_title_ar" id="inputAddress" placeholder="{{trans('home.meta_title_ar')}}" rows="5">{{$seo->courses_meta_title_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="courses_meta_desc_en" id="inputAddress" placeholder="{{trans('home.meta_desc_en')}}" rows="5">{{$seo->courses_meta_desc_en}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.meta_desc_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" name="courses_meta_desc_ar" id="inputAddress" placeholder="{{trans('home.meta_desc_ar')}}" rows="5">{{$seo->courses_meta_desc_ar}}</textarea>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
									<div class="input-group-text">
										<input class="form-check-input" type="checkbox" name="courses_meta_robots" {{($seo->courses_meta_robots == 1) ? 'checked':''}} value="1" aria-label="Checkbox for following text input">
									</div>
									<span class="tx-13">{{trans('home.meta_robots')}} (index)</span>
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