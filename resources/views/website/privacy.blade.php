@extends('layouts.app')
@section('meta')
    <title>{{trans('home.privacy')}}</title>
@endsection
@section('controller')
    <div class="cb-view" data-controller="projectController" id="view-main"><canvas class="cb-scene"></canvas>
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
    <header class="cb-tophead">
        <div class="cb-tophead-content">
            <div class="cb-tophead-container">
                <div class="cb-tophead-header">
                    <h1>{{$configration->app_name}}</h1>
                </div>
                <div class="cb-tophead-title">
                    <h2>{{$configration->privacy_title}}</h2>
                </div>
            </div>
        </div>
    </header>
    <section class="">
        <div class="">
            <div class="cb-description-container">
                {!! $configration->privacy_text !!}
            </div>
        </div>
    </section>
@endsection    