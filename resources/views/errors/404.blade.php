@extends('layouts.app') 
    <title>404</title>
@section('content')
<section id="errors">
     <div class="text-center">
        <img src="{{url('resources/assets/front/images/404.png')}}" width="800px" height="800px"/>
    </div>
    <div class="text-center">
        <a href="{{url('/')}}" class="btn main-btn" >{{trans('home.go_home')}}</a>
    </div>
    
</section>
@endsection