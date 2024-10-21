@extends('layouts.admin')
@section('meta')
    <title>{{trans('home.career')}}</title>
@endsection
@section('content')

<div class="container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h2 class="main-content-title tx-24 mg-b-5">{{trans('home.careers')}}</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{url('/admin')}}">{{trans('home.admin')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{url('admin/countries')}}">{{trans('home.careers')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{trans('home.details')}}</li>
                </ol>
            </div>
        </div>
        <!-- End Page Header -->

        <!-- Row-->
        <div class="row">

            <div class="ol-sm-12 col-xl-12 col-lg-12">
				<div class="card custom-card">
					<div class="">
						<div class="main-content-body main-content-body-contacts">
							<div class="main-contact-info-header pt-3">
								<div class="media">
									<div class="main-img-user">
										<img alt="avatar" src="{{ empty($career->image) ? url('resources/assets/back/img/users/1.jpg') : url('uploads/careers/image/' . $career->image) }}">
									</div>
									<div class="media-body">
										<h4>{{$career->name}}</h4>
									</div>
								</div>
							</div>
							<div class="main-contact-info-body">
								<div>
									<h6>{{trans('home.Years Experience')}}</h6>
									<p>{{$career->message}}</p>
								</div>
								<div class="media-list">
									<div class="media">
										<div class="media-body">
											<div>
												<label>{{trans('home.name')}}</label> <span class="tx-medium">{{$career->name}}</span>
											</div>
											<div>
												<label>{{trans('home.email')}}</label> <span class="tx-medium">{{$career->email}}</span>
											</div>
											<div>
												<label>{{trans('home.phone')}}</label> <span class="tx-medium">{{$career->phone}}</span>
											</div>


										</div>
									</div>
								</div>
								<div class="media-list">
									<div class="media">
										<div class="media-body">
										    <div>
												<label>{{trans('home.jobs')}}</label> <span class="tx-medium">{{$career->job}}</span>
											</div>
										    <div>
												<label>{{trans('home.exp_salary')}}</label> <span class="tx-medium">{{$career->exp_salary}}</span>
											</div>
											<div>
												<label>{{trans('home.Years Experience')}}</label> <span class="tx-medium">{{$career->message}}</span>
											</div>
										</div>
									</div>
								</div>
								<div style="height:800px;">
								    <object data="{{url('uploads/careers/pdf/'.$career->cv)}}" type="application/pdf" width="100%" height="100%">
                                        <p>Alternative text - include a link <a href="myfile.pdf">to the PDF!</a></p>
                                    </object>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
        <!-- End Row -->
    </div>

@endsection
