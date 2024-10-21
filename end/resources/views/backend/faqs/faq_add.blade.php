@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="page-content"> 
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">{{trans('home.add_faq')}}</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.add_faq')}}</li>
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
                            <form id="myForm" method="post" action="{{route('store.faq')}}" enctype="multipart/form-data">
                            @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.question_en')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="{{trans('home.question_en')}}" name="question_en" />
                                        @error('question_en')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.question_ar')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="{{trans('home.question_ar')}}" name="question_ar" />
                                        @error('question_ar')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.answer_en')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" id="mytextarea" name="answer_en" id="inputAddress" placeholder="{{trans('home.answer_en')}}" rows="10"></textarea>
                                            @error('answer_en')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.answer_ar')}}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <textarea class="form-control" id="mytextarea" name="answer_ar" id="inputAddress" placeholder="{{trans('home.answer_ar')}}" rows="10"></textarea>
                                            @error('answer_ar')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>
                                </div>
                                <div class="input-group mb-3">
									<div class="input-group-text">
										<input class="form-check-input" type="checkbox" name="status" value="1" aria-label="Checkbox for following text input">
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
@endsection