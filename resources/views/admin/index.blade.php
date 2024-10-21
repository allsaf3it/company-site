@extends('layouts.admin')
@section('content')

<div class="container-fluid">

    <!-- Page Header -->
    <div class="page-header">
        <div>
            <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.WelcomeToAdminPanel')}}</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{trans('home.index')}}</li>
            </ol>
        </div>
    </div>
    <!-- End Page Header -->

    <!-- Row-->
    <div class="row">
        <div class="col-sm-12 col-xl-12 col-lg-12">
            <div class="card custom-card">
                <div class="card-body">
                    <div>
                        <h6 class="card-title mb-1">{{$configration->app_name}} {{trans('home.statistcs')}}</h6>
                        <p class="text-muted card-sub-title">{{trans('home.general_statistcs_of')}} {{$configration->app_name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- End Row -->

    <!-- Row -->
    <div class="row">
		<div class="col-sm-6 col-md-6 col-xl-3">
			<div class="card custom-card">
				<div class="card-body text-center">
					<div class="icon-service bg-primary-transparent rounded-circle text-primary">
						<i class="fe fe-user"></i>
					</div>
					<p class="mb-1 text-muted">{{trans('home.Total Users')}}</p>
					<h3 class="mb-0">{{$users}}</h3>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-xl-3">
			<div class="card custom-card">
				<div class="card-body text-center">
					<div class="icon-service bg-secondary-transparent rounded-circle text-secondary">
						<i class="fas fa-envelope-open-text"></i>
					</div>
					<p class="mb-1 text-muted">{{trans('home.Total messages')}}</p>
					<h3 class="mb-0">{{$messages}}</h3>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-xl-3">
			<div class="card custom-card">
				<div class="card-body text-center">
					<div class="icon-service bg-info-transparent rounded-circle text-info">
						<i class="fas fa-wrench"></i>
					</div>
					<p class="mb-1 text-muted">{{trans('home.Total Services')}}</p>
					<h3 class="mb-0">{{$services}}</h3>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-xl-3">
			<div class="card custom-card">
				<div class="card-body text-center">
					<div class="icon-service bg-success-transparent rounded-circle text-success">
						<i class="fas fa-project-diagram"></i>
					</div>
					<p class="mb-1 text-muted">{{trans('home.Total Projects')}}</p>
					<h3 class="mb-0">{{$projects}}</h3>
				</div>
			</div>
		</div>
	</div>
    <!--End  Row -->
    
    <!-- Row -->
    <div class="row">
		<div class="col-sm-6 col-md-6 col-xl-3">
			<div class="card custom-card">
				<div class="card-body text-center">
					<div class="icon-service bg-primary-transparent rounded-circle text-primary">
						<i class="fas fa-sitemap"></i>
					</div>
					<p class="mb-1 text-muted">{{trans('home.Total Courses')}}</p>
					<h3 class="mb-0">{{$courses}}</h3>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-xl-3">
			<div class="card custom-card">
				<div class="card-body text-center">
					<div class="icon-service bg-secondary-transparent rounded-circle text-secondary">
						<i class="fab fa-blogger"></i>
					</div>
					<p class="mb-1 text-muted">{{trans('home.Total Inspiros')}}</p>
					<h3 class="mb-0">{{$inspiros}}</h3>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-xl-3">
			<div class="card custom-card">
				<div class="card-body text-center">
					<div class="icon-service bg-info-transparent rounded-circle text-info">
						<i class="fas fa-images"></i>
					</div>
					<p class="mb-1 text-muted">{{trans('home.Total Testimonials')}}</p>
					<h3 class="mb-0">{{$testimonials}}</h3>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-6 col-xl-3">
			<div class="card custom-card">
				<div class="card-body text-center">
					<div class="icon-service bg-success-transparent rounded-circle text-success">
						<i class="fas fa-copyright"></i>
					</div>
					<p class="mb-1 text-muted">{{trans('home.Total Brands')}}</p>
					<h3 class="mb-0">{{$brands}}</h3>
				</div>
			</div>
		</div>
	</div>
    <!--End  Row -->
</div>
@endsection
