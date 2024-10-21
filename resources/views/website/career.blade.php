@extends('layouts.app')
@section('meta')
    <title>{{$configration->app_name}}</title>
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
@endsection
@section('controller')
    <div class="cb-view" data-controller="contactsController" id="view-main"><canvas class="cb-scene"></canvas>
@endsection

@section('content')
    <div class="cb-navbar">
        <div class="cb-navbar-strip">
            <div class="cb-navbar-grid">
                <div class="cb-navbar-grid-col -left">
                    <div class="cb-navbar-logo">
                        <a href="{{LaravelLocalization::localizeUrl('/')}}" aria-label="All Safe">
                            <img src="{{url('uploads/settings/source/'.$configration->app_logo)}}" alt="Logo">
                        </a>
                    </div>
                </div>
                <div class="cb-navbar-grid-col -right">
                    <div class="cb-navbar-toggle"><button class="cb-btn cb-btn_menu" aria-label="menu"><span
                                class="cb-btn_menu-title">{{trans('home.menu')}}</span><span class="cb-btn_menu-box"
                                style="visibility:hidden"><span></span><span></span></span></button></div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact -->
    <header class="cb-request">
        <div class="cb-request-content">
            <div class="cb-request-container">
                <div class="cb-request-header">
                    <h1>{{trans('home.Hey! Be one of')}}<br> {{trans('home.our community')}} <img src="{{url('resources/assets/front/img/emoji/lg/1F44B.png')}}"
                            srcset="{{url('resources/assets/front/img/emoji/lg/1F44B@2x.png 2x')}}" alt></h1>
                </div>
                @if(session()->has('success'))
                <div class="cb-request-header">
                    <h3 style="text-align: center;margin: 90px 0px;color: #25ad30;font-size: 40px;">{{ session()->get('success') }}</h3>
                </div>
                @endif
                <div class="cb-request-form">
                    <form class="cb-form" action="{{LaravelLocalization::localizeUrl('save/career')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="cb-form-group">
                            <div class="cb-form-label -smooth">{{trans('home.Get your job now in All Safe...')}}</div>
                            <div class="cb-checkbox-group">
                                @foreach($jobs as $job)
                                    <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                type="radio" name="job[]" @if($job->status != 1) disabled readonly  @endif value="{{$job->position_en}}"><span
                                                class="cb-checkbox_rounded-box"><span
                                                    class="cb-checkbox_rounded-title"><span
                                                        data-text="{{app()->getLocale() == 'en' ? $job->position_en : $job->position_ar}}">{{app()->getLocale() == 'en' ? $job->position_en : $job->position_ar}}
                                                        </span></span><span
                                                    class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                    </div>
                                @endforeach
                            </div>
                            
                            {{--
                            <div class="cb-checkbox-group">
                                @foreach($services as $serv)
                                    <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                type="radio" name="service[]" value="{{$serv->name_service_en}}"><span
                                                class="cb-checkbox_rounded-box"><span
                                                    class="cb-checkbox_rounded-title"><span
                                                        data-text="{{app()->getLocale() == 'en' ? $serv->name_service_en : $serv->name_service_ar}}">{{app()->getLocale() == 'en' ? $serv->name_service_en : $serv->name_service_ar}}
                                                        </span></span><span
                                                    class="cb-checkbox_rounded-ripple"><span></span></span></span></label>
                                    </div>
                                @endforeach
                                @error('service')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            --}}
                        </div>
                        <div class="cb-form-group">
                            <div class="cb-input cb-input_light"
                                data-validity-msg='{"valueMissing":"Please fill your name"}'>
                                <div class="cb-input_light-box"><input type="text" name="name"
                                        placeholder="{{trans('home.Your name')}}" required aria-label="Your name">
                                    <div class="cb-input_light-line"></div>
                                </div>
                                @error('name')
                                    <div class="cb-input_light-message">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="cb-form-group">
                            <div class="cb-input cb-input_light"
                                data-validity-msg='{"valueMissing":"Please fill your Phone"}'>
                                <div class="cb-input_light-box"><input type="number" name="phone"
                                        placeholder="{{trans('home.Your Phone')}}" required aria-label="Your Phone">
                                    <div class="cb-input_light-line"></div>
                                </div>
                                @error('phone')
                                    <div class="cb-input_light-message">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="cb-form-group">
                            <div class="cb-input cb-input_light"
                                data-validity-msg='{"valueMissing":"Please fill your email address","typeMismatch":"That email address looks a bit weird"}'>
                                <div class="cb-input_light-box"><input type="email" name="email"
                                        placeholder="{{trans('home.Your email')}}" required aria-label="Your email">
                                    <div class="cb-input_light-line"></div>
                                </div>
                                @error('email')
                                    <div class="cb-input_light-message">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="cb-form-group">
                            <div class="cb-input cb-input_light"
                                data-validity-msg='{"valueMissing":"Please fill your email address","typeMismatch":"That Expected Salary looks a bit weird"}'>
                                <div class="cb-input_light-box"><input type="number" name="exp_salary"
                                        placeholder="{{trans('home.exp_salary')}}" required aria-label="exp_salary">
                                    <div class="cb-input_light-line"></div>
                                </div>
                                @error('exp_salary')
                                    <div class="cb-input_light-message">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="cb-form-group">
                            <div class="cb-input cb-input_light">
                                <div class="cb-input_light-box"><textarea name="message"
                                        placeholder="{{trans('home.Years Of Experince')}}"
                                        aria-label="Years Of Experince"></textarea>
                                    <div class="cb-input_light-line"></div>
                                </div>
                            </div>
                        </div>
                        <div class="cb-form-group">
                            <div class="cb-input cb-input_file"
                                data-validity="{&quot;size&quot;:26214400,&quot;limit&quot;:10}"
                                data-validity-msg='{"size":"Size limit has been exceeded (25 mb)","limit":"Attach up to 10 files"}'>
                                <input type="file" name="cv" multiple>
                                <button class="cb-input_file-btn" type="button">
                                    <svg class="cb-svgsprite -attachment">
                                        <use xlink:href="{{url('resources/assets/front/img/sprites/svgsprites.svg?2#attachment')}}"></use>
                                    </svg>
                                    <span>{{trans('home.Upload your CV')}}</span>
                                </button>
                                <div class="cb-input_file-items"></div>
                                <div class="cb-input_file-message">
                                    @error('cv')
                                    <span class='text-danger' data-validity="{&quot;size&quot;:26214400,&quot;limit&quot;:10}" data-validity-msg='{"size":"Size limit has been exceeded (25 mb)","limit":"Attach up to 10 files"}'>{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="cb-form-submit"><button class="cb-btn cb-btn_send" type="submit"
                                data-magnetic data-cursor="-opaque"><span data-text="{{trans('home.send_request')}}">{{trans('home.send_request')}}
                                    </span></button></div>
                                    
                        <div class="cb-form-terms">{{trans('home.This site is protected by reCAPTCHA and the Google')}} <a
                                href="https://policies.google.com/privacy" target="_blank">{{trans('home.Privacy Policy')}}</a>
                            <a href="https://policies.google.com/terms" target="_blank">{{trans('home.Terms of Service')}}</a>
                            {{trans('home.andApply')}}</div>
                    </form>
                </div>
            </div>
        </div>
    </header>

@endsection

@section('script')
    <script src="{{url('resources/assets/front/js/new.js')}}"></script>
    <noscript>  
        <link rel="stylesheet" href="{{url('resources/assets/front/css/noscript.css')}}">
    </noscript>
    
    @if(Session::has('contact_message'))
        <script>
            $.alert({
                title: "{{trans('home.contact_us')}}",
                content: "{{Session::get('contact_message')}}",
                buttons: {
                    ok: {
                        text: "{{trans('home.OK')}}",
                        btnClass: 'btn main-btn',
                    },
                },
                columnClass: 'col-md-6'
            });
        </script>
    @endif
    @php
        Session::forget('contact_message')
    @endphp
@endsection