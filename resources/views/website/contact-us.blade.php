@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp

    @php echo $schema @endphp
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous'/>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .spanActive {
            background-color: black !important;
            /* color:#fff !important; */
        }
        .text-danger {
            font-size: 20px;
    margin-top: 20px;
    display: block;
    color: red;
    font-weight: bold;
        }
        .errorMessage {
            padding: 12px;
    background: #ed6666;
    color: #181818;
    border-radius: 20px;
        }
        ::placeholder {
            color:red;
        }
        .text-danger {
            color:#f67985 !important;
        }
    </style>

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
                    <h1><div class='text-center'>{{trans('home.Hey! Tell us all')}}</div><br> <div class='text-center'>{{trans('home.the things')}}<img src="{{url('resources/assets/front/img/emoji/lg/1F44B.png')}}"
                            srcset="{{url('resources/assets/front/img/emoji/lg/1F44B@2x.png 2x')}}" alt></div> </h1>
                </div>
                <div class="cb-request-form mx-auto">
                    <form class="cb-form" style="box-shadow:0 0rem 3rem rgba(0, 0, 0, 0.15); padding:60px; border-radius: 50px;"" action="{{LaravelLocalization::localizeUrl('save/contact-us')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="cb-form-group text-center">
                            <div class="cb-form-label -smooth">{{trans("home.I'm interested in...")}}</div>
                            <div class="cb-checkbox-group">
                                @foreach($services as $serv)
                                    <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                                type="checkbox" name="service[]" value="{{$serv->name_service_en }}"><span
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
                        </div>
                        <div class="row">                 
                            <div class="col-md-6">
                                <div class="cb-form-group text-center">
                                    <div class="cb-input cb-input_light"
                                        data-validity-msg='{"valueMissing":"Please fill your name"}'>
                                        <div class="cb-input_light-box"><input type="text" name="name"
                                                placeholder="{{trans('home.Your name')}}" value="{{ old('name') }}"  aria-label="Your name">
                                                @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror 
                                            <div class="cb-input_light-line"></div>
                                        </div>
                                        <div class="cb-input_light-message"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="cb-form-group">
                                    <div class="cb-input cb-input_light"
                                        data-validity-msg='{"valueMissing":"Please fill your email address","typeMismatch":"That email address looks a bit weird"}'>
                                        <div class="cb-input_light-box"><input type="email" name="email"
                                                placeholder="{{trans('home.Your email')}}"  aria-label="Your email">
                                                @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror 
                                            <div class="cb-input_light-line"></div>
                                        </div>
                                        <div class="cb-input_light-message"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="cb-form-group">
                                    <div class="cb-input cb-input_light">
                                        <div class="cb-input_light-box"><textarea name="message"
                                                placeholder="{{trans('home.Tell us about your project')}}"
                                                aria-label="Tell us about your project" >{{ old('message') }}</textarea>
                                                @error('message')
                                                    <span class="text-danger">{{$message}}</span>
                                                @enderror 
                                            <div class="cb-input_light-line"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="cb-form-group">
                        
                            <div class="cb-form-label -smooth">{{trans('home.Project budget (USD)')}}</div>
                            <div class="cb-checkbox-group">
                                <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                            type="radio" name="budget" value="10-20k" ><span
                                            class="cb-checkbox_rounded-box"><span
                                                class="cb-checkbox_rounded-title"><span
                                                    data-text="10-20k">10-20k</span></span><span
                                                class="cb-checkbox_rounded-ripple {{ old('budget') ==  '10-20k' ? 'spanActive' : ''}}"><span></span></span></span></label>
                                </div>
                                <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                            type="radio" name="budget" value="30-40k"><span
                                            class="cb-checkbox_rounded-box"><span
                                                class="cb-checkbox_rounded-title"><span
                                                    data-text="30-40k">30-40k</span></span><span
                                                class="cb-checkbox_rounded-ripple {{ old('budget') ==  '30-40k' ? 'spanActive' : ''}}"><span></span></span></span></label>
                                </div>
                                <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                            type="radio" name="budget" value="40-50k"><span
                                            class="cb-checkbox_rounded-box"><span
                                                class="cb-checkbox_rounded-title"><span
                                                    data-text="40-50k">40-50k</span></span><span
                                                class="cb-checkbox_rounded-ripple {{ old('budget') ==  '40-50k' ? 'spanActive' : ''}}"><span></span></span></span></label>
                                </div>
                                <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                            type="radio" name="budget" value="50-100k"><span
                                            class="cb-checkbox_rounded-box"><span
                                                class="cb-checkbox_rounded-title"><span
                                                    data-text="50-100k">50-100k</span></span><span
                                                class="cb-checkbox_rounded-ripple {{ old('budget') ==  '50-100k' ? 'spanActive' : ''}}"><span></span></span></span></label>
                                </div>
                                <div class="cb-checkbox cb-checkbox_rounded" data-magnetic><label><input
                                            type="radio" name="budget" value="more100k"><span
                                            class="cb-checkbox_rounded-box"><span
                                                class="cb-checkbox_rounded-title"><span data-text="&gt; 100k">>
                                                    100k</span></span><span
                                                class="cb-checkbox_rounded-ripple {{ old('budget') ==  '>100k' ? 'spanActive' : ''}}"><span></span></span></span></label>
                                </div>
                            </div>
                                @error('budget')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror 
                        </div>
                        
                        <div class="col-md-6">
                                <div class="cb-form-group">
                                <div class="cb-input cb-input_file"
                                    data-validity="{&quot;size&quot;:26214400,&quot;limit&quot;:10}"
                                    data-validity-msg='{"size":"Size limit has been exceeded (25 mb)","limit":"Attach up to 10 files"}'>
                                    <input type="file" name="attachments" accept="application/pdf">
                                    <button class="cb-input_file-btn"  type="button">
                                        <svg
                                            class="cb-svgsprite -attachment">
                                            <use xlink:href="{{url('resources/assets/front/img/sprites/svgsprites.svg?2#attachment')}}">
                                            </use>
                                        </svg>
                                        <span>{{trans('home.Add attachment')}}</span>
                                    </button>
                                    <span class="d-block mt-2 text-gray">The File Should be PDF</span>
                                    @error('attachments')
                                        <span class='text-danger' data-validity="{&quot;size&quot;:26214400,&quot;limit&quot;:10}" data-validity-msg='{"size":"Size limit has been exceeded (25 mb)","limit":"Attach up to 10 files"}'>{{$message}}</span>
                                    @enderror
                                    <div class="cb-input_file-items"></div>
                                    <div class="cb-input_file-message"></div>
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
    <script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('.cb-form');
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="service[]"]');
    const textInputs = document.querySelectorAll('input[type="text"], input[type="email"], textarea');
    const radios = document.querySelectorAll('input[type="radio"][name="budget"]');
    const fileInput = document.querySelector('input[type="file"][name="attachments"]');

    form.addEventListener('submit', (e) => {
        let isValid = true;

        const showError = (element, message) => {
            const errorMessage = document.createElement('span');
            errorMessage.className = 'text-danger';
            errorMessage.textContent = message;
            element.closest('.cb-form-group').appendChild(errorMessage);
        };

        const clearErrors = () => {
            document.querySelectorAll('.text-danger').forEach(el => el.remove());
        };

        clearErrors();

        const isChecked = Array.from(checkboxes).some(checkbox => checkbox.checked);
        if (!isChecked) {
            isValid = false;
            showError(checkboxes[0], 'Please select at least one service.');
        }

        textInputs.forEach(input => {
            if (!input.value.trim()) {
                isValid = false;
                showError(input, `Please fill in your ${input.name}.`);
            }
        });

        const isRadioChecked = Array.from(radios).some(radio => radio.checked);
        if (!isRadioChecked) {
            isValid = false;
            showError(radios[0], 'Please select a project budget.');
        }

        if (fileInput.files.length === 0 || fileInput.files[0].type !== "application/pdf") {
            isValid = false;
            showError(fileInput, 'Please upload a PDF file.');
        }

        if (!isValid) {
            e.preventDefault();
            Swal.fire({
                title: "Form Incomplete",
                text: "Please fill in all required fields before submitting.",
                icon: "warning",
                confirmButtonText: "OK"
            });
        }
    });

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            clearErrors();
        });
    });

    textInputs.forEach(input => {
        input.addEventListener('input', () => {
            clearErrors();
        });
    });

    radios.forEach(radio => {
        radio.addEventListener('change', () => {
            clearErrors();
        });
    });

    fileInput.addEventListener('change', () => {
        clearErrors();
    });
});



    </script>
    @if(session()->has('contact_message'))
        <script>

            Swal.fire({
            title: "Done",
            text: "{{session()->get('contact_message')}}",
            icon: "success"
            });
            
        </script>
    @endif

    @php
        Session::forget('contact_message')
    @endphp
@endsection