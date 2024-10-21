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
                            <form id="myForm" method="post" action="{{route('update.dashboardMenuitem')}}">
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
                                        <h6 class="mb-0">{{trans('home.parent_id')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <select class="form-select mb-3" aria-label="Default select example" name="parent_id" required>
                                            <option value="0" @if($menuItem->parent_id == 0) selected @endif>{{trans('home.no_parent')}}</option>
                                            @foreach($menuItems as $menu)
                                                <option value="{{$menu->id}}" @if($menuItem->parent_id == $menu->id) selected @endif>{{$menu->{'name_'.$lang} }}</option>
                                            @endforeach   

                                        </select>
                                        @error('parent_id')
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
                                            <option value="javascript:;" @if($menuItem->type == 'javascript:;') selected @endif>{{trans('home.parent')}}</option>
                                            <option value="my-bots" @if($menuItem->type == 'my-bots') selected @endif>{{trans('home.my-bots')}}</option>
                                            <option value="recommendation" @if($menuItem->type == 'recommendation') selected @endif>{{trans('home.recommendation')}}</option>
                                            <option value="my-wallet" @if($menuItem->type == 'my-wallet') selected @endif>{{trans('home.my-wallet')}}</option>
                                            <option value="medium-term" @if($menuItem->type == 'medium-term') selected @endif>{{trans('home.medium-term')}}</option>
                                            <option value="long-term" @if($menuItem->type == 'long-term') selected @endif>{{trans('home.long-term')}}</option>
                                            <option value="packages" @if($menuItem->type == 'packages') selected @endif>{{trans('home.packages')}}</option>
                                            <option value="st-wallet" @if($menuItem->type == 'st-wallet') selected @endif>{{trans('home.st-wallet')}}</option>
                                            <option value="invite-friends" @if($menuItem->type == 'invite-friends') selected @endif>{{trans('home.invite-friends')}}</option>
                                            <option value="deposite" @if($menuItem->type == 'deposite') selected @endif>{{trans('home.deposite')}}</option>
                                            <!-- <option value="contact" @if($menuItem->type == 'contact') selected @endif>{{trans('home.contact_us')}}</option> -->
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
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{trans('home.font_awsome')}}</h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" class="form-control"  placeholder="{{trans('home.font_awsome')}}" value="{{$menuItem->font_awsome}}" name="font_awsome" />
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