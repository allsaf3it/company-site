@extends('layouts.admin')

@section('meta')
    <title>{{trans('home.edit_blog_item')}}</title>
@endsection

@section('content')

<div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.blogItems')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/blog-items')}}">{{trans('home.blogItems')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_blog_item')}}</li>
                </ol>
            </div>
        </div>
        <!-- End Page Header -->
        
        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->pull('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        

        <!-- Row-->
        <div class="row">
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <div class="card custom-card overflow-hidden">
                    
                    <div class="card-body">
                        <div>
                            <h6 class="card-title ">{{trans('home.edit_blog_category')}}</h6>
                        </div>
                        {!! Form::open(['method'=>'PATCH','url' => 'admin/blog-items/'.$blogItem->id, 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">

                                <div class="form-group col-md-4">
                                    <label for="name_en">{{trans('home.slug_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.name_en')}}" name="link_en" value="{{$blogItem->link_en}}" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="name_ar">{{trans('home.slug_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.name_ar')}}" name="link_ar" value="{{$blogItem->link_ar}}" required>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="parent">{{trans('home.blogCategory')}}</label>
                                    <select class="form-control select2" name="blogcategory_id">
                                        @foreach($blogCategories as $blogCategory)
                                            <option value="{{$blogCategory->id}}" {{($blogCategory->id == $blogItem->blogcategory_id)?'selected':''}}>{{(app()->getLocale()=='en')? $blogCategory->title_en:$blogCategory->title_ar}}</option>
                                        @endforeach    
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title_blog_en">{{trans('home.title_en')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.title_en')}}" name="title_blog_en" value="{{$blogItem->title_blog_en}}">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="title_blog_ar">{{trans('home.title_ar')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.title_ar')}}" name="title_blog_ar" value="{{$blogItem->title_blog_ar}}">
                                </div>
                                <!--<div class="form-group col-md-6">-->
                                <!--    <label for="blog_h1_en">{{trans('home.blog_h1_en')}}</label>-->
                                <!--    <input type="text"  class="form-control" placeholder="{{trans('home.blog_h1_en')}}" name="blog_h1_en" value="{{$blogItem->blog_h1_en}}">-->
                                <!--</div>-->

                                <!--<div class="form-group col-md-6">-->
                                <!--    <label for="blog_h1_ar">{{trans('home.blog_h1_ar')}}</label>-->
                                <!--    <input type="text"  class="form-control" placeholder="{{trans('home.blog_h1_ar')}}" name="blog_h1_ar" value="{{$blogItem->blog_h1_ar}}">-->
                                <!--</div>-->

                                <div class="col-md-4">
                                    <label>{{trans('home.breadcrump_video')}}</label>
                                    <div class="input-group mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"> {{trans('home.upload')}}</span>
                                        </div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="breadcrump_video">
                                            <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_video')}}</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label>{{trans('home.image')}}</label>
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
                                <div class="form-group col-md-2">
                                    <label for="alt_img">{{trans('home.alt_img')}}</label>
                                    <input type="text"  class="form-control" placeholder="{{trans('home.alt_img')}}" name="alt_img" value="{{$blogItem->alt_img}}">
                                </div>

                                <!--<div class="form-group col-md-4">-->
                                <!--    <label for="writer">{{trans('home.writer')}}</label>-->
                                <!--    <input type="text"  class="form-control" placeholder="{{trans('home.writer')}}" name="writer" value="{{$blogItem->writer}}" required>-->
                                <!--</div>-->

                                <div class="form-group col-md-2">
                                    <label for="code">{{trans('home.date ')}}</label>
                                    <div class="input-group">
                                        <input type='text' class="form-control" name="date" placeholder="{{trans('home.date')}}" id="datepicker" value="{{$blogItem->date}}"  required readonly/>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fas fa-calendar"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                @if($blogItem->breadcrump_video)
                                    <div class="form-group col-md-4">
                                        <video preload="auto" loop muted autoplay playsinline width="100%" height="190px">
                                            <source src="{{url('uploads/blogitems/source/' . $blogItem->breadcrump_video)}}" type="video/mp4">
                                        </video>
                                    </div>
                                @endif



                                @if($blogItem->image)
                                    <div class="col-md-8">
                                        <img src="{{url('\uploads\blogitems\resize200')}}\{{$blogItem->image}}" width="200" height="150">
                                    </div>
                                @endif
                                <div class="form-group col-md-3">
                                    <label for="helperText">{{trans('home.parent')}}</label>
                                    <select class="form-control select2" name="parent_id" required>
                                        <option value="0" {{($blogItem->parent_id == 0)?'selected':''}}>{{trans('home.no_parent')}}</option>
                                        @foreach($blogs as $blog)
                                            <option value="{{$blog->id}}"  {{($blog->id ==$blogItem->parent_id)?'selected':''}}>{{(app()->getLocale() == 'en')?$blog->title_blog_en:$blog->title_blog_ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-3"> 
                                    <label for="type">{{trans('home.writers')}}</label>
                                    <select class="form-control select2 type" name="writer_id">
                                        @foreach ($writers as $writer)
                                            <option value ="{{$writer->id}}">{{$writer->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6"></div>

                                <div class="form-group col-md-6 ">
                                    <label for="text_en">{{trans('home.text_en')}}</label>
                                    <textarea class="form-control area1" name="text_en" placeholder="{{trans('home.text_en')}}" >{!! $blogItem->text_en !!}</textarea>
                                </div>

                                <div class="form-group col-md-6 "> 
                                    <label for="text_ar">{{trans('home.text_ar')}}</label>
                                    <textarea class="form-control area1" name="text_ar" placeholder="{{trans('home.text_ar')}}" >{!! $blogItem->text_ar !!}</textarea>
                                </div>

                                <div class="form-group col-md-6 ">
                                        <label for="blogcategory">{{trans('home.meta_keywords_en')}}</label>
                                        <textarea class="form-control " name="meta_keywords_en" placeholder="{{trans('home.meta_keywords_en')}}" >{{$blogItem->meta_keywords_en}}</textarea>
                                </div>
                                <div class="form-group col-md-6 ">
                                        <label for="blogcategory">{{trans('home.meta_keywords_ar')}}</label>
                                        <textarea class="form-control " name="meta_keywords_ar" placeholder="{{trans('home.meta_keywords_ar')}}" >{{$blogItem->meta_keywords_ar}}</textarea>
                                </div>

                                <div class="form-group col-md-6 "> 
                                    <label for="blogcategory">{{trans('home.meta_description_en')}}</label>
                                    <textarea class="form-control " name="meta_description_en" placeholder="{{trans('home.meta_description_en')}}" >{{$blogItem->meta_description_en}}</textarea>
                                </div>
                                <div class="form-group col-md-6 "> 
                                    <label for="blogcategory">{{trans('home.meta_description_ar')}}</label>
                                    <textarea class="form-control " name="meta_description_ar" placeholder="{{trans('home.meta_description_ar')}}" >{{$blogItem->meta_description_ar}}</textarea>
                                </div>
                                
                                <div class="col-md-12">
                                    <hr>
                                    
                                    <div class="field_wrapper">
                                        <h5>{{trans('home.faq')}}</h5>
                                        <div class="row">
                                            @if(count($questions) > 0)
                                                @foreach($questions as $key=>$question)
                                                    <div class="form-group col-md-12"> 
                                                        <label for="question">{{trans('home.question')}}</label>
                                                        <input type="text"  class="form-control" placeholder="{{trans('home.question')}}" readonly value="{{$question->question}}">
                                                    </div>
            
                                                    <div class="form-group col-md-10">
                                                        <label for="answer">{{trans('home.answer')}}</label>
                                                        <textarea class="form-control" placeholder="{{trans('home.answer')}}" readonly>{{$question->answer}}</textarea>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label for="helperText">{{trans('home.lang')}}</label>
                                                        <select class="form-control select2" disabled name="lang[]" required>
                                                            <option value="en" @if(($question->lang) == 'en') selected @endif>{{trans('home.english')}}</option>
                                                            <option value="ar" @if(($question->lang) == 'ar') selected @endif>{{trans('home.arabic')}}</option>
                                                        </select>
                                                    </div>
    
                                                    <div class="form-group col-md-2">
                                                        <button type="button" style="margin-top: 28px;" class="btn" data-toggle="modal" data-target="#iconForm_{{$key}}"><i class="fas fa-edit"></i></button>
                                                        <button type="button" style="margin-top: 28px;" class="btn rmv" data-faq_id="{{$question->id}}" id="type-error"><i class="fas fa-trash-alt"></i></button>
                                                    </div>
                                                @endforeach    
                                            @else
                                                <div class="form-group col-md-12"> 
                                                    <label for="question">{{trans('home.question')}}</label>
                                                    <input type="text"  class="form-control" placeholder="{{trans('home.question')}}" name="question[]">
                                                </div>
        
                                                <div class="form-group col-md-12">
                                                    <label for="answer">{{trans('home.answer')}}</label>
                                                    <textarea class="form-control" placeholder="{{trans('home.answer')}}" name="answer[]"></textarea>
                                                </div> 
                                                <div class="form-group col-md-4">
                                                    <label for="helperText">{{trans('home.lang')}}</label>
                                                    <select class="form-control select2" name="lang[]" required>
                                                        <option value="en">{{trans('home.english')}}</option>
                                                        <option value="ar">{{trans('home.arabic')}}</option>
                                                    </select>
                                                </div>
                                            @endif
                                        </div>  
                                    </div>       
                                    <a href="javascript:void(0);" class="add_button btn" title="Add field"><i class="fas fa-plus-square"></i></a>
                                </div>

                                <div class="form-group col-md-12">
                                    <label class="ckbox">
                                        <input name="status" value="1" {{($blogItem->status == 1)? 'checked':''}} type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                    </label>
                                </div>

                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="image-note"></i> {{trans('home.save')}} </button>
                                    <a href="{{url('/admin/blog-items')}}"><button type="button" class="btn btn-danger mr-1"><i class="image-trash"></i> {{trans('home.cancel')}}</button></a>
                                </div>
                                
                            </div>
                        {!! Form::close() !!}
                        
                         <!-- Modal -->
                        @foreach($questions as $key=>$question)
                            <div class="modal fade text-left" id="iconForm_{{$key}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h3 class="modal-title" id="myModalLabel34">{{trans('home.edit_faq')}}</h3>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('updateFaq')}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="form-group col-md-12"> 
                                                        <label for="question">{{trans('home.question')}}</label>
                                                        <input type="text"  class="form-control" placeholder="{{trans('home.question')}}" name="question" value="{{$question->question}}">
                                                    </div>

                                                    <div class="form-group col-md-12">
                                                        <label for="answer">{{trans('home.answer')}}</label>
                                                        <textarea type="text"  class="form-control" placeholder="{{trans('home.answer')}}" name="answer" >{{$question->answer}}</textarea>
                                                    </div> 
                                                    <div class="form-group col-md-4">
                                                        <label for="helperText">{{trans('home.lang')}}</label>
                                                        <select class="form-control select2" name="lang" required>
                                                            <option value="en" @if(($question->lang) == 'en') selected @endif>{{trans('home.english')}}</option>
                                                            <option value="ar" @if(($question->lang) == 'ar') selected @endif>{{trans('home.arabic')}}</option>
                                                        </select>
                                                    </div>

                                                    <input type="hidden" name="faq_id" value="{{$question->id}}"/>

                                                    <div class="form-group col-md-12">
                                                        <button type="submit" class="btn btn-success">{{trans('home.save')}} </button>
                                                    </div>
                                                </div>                             
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End Row -->
    </div>

@endsection


@section('script')
    <script>

        $( "#datepicker" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });
        
        $(document).ready(function(){
            var maxField = 100; //Input fields increment limitation
            var addButton = $('.add_button'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML ='<div class="row"><hr><div class="form-group col-md-12"><label for="question">{{trans('home.question')}}</label><input type="text"  class="form-control" placeholder="{{trans('home.question')}}" name="question[]"></div>';
            fieldHTML +='<div class="form-group col-md-11"><label for="answer">{{trans('home.answer')}}</label><textarea class="form-control" placeholder="{{trans('home.answer')}}" name="answer[]"></textarea></div>';
            fieldHTML +='<div class="form-group col-md-4"><label for="helperText">{{trans('home.lang')}}</label><select class="form-control select2" name="lang[]" required><option value="en">{{trans('home.english')}}</option><option value="ar">{{trans('home.arabic')}}</option></select></div>';
            fieldHTML +='<div class="form-group col-md-1"><a href="javascript:void(0);" style="margin-top: 30px;" class="remove_button btn"><i class="fas fa-trash-alt"></i></a></div></div>';

            var x = 1; //Initial field counter is 1

            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent().parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
        
        $(document).ready(function(){
            $('.rmv').click(function () {
                var faq_id = $(this).data('faq_id');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:"{{route('removeFaq')}}",
                    method:'POST',
                    data: {faq_id:faq_id},
                    success:function(data) {
                        location.reload();
                    }
                });
            });
            
        });
    </script>
@endsection