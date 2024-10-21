@extends('dashboard.layouts.app')
@section('meta')
@endsection
@section('main')
    <section class="section">
    @include('dashboard.alerts.alert')

        @if(count($mediumTerm) > 0)
            <!-- start -->
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1">
                                    <h1 class="card-title fs-36 mb-0">{{trans('home.Medium Term')}}</h1>
                                </div>
                                <div class="flex-shrink-0">
                                    <ul class="list-inline card-toolbar-menu d-flex align-items-center mb-0">
                                        <li class="list-inline-item">
                                            <a class="align-middle minimize-card" data-bs-toggle="collapse" href="#collapseexample1" role="button" aria-expanded="false" aria-controls="collapseExample2">
                                                <i class="mdi mdi-plus align-middle plus"></i>
                                                <i class="mdi mdi-minus align-middle minus"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body collapse show" id="collapseexample1">
                            <div class="d-flex">
                                <div class="flex-grow-1 ms-2 text-muted">
                                    <p>
                                        {!! $configration->{'medium_term_' . $lang} !!}
                                    </p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
            </div><!-- end row -->
            <div class="row mt-lg-5 mt-md-3 mt-sm-3 mt-3">
                <div class="col-12 mb-3">
                    <div class="card-body">
                        <div class="d-flex">
                            <form class="col-12 mb-3" method="get" action="{{LaravelLocalization::localizeUrl('dashboard/search-medium-term')}}">
                                <div class="search-box flex-grow-1">
                                    <input type="text" class="form-control" id="searchResultList" autocomplete="off" name="search_input" placeholder="{{trans('home.Search for ...')}}">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @foreach($mediumTerm as $mediumTermItem)
                    <div class="col-xxl-4 col-xl-6">
                        <!-- card -->
                        <div class="card card-height-100">
                            <!-- card body -->
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 ms-3">
                                        <h3 class="text-uppercase fw-medium text-white mb-3">{{$mediumTermItem->ticker}}</h3>
                                        <!-- <p class="text-capitalize fw-medium text-white-75 mb-2 fs-13">Price Now</p>
                                        <h4 class="fs-4 mb-1 text-white"><span class="counter-value" data-target="464,007">0</span></h4> -->
                                        <h4 class="text-capitalize fw-medium mb-1 fs-14">{{$mediumTermItem->updated_at}}</h4>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title text-white rounded-2 fs-2">
                                            <img src="{{asset('uploads/configration/'. $configration->fav_icon)}}" alt="">
                                        </span>
                                    </div>
                                </div>

                                <div class="px-2 py-2 mt-1">
                                    <p class="mb-1">{{trans('home.Ponit 1')}} <span class="float-end {{($mediumTermItem->point_1 >= 0) ? 'text-success' : 'text-danger-emphasis' }}">{{$mediumTermItem->point_1}}</span></p>
                                    <div class="progress mt-2" style="height: 6px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75"></div>
                                    </div>

                                    <p class="mt-3 mb-1">{{trans('home.Ponit 2')}} <span class="float-end {{($mediumTermItem->point_2 >= 0) ? 'text-success' : 'text-danger-emphasis' }}">{{$mediumTermItem->point_2}}</span></p>
                                    <div class="progress mt-2" style="height: 6px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 47%" aria-valuenow="47" aria-valuemin="0" aria-valuemax="47"></div>
                                    </div>

                                    <p class="mt-3 mb-1">{{trans('home.Ponit 3')}} <span class="float-end {{($mediumTermItem->point_3 >= 0) ? 'text-success' : 'text-danger-emphasis' }}">{{$mediumTermItem->point_3}}</span></p>
                                    <div class="progress mt-2" style="height: 6px;">
                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="82"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                @endforeach
                {{ $mediumTerm->links() }}
                <!-- end col -->
            </div><!-- end row -->
        @else
            <div class="row">
                <p style="text-align: center; font-weight: bold; font-size:20px; margin:auto; color: #fff">{{trans('home.no_data_in_this_page')}}</p>
            </div>
        @endif
    <section>
@endsection
