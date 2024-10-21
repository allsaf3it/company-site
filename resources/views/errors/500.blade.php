@extends('layouts.app') 
<title>500</title>
@section('content')
<section id="errors">
     <div class="text-center">
        <img src="{{url('resources/assets/front/images/error500.png')}}" height="800px" width="600px"/>
        <p></p>
    </div>
    <div class="text-center">
        <a href="{{url('/')}}" class="btn main-btn" >{{trans('home.go_home')}}</a>
        <p></p>
    </div>
</section>
@endsection