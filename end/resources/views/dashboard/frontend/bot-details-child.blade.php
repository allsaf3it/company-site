@extends('dashboard.layouts.app')
@section('meta')

@endsection
@section('main')

<section class="section">
    @include('dashboard.alerts.alert')
    <div class="row">
    
        <div class="row align-items-center">
            <div class="col-lg-7 col-md-7 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <h1 class="card-title fs-24 mb-0">{{$bot->bot_name}}</h1>
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
                                {!! $bot->{'desc_'.$lang} !!}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-5 col-sm-12 col-12">
                <div class="img-bot">
                    <img src="{{ ($profit >= 0) ? asset('frontend/assets/images/1.gif') : asset('frontend/assets/images/2.gif') }}" alt="bot" style="height: 450px; object-fit: cover;">
                </div>
            </div>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div id="line_chart_basic" data-colors='["--tb-secondary"]' class="apex-charts" dir="ltr"></div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- <canvas id="myChart" style="width: 100%; max-width:100%;"></canvas> -->
        <!-- end col -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h1 class="card-title fs-24 mb-0">{{$bot->bot_name}}</h1>
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
                            <p class="fs-16">
                                {!! $bot->{'desc_'.$lang} !!}
                            </p>
                        </div>
                    </div>
   <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 col-12">
          <div class="col">
              <div class="card border-2 bg-transparent text-center border-primary mb-0">
                  <div class="card-body py-4">
                      <div class="avatar-xxl mx-auto mb-4">
                          <h2 class="fs-22 fw-semibold">
                              {{trans('home.Per Year')}}
                          </h2>
                      </div>
                      <h4 class="fs-22 fw-semibold @if(number_format($profit, 2, '.', '') > 0)  text-success @else text-danger @endif"><span class="counter-value" data-target="{{number_format($profit, 2, '.', '')}}">0</span>%</h4>
                  </div>
              </div>
          </div><!--end col-->
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
          <div class="col">
              <div class="card border-2 bg-transparent text-center border-primary mb-0">
                  <div class="card-body py-4">
                      <div class="avatar-xxl mx-auto mb-4">
                          <h2 class="fs-22 fw-semibold">
                              {{trans('home.Per Month')}}
                          </h2>
                      </div>
                      <h4 class="fs-22 fw-semibold @if(number_format($profit, 2, '.', '') / 12 > 0)  text-success @else text-danger @endif"><span class="counter-value" data-target="{{number_format($profit / 12, 2, '.', '') }}">0</span>%</h4>
                  </div>
              </div>
          </div><!--end col-->
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
          <div class="col">
              <div class="card border-2 bg-transparent text-center border-primary mb-0">
                  <div class="card-body py-4">
                      <div class="avatar-xxl mx-auto mb-4">
                          <h2 class="fs-22 fw-semibold">
                          {{trans('home.Per Day')}}
                          </h2>
                      </div>
                      <h4 class="fs-22 fw-semibold @if(number_format($profit, 2, '.', '') / 360 > 0)  text-success @else text-danger @endif"><span class="counter-value" data-target="{{number_format($profit / 360, 2, '.', '')}}">0</span>%</h4>
                  </div>
              </div>
          </div><!--end col-->
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
          <div class="col">
              <div class="card border-2 bg-transparent text-center border-primary mb-0">
                  <div class="card-body py-4">
                      <div class="avatar-xxl mx-auto mb-4">
                          <h2 class="fs-22 fw-semibold">
                              {{trans('home.Profits')}}
                          </h2>
                      </div>
                      <h4 class="fs-22 fw-semibold @if(number_format($positiveProfit, 2, '.', '') > 0)  text-success @else text-danger @endif"><span class="counter-value" data-target="{{round(number_format($positiveProfit, 2, '.', ''), 2) }}">0</span>%</h4>
                  </div>
              </div>
          </div><!--end col-->
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
          <div class="col">
              <div class="card border-2 bg-transparent text-center border-primary mb-0">
                  <div class="card-body py-4">
                      <div class="avatar-xxl mx-auto mb-4">
                          <h2 class="fs-22 fw-semibold">
                              {{trans('home.Losses')}}
                          </h2>
                      </div>
                      <h4 class="fs-22 fw-semibold @if(number_format($negativeProfit, 2, '.', '') > 0)  text-success @else text-danger @endif"><span class="counter-value" data-target="{{round(number_format($negativeProfit, 2, '.', '') , 2)}}">0</span>%</h4>
                  </div>
              </div>
          </div><!--end col-->
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
          <div class="col">
              <div class="card border-2 bg-transparent text-center border-primary mb-0">
                  <div class="card-body py-4">
                      <div class="avatar-xxl mx-auto mb-4">
                          <h2 class="fs-22 fw-semibold">
                          {{trans('home.the difference')}}
                          </h2>
                      </div>
                      @php
                        $pos = round(number_format($positiveProfit, 2, '.', ''), 2);
                        $neg = round(number_format($negativeProfit, 2, '.', ''), 2);
                      @endphp
                      <h4 class="fs-22 fw-semibold @if(($pos + $neg) > 0)  text-success @else text-danger @endif"><span class="counter-value" data-target="{{$pos + $neg }}">0</span>%</h4>
                  </div>
              </div>
          </div><!--end col-->
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
          <div class="col">
              <div class="card border-2 bg-transparent text-center border-primary mb-0">
                  <div class="card-body py-4">
                      <div class="avatar-xxl mx-auto mb-4">
                          <h2 class="fs-22 fw-semibold">
                              {{trans('home.Profits')}} {{trans('count')}}
                          </h2>
                      </div>
                      <h4 class="fs-22 fw-semibold @if(count($positiveProfits) > 0)  text-success @else text-danger @endif"><span class="counter-value" data-target="{{count($positiveProfits)}}">0</span></h4>
                  </div>
              </div>
          </div><!--end col-->
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
          <div class="col">
              <div class="card border-2 bg-transparent text-center border-primary mb-0">
                  <div class="card-body py-4">
                      <div class="avatar-xxl mx-auto mb-4">
                          <h2 class="fs-22 fw-semibold">
                              {{trans('home.Losses')}} {{trans('count')}}
                          </h2>
                      </div>
                      <h4 class="fs-22 fw-semibold @if(count($negativeProfits) > 0)  text-success @else text-danger @endif"><span class="counter-value" data-target="{{count($negativeProfits)}}">0</span></h4>
                  </div>
              </div>
          </div><!--end col-->
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-12 mb-4">
          <div class="col">
              <div class="card border-2 bg-transparent text-center border-primary mb-0">
                  <div class="card-body py-4">
                      <div class="avatar-xxl mx-auto mb-4">
                          <h2 class="fs-22 fw-semibold">
                          {{trans('home.the difference')}} {{trans('count')}}
                          </h2>
                      </div>
                      <h4 class="fs-22 fw-semibold @if(count($positiveProfits) - count($negativeProfits) > 0)  text-success @else text-danger @endif"><span class="counter-value" data-target="{{count($positiveProfits) - count($negativeProfits)}}">0</span></h4>
                  </div>
              </div>
          </div><!--end col-->
      </div>
      @if(auth()->user()->plan_id != null)
          <div class="col-xl-12 col-md-12">
              <div class="card border-0 text-center">
                  <div class="card-body p-4 pb-0">
                      <div>
                          @if($botActive == null)
                              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#success-Payment">{{trans('home.launch')}}</button>
                          @else
                            <form action="{{LaravelLocalization::localizeUrl('dashboard/stop/bot/' .$bot->id)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary">{{trans('home.shutdown')}}</button>
                            </form>
                          @endif
                      </div>
                  </div><!-- end card body -->
              </div><!-- end card -->
          </div>
      @endif
  </div>
                </div>
            </div>
        </div><!-- end col -->

    </div>
    <!-- end row -->
</section>
@if(auth()->user()->plan_id != null)
    <!-- Input -->
    <div id="success-Payment" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                    <div class="text-end">
                        <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="mt-2">
                        <lord-icon src="https://cdn.lordicon.com/pithnlch.json" trigger="loop" colors="primary:#ffffff,secondary:#08a88a" style="width:120px;height:120px">
                        </lord-icon>
                        <h4 class="mb-3 mt-4">{{trans('home.Put your USDT')}}</h4>
                        <!-- <p class="text-muted fs-15 mb-4">Lorem ipsum dolor sit amet.</p> -->
                        <form method="post" action="{{LaravelLocalization::localizeUrl('/dashboard/save/usdt')}}">
                            @csrf
                            <div class="col-lg-12">
                                <input type="hidden" value="{{$bot->id}}" name="id">
                                <input type="text" class="form-control" id="placeholderInput" name="usdt" placeholder="USDT">
                                @error('usdt')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="hstack gap-2 justify-content-center mt-3">
                                <button class="btn btn-primary" type="submit">{{trans('send')}}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    <!-- Success -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center p-5">
                        <lord-icon src="https://cdn.lordicon.com/tqywkdcz.json" trigger="loop" style="width:150px;height:150px">
                        </lord-icon>
                    
                    <div class="mt-4">
                        <h4 class="mb-3">{{trans("home.You've made it!")}}</h4>
                        <!-- <p class="text-muted mb-4"> {{trans("home.The transfer was not successfully received by us. the email of the recipient wasn't correct.")}}</p> -->
                        <div class="hstack gap-2 justify-content-center">
                            <a href="javascript:void(0);" class="btn btn-link link-success fw-medium" data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i> {{trans('home.close')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@endsection
@section('script')
<!-- chart -->
    <!-- apexcharts -->
    <script>
        var xValues = {!! json_encode($chartTime) !!};
        var yValues = {!! json_encode($allProfit) !!};
        const last30DaysData = yValues.slice(30);
        const newData = last30DaysData.map(function(value) {
            // Perform your desired actions with the value here
            return value; // You can modify this line to return the transformed value
        });
        const last30DaysDataX = xValues.slice(30);
        const newDataX = last30DaysDataX.map(function(value) {
            // Perform your desired actions with the value here
            return value; // You can modify this line to return the transformed value
        });
    
    
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#ajaxForm').submit(function(event) {
            event.preventDefault();

            var formData = $(this).serialize();
            
            $.ajax({
                type: 'POST',
                url: '{{ LaravelLocalization::localizeUrl("/dashboard/save/usdt") }}',
                data: formData,
                success: function(response) {
                    // Handle success response
                    console.log(response.success);

                    // Close the modal after the form is successfully submitted
                    $('#success-Payment').modal('hide');
                    $('#staticBackdrop').modal('show');
                    setTimeout(function() {
                        $('#staticBackdrop').modal('hide');
                    }, 5000);

                    // Redirect to another page if needed
                    window.location.href = '{{ LaravelLocalization::localizeUrl("/dashboard/my-bots") }}';
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    
                    $('#error-message').html(xhr.responseJSON.error);
                }
            });
        });

        // Reset the form when the modal is hidden
        $('#success-Payment').on('hidden.bs.modal', function (e) {
            // Reset the form inside the modal
            $('#ajaxForm')[0].reset();
        });
    });

    </script>
    <script src="{{asset('dashboard/assets/libs/apexcharts/apexcharts.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/pages/apexcharts-line.init.js')}}"></script>

@endsection