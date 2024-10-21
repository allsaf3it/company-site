@extends('layouts.app')
@section('meta')
    @php echo $metatags @endphp

    @php echo $schema @endphp
@endsection

@section('content')
<section class="page-title" style="background-image:url({{url('resources/assets/front/images/background/10.webp')}});">
    <div class="auto-container">
        <div class="inner-container clearfix step-flex">
            <div class="title-box">
                <h1>{{trans('home.book_now')}}</h1>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{LaravelLocalization::localizeUrl('/')}}">{{trans('home.home')}}</a></li>
                <li>{{trans('home.book_now')}}</li>
            </ul>
        </div>
    </div>
</section>

<div class="appointment">
    <div class="container">
        <div class="service-appointment-form" data-aos="zoom-in" data-aos-duration="1500">
            <div class="form-heading">
                <p>{{trans('home.book_now')}}</p>
            </div>
             @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form id="sendMessageForm1" action="{{url('save/contact-us')}}" method="POST">
               
                @csrf
                <div id="mresultmessageData1"></div>
                
                <div class="form-div">
                    <input type="text" name="name"  placeholder="{{trans('home.name')}}" value="{{old('name')}}" required>
                    <label for="name">
                        <i class="ion-ios-personadd-outline"></i>
                    </label>
                </div>
                <div class="form-div">
                    <input type="email" name="email"  id="email"  placeholder="{{trans('home.email')}}" value="{{old('email')}}" required>
                    <label for="email">
                        <i class="ion-ios-email-outline"></i>
                    </label>
                </div>
                <div class="form-div">
                    <input type="text" name="phone"   placeholder="{{trans('home.phone')}}" value="{{old('phone')}}" required>
                    <label for="phone">
                        <i class="ion-ios-telephone-outline"></i>
                    </label>
                </div>

                <div class="form-div">
                    <textarea name="message" id="message" cols="40" rows="10"   placeholder="{{trans('home.message')}}" required>{{old('message')}}</textarea>
                </div>
                <input type="hidden" name="action" value="addsentappointmentdata">
                <div class="form-div submit-div">
                    <button type="submit" class="sentmessage1">
                        <i class="ion-ios-paperplane"></i>
                        <span>
                            {{trans('home.book_now')}}
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('script')

    <script src="https://www.google.com/recaptcha/api.js?render={{ config('services.recaptcha.sitekey') }}"></script>
    <script>
         grecaptcha.ready(function() {
             grecaptcha.execute('{{ config('services.recaptcha.sitekey') }}', {action: 'contact'}).then(function(token) {
                if (token) {
                  document.getElementById('recaptcha').value = token;
                }
             });
         });
    </script>

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