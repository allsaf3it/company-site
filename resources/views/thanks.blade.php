@extends('layouts.app')
@section('meta')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous'/>
<style>
.checkmark {
    color: #9ABC66;
    font-size: 120px;
}
.checkbg{
    display: flex;
    align-items: center;
    justify-content: center;
}
.m-c{
    margin: 0 auto
}
.thanks-contents {
    width: 100%;
    margin: auto;
    /* box-shadow: 0px 0px 30px 0 #8080804d; */
    padding: 15px;
    border-radius: 15px;
    display: flex;
    flex-direction: column-reverse;
    align-items: center;
}
.title {
    font-weight:bold;
    font-size: 45px;
    line-height: 1.1;
    letter-spacing: 1px;
}
.p {
    font-size: 25px;
    line-height: 1;
    letter-spacing: 0px;
    margin: 20px 0;
}
.checkbg {
    border-radius:200px; 
    height:100px;
    width:100px; 
    /* background: #77b149;  */
    margin:0 auto;
}
.checkmark {
    color:#fff;
    font-size: 60px;
    margin-right:10px;
}
</style>
@endsection
@section('controller')
    <div class="cb-view" data-controller="aboutController" id="view-main"><canvas class="cb-scene"></canvas>
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
            <div class="cb-navbar-grid-col -center">
                <div class="cb-navbar-toggle"><button class="cb-btn cb-btn_menu" aria-label="menu"><span
                            class="cb-btn_menu-title">{{trans('home.menu')}}</span><span class="cb-btn_menu-box"
                            style="visibility:hidden"><span></span><span></span></span></button></div>
            </div>
        </div>
    </div>
</div>
<header class="cb-tophead">
    <div class="cb-tophead-content">
        <div class="cb-tophead-container">
        <div class="thanks-contents">
                <div class="checkbg">
                    <img class="w-100 h-100" src="{{asset('/public/assets/yes-png-39568.png')}}" alt="">
                </div>
                <div class="cb-tophead-title -lg" style="text-align: center;width: 50%;/* margin-bottom: 20px; */">
                    <h1 class="title font-bold">Thank You!</h1>
                    <p class="p">We have received  <span class="text-success">Your Message</span>  and one of our team experts will contact you within 24 hours.</p>
                </div>
            </div>
        </div>
    </div>
</header>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js' integrity='sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==' crossorigin='anonymous'></script>
@endsection
