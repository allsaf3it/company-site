@extends('dashboard.layouts.app')
@section('meta')

@endsection
@section('main')

    <!-- start -->
    <div class="section">   
    @include('dashboard.alerts.alert')
                    
        <div class="row">
            <div class="col-lg-12">
                <div class="card overflow-hidden">
                    <h1>{{trans('home.terms_and_conditions')}}</h1>
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
        @if(count($faqs) > 0)
            <div class="row">
                <!--end col-->
                <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div>
                        <div class="mb-3">
                            <h5 class="fs-16 mb-0 fw-semibold">{{trans('home.General Questions')}}</h5>
                        </div>
    
                        <div class="accordion accordion-border-box" id="genques-accordion">
                            @foreach($faqs as $key=>$faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="genques-heading{{$key}}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#genques-collapse{{$key}}" aria-expanded="true" aria-controls="genques-collapseOne">
                                            {{$faq->{'question_' . $lang} }}
                                        </button>
                                    </h2>
                                    <div id="genques-collapse{{$key}}" class="accordion-collapse collapse show" aria-labelledby="genques-heading{{$key}}" data-bs-parent="#genques-accordion">
                                        <div class="accordion-body">
                                            {!! $faq->{'question_' . $lang} !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!--end accordion-->
                    </div>
                </div><!--end col-->
                <!--end col-->
            </div>
            <!--end row-->
        @else
            <div class="row">
                <p style="text-align: center; font-weight: bold; font-size:20px; margin:auto; color: #fff">{{trans('home.no_data_in_this_page')}}</p>
            </div>
        @endif
    </div>
@endsection


@section("script")

@endsection
