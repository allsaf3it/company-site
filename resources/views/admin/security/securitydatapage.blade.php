@extends('layouts.admin')
@section('content')

<div class="container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.security')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('securityAdmin')}}">{{trans('home.security')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.edit_security')}}</li>
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

        {{--  hero section  --}}
        <div class="row">
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div>
                            <h3 class="card-title ">{{trans('home.hero-section')}}</h3>
                        </div>
                        @if(empty($herosection))
                            {!! Form::open(['method'=>'POST','route' => 'securityAdminadd', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                                <div class="row">
                                    <input class="form-control" name="name" type="hidden" value="heroSection">
                                    {{--  title  --}}
                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_en')}}</label>
                                        <input class="form-control" name="title_en" type="text" placeholder="{{trans('home.title_en')}}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_ar')}}</label>
                                        <input class="form-control" name="title_ar" type="text" placeholder="{{trans('home.title_ar')}}" required>
                                    </div>
                                    {{--  image  --}}
                                    <div class="col-md-12">
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
                                    {{--  description  --}}
                                    <div class="form-group col-md-6 ">
                                        <label for="text_en">{{trans('home.text_en')}}</label>
                                        <textarea class="form-control area1" name="descrption_en" placeholder="{{trans('home.text_en')}}" ></textarea>
                                    </div>

                                    <div class="form-group col-md-6 ">
                                        <label for="text_ar">{{trans('home.text_ar')}}</label>
                                        <textarea class="form-control area1" name="descrption_ar" placeholder="{{trans('home.text_ar')}}" ></textarea>
                                    </div>
                                    {{--  publish  --}}
                                    <div class="form-group col-md-12">
                                        <label class="ckbox">
                                            <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                        </label>
                                    </div>
                                    {{--  submit  --}}
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                        <a href="{{url('/admin/projects')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'POST','route' => 'securityAdminedit', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                                <div class="row">
                                    <input class="form-control" name="name" type="hidden" value="heroSection">
                                    <input class="form-control" name="dataid" type="hidden" value="{{ $herosection->id }}">
                                    {{--  title  --}}
                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_en')}}</label>
                                        <input class="form-control" name="title_en" type="text" placeholder="{{trans('home.title_en')}}"
                                        value="{{ $herosection->title_en }}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_ar')}}</label>
                                        <input class="form-control" name="title_ar" type="text" value="{{ $herosection->title_ar }}"
                                        placeholder="{{trans('home.title_ar')}}" required>
                                    </div>
                                    {{--  image  --}}
                                    <div class="col-md-12">
                                        <label>{{trans('home.image')}}</label>
                                        <span>
                                            <img src="{{ asset($herosection->image)}}" width="100px" alt="image" class="img-fluid">
                                        </span>
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> {{trans('home.upload')}}</span>
                                            </div>
                                            <div class="custom-file">
                                                <br>
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                            </div>
                                        </div>
                                    </div>
                                    {{--  description  --}}
                                    <div class="form-group col-md-6 ">
                                        <label for="text_en">{{trans('home.text_en')}}</label>
                                        <textarea class="form-control area1" name="descrption_en" placeholder="{{trans('home.text_en')}}" >
                                            {!! $herosection->descrption_en !!}
                                        </textarea>
                                    </div>

                                    <div class="form-group col-md-6 ">
                                        <label for="text_ar">{{trans('home.text_ar')}}</label>
                                        <textarea class="form-control area1" name="descrption_ar" placeholder="{{trans('home.text_ar')}}" >
                                            {!! $herosection->descrption_ar !!}
                                        </textarea>
                                    </div>
                                    {{--  publish  --}}
                                    @if ($herosection->status == 1)
                                        <div class="form-group col-md-12">
                                            <label class="ckbox">
                                                <input name="status" value="1" type="checkbox" checked><span class="tx-13">{{trans('home.publish')}}</span>
                                            </label>
                                        </div>
                                    @else
                                        <div class="form-group col-md-12">
                                            <label class="ckbox">
                                                <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                            </label>
                                        </div>

                                    @endif

                                    {{--  submit  --}}
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                        <a href="{{url('/admin/projects')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--  partener section  --}}
        <div class="row">
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div>
                            <h3 class="card-title ">{{trans('home.partener-section')}}</h3>
                        </div>
                        @if (empty($partenersection))
                            {!! Form::open(['method'=>'POST','route' => 'securityAdminadd', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                                <div class="row">
                                    <input class="form-control" name="name" type="hidden" value="partenerSection">
                                    {{--  title  --}}
                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_en')}}</label>
                                        <input class="form-control" name="title_en" type="text" placeholder="{{trans('home.title_en')}}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_ar')}}</label>
                                        <input class="form-control" name="title_ar" type="text" placeholder="{{trans('home.title_ar')}}" required>
                                    </div>
                                    {{--  image  --}}
                                    <div class="col-md-12">
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
                                    {{--  description  --}}
                                    <div class="form-group col-md-6 ">
                                        <label for="text_en">{{trans('home.text_en')}}</label>
                                        <textarea class="form-control area1" name="text_en" placeholder="{{trans('home.text_en')}}" ></textarea>
                                    </div>

                                    <div class="form-group col-md-6 ">
                                        <label for="text_ar">{{trans('home.text_ar')}}</label>
                                        <textarea class="form-control area1" name="text_ar" placeholder="{{trans('home.text_ar')}}" ></textarea>
                                    </div>
                                    {{--  publish  --}}
                                    <div class="form-group col-md-12">
                                        <label class="ckbox">
                                            <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                        </label>
                                    </div>
                                    {{--  submit  --}}
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                        <a href="{{url('/admin/projects')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'POST','route' => 'securityAdminedit', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                                <div class="row">
                                    <input class="form-control" name="name" type="hidden" value="partenerSection">
                                    <input class="form-control" name="dataid" type="hidden" value="{{ $partenersection->id }}">
                                    {{--  title  --}}
                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_en')}}</label>
                                        <input class="form-control" name="title_en" type="text" value="{{$partenersection->title_en}}"
                                        placeholder="{{trans('home.title_en')}}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_ar')}}</label>
                                        <input class="form-control" name="title_ar" type="text" value="{{ $partenersection->title_ar }}"
                                        placeholder="{{trans('home.title_ar')}}" required>
                                    </div>
                                    {{--  image  --}}
                                    <div class="col-md-12">
                                        <label>{{trans('home.image')}}</label>
                                        @php
                                            $images = \App\security::where('name','partenerSection')->get();
                                            $countimage = $images->count();
                                        @endphp
                                        @if ($images)
                                            @foreach ($images as $item )
                                                <img src="{{ $item->image }}" width="60px">
                                            @endforeach
                                        @endif
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"> {{trans('home.upload')}}</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image">
                                                <label class="custom-file-label" for="inputGroupFile01">{{trans('home.choose_image')}}</label>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <a href="{{route('createimage')}}"><button type="button" class="btn btn-success mr-1"><i class="icon-trash"></i> {{trans('home.addone-more')}}</button></a>
                                            @if ($countimage > 1)
                                                <a href="{{route('listimage')}}"><button type="button" class="btn btn-success mr-1"><i class="icon-trash"></i> {{trans('home.show')}}</button></a>
                                            @endif
                                        </div>
                                    </div>
                                    {{--  description  --}}
                                    <div class="form-group col-md-6 ">
                                        <label for="text_en">{{trans('home.text_en')}}</label>
                                        <textarea class="form-control area1" name="descrption_en" placeholder="{{trans('home.text_en')}}" >
                                            {!! $herosection->descrption_en !!}
                                        </textarea>
                                    </div>

                                    <div class="form-group col-md-6 ">
                                        <label for="text_ar">{{trans('home.text_ar')}}</label>
                                        <textarea class="form-control area1" name="descrption_ar" placeholder="{{trans('home.text_ar')}}" >
                                            {!! $herosection->descrption_ar !!}

                                        </textarea>
                                    </div>
                                    {{--  publish  --}}
                                    @if ($partenersection->status == 1)
                                        <div class="form-group col-md-12">
                                            <label class="ckbox">
                                                <input name="status" value="1" type="checkbox" checked><span class="tx-13">{{trans('home.publish')}}</span>
                                            </label>
                                        </div>
                                    @else
                                        <div class="form-group col-md-12">
                                            <label class="ckbox">
                                                <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                            </label>
                                        </div>

                                    @endif
                                    {{--  submit  --}}
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                        <a href="{{url('/admin/projects')}}"><button type="button" class="btn btn-danger mr-1"><i class="icon-trash"></i> {{trans('home.cancel')}}</button></a>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        {{--  Statistic section  --}}
        <div class="row">
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div>
                            <h3 class="card-title ">{{trans('home.statstic-section')}}</h3>
                        </div>
                            {!! Form::open(['method'=>'POST','route' => 'securityAdminadd', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                                <div class="row">
                                    <input class="form-control" name="name" type="hidden" value="statisticSection">
                                    {{--  title  --}}
                                    <div class="form-group col-md-4">
                                        <label class="">{{trans('home.title_en')}}</label>
                                        <input class="form-control" name="title_en" type="text" placeholder="{{trans('home.title_en')}}" required>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="">{{trans('home.title_ar')}}</label>
                                        <input class="form-control" name="title_ar" type="text" placeholder="{{trans('home.title_ar')}}" required>
                                    </div>
                                    {{--  Describtion number  --}}
                                    <div class="form-group col-md-4">
                                        <label class="">Number</label>
                                        <input class="form-control" name="descrption_en" type="text" placeholder="{{trans('home.descrption_en')}}" required>
                                    </div>

                                    {{--  publish  --}}
                                        <div class="form-group col-md-12">
                                            <label class="ckbox">
                                                <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                            </label>
                                        </div>

                                    {{--  submit  --}}
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                        <a href="{{route('showstatics')}}"><button type="button" class="btn btn-success mr-1">{{trans('home.show')}}</button></a>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        {{--  feature section  --}}
        <div class="row">
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div>
                            <h3 class="card-title ">{{trans('home.feature-section')}}</h3>
                        </div>
                        {!! Form::open(['method'=>'POST','route' => 'securityAdminadd', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                            <div class="row">
                                <input class="form-control" name="name" type="hidden" value="featureSection">
                                {{--  title  --}}
                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.title_en')}}</label>
                                    <input class="form-control" name="title_en" type="text" placeholder="{{trans('home.title_en')}}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="">{{trans('home.title_ar')}}</label>
                                    <input class="form-control" name="title_ar" type="text" placeholder="{{trans('home.title_ar')}}" required>
                                </div>
                                {{--  image  --}}
                                <div class="col-md-12">
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
                                {{--  description  --}}
                                <div class="form-group col-md-6 ">
                                    <label for="text_en">{{trans('home.text_en')}}</label>
                                    <textarea class="form-control area1" name="descrption_en" placeholder="{{trans('home.text_en')}}" ></textarea>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for="text_ar">{{trans('home.text_ar')}}</label>
                                    <textarea class="form-control area1" name="descrption_ar" placeholder="{{trans('home.text_ar')}}" ></textarea>
                                </div>
                                {{--  publish  --}}
                                <div class="form-group col-md-12">
                                    <label class="ckbox">
                                        <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                    </label>
                                </div>
                                {{--  submit  --}}
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                    <a href="{{route('showfeature')}}"><button type="button" class="btn btn-success mr-1"><i class="icon-trash"></i> {{trans('home.show-all')}}</button></a>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        {{--  goals section  --}}
        <div class="row">
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div>
                            <h3 class="card-title ">{{trans('home.goals-section')}}</h3>
                        </div>
                        @if (empty($titlegoal))
                            {!! Form::open(['method'=>'POST','route' => 'securityAdminadd', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                                <div class="row">
                                    <input class="form-control" name="name" type="hidden" value="goalsSection">
                                    {{--  title  --}}
                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_en')}}</label>
                                        <input class="form-control" name="title_en" type="text" placeholder="{{trans('home.title_en')}}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_ar')}}</label>
                                        <input class="form-control" name="title_ar" type="text" placeholder="{{trans('home.title_ar')}}" required>
                                    </div>
                                    {{--  publish  --}}
                                    <div class="form-group col-md-12">
                                        <label class="ckbox">
                                            <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                        </label>
                                    </div>
                                    {{--  submit  --}}
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'POST','route' => 'securityAdminedit', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                                <div class="row">
                                    <input class="form-control" name="name" type="hidden" value="goalsSection">
                                    <input class="form-control" name="dataid" type="hidden" value="{{ $titlegoal->id  }}">
                                    {{--  title  --}}
                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_en')}}</label>
                                        <input class="form-control" name="title_en" type="text" value="{{$titlegoal->title_en}}"
                                        placeholder="{{trans('home.title_en')}}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_ar')}}</label>
                                        <input class="form-control" name="title_ar" type="text" value="{{ $titlegoal->title_ar }}"
                                        placeholder="{{trans('home.title_ar')}}" required>
                                    </div>
                                    {{--  publish  --}}
                                    @if ($titlegoal->status == 1)
                                        <div class="form-group col-md-12">
                                            <label class="ckbox">
                                                <input name="status" value="1" type="checkbox" checked><span class="tx-13">{{trans('home.publish')}}</span>
                                            </label>
                                        </div>
                                    @else
                                        <div class="form-group col-md-12">
                                            <label class="ckbox">
                                                <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                            </label>
                                        </div>
                                    @endif
                                    {{--  submit  --}}
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                    </div>
                                </div>
                            {!! Form::close() !!}

                        @endif
                    </div>
                    <div class="card-body">
                        {!! Form::open(['method'=>'POST','route' => 'securityAdminadd', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                                <div class="row">
                                    <input class="form-control" name="name" type="hidden" value="statmentgoal">
                                    {{--  title  --}}
                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_en')}}</label>
                                        <input class="form-control" name="title_en" type="text" placeholder="{{trans('home.title_en')}}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_ar')}}</label>
                                        <input class="form-control" name="title_ar" type="text" placeholder="{{trans('home.title_ar')}}" required>
                                    </div>
                                    {{--  description  --}}
                                    <div class="form-group col-md-6 ">
                                        <label for="text_en">{{trans('home.text_en')}}</label>
                                        <textarea class="form-control area1" name="descrption_en" placeholder="{{trans('home.text_en')}}" ></textarea>
                                    </div>

                                    <div class="form-group col-md-6 ">
                                        <label for="text_ar">{{trans('home.text_ar')}}</label>
                                        <textarea class="form-control area1" name="descrption_ar" placeholder="{{trans('home.text_ar')}}" ></textarea>
                                    </div>
                                    {{--  publish  --}}
                                    <div class="form-group col-md-12">
                                        <label class="ckbox">
                                            <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                        </label>
                                    </div>
                                    {{--  submit  --}}
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                        <a href="{{route('listgoal')}}"><button type="button" class="btn btn-success mr-1"><i class="icon-trash"></i> {{trans('home.showgoal')}}</button></a>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        {{--  last section  --}}
        <div class="row">
            <div class="col-sm-12 col-xl-12 col-lg-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body">
                        <div>
                            <h3 class="card-title ">{{trans('home.last-section')}}</h3>
                        </div>
                            {!! Form::open(['method'=>'POST','route' => 'securityAdminadd', 'data-toggle'=>'validator', 'files'=>'true']) !!}
                                <div class="row">
                                    <input class="form-control" name="name" type="hidden" value="lastSection">
                                    {{--  title  --}}
                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_en')}}</label>
                                        <input class="form-control" name="title_en" type="text" placeholder="{{trans('home.title_en')}}" required>
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="">{{trans('home.title_ar')}}</label>
                                        <input class="form-control" name="title_ar" type="text" placeholder="{{trans('home.title_ar')}}" required>
                                    </div>
                                    {{--  description  --}}
                                    <div class="form-group col-md-6 ">
                                        <label for="text_en">{{trans('home.text_en')}}</label>
                                        <textarea class="form-control area1" name="descrption_en" placeholder="{{trans('home.text_en')}}" ></textarea>
                                    </div>

                                    <div class="form-group col-md-6 ">
                                        <label for="text_ar">{{trans('home.text_ar')}}</label>
                                        <textarea class="form-control area1" name="descrption_ar" placeholder="{{trans('home.text_ar')}}" ></textarea>
                                    </div>
                                    {{--  publish  --}}
                                    <div class="form-group col-md-12">
                                        <label class="ckbox">
                                            <input name="status" value="1" type="checkbox"><span class="tx-13">{{trans('home.publish')}}</span>
                                        </label>
                                    </div>
                                    {{--  submit  --}}
                                    <div class="form-group col-md-12">
                                        <button type="submit" class="btn btn-success"><i class="icon-note"></i> {{trans('home.save')}} </button>
                                        <a href="{{route('lastsection')}}"><button type="button" class="btn btn-success mr-1">{{trans('show all')}}</button></a>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</div>

@endsection
