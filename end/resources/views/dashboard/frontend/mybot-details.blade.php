@extends('dashboard.layouts.app')
@section('meta')
    <link href="{{asset('adminbackend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section('main')
    <section class="section">
    @include('dashboard.alerts.alert')
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
            <div class="img-bot">
                <img src="{{asset('frontend/assets/images/3.gif')}}" alt="bot" style="height: 450px; object-fit: cover;">
            </div>
        </div>
        @if(count($botsUsdt) > 0)
            <div class="row">
                @foreach($botsUsdt as $botUsdt)
                <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card  border-2 border-primary p-3">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-2 bg-transparent text-center mb-0">
                                    <div class="card-body py-4">
                                        <div class="avatar-xxl mx-auto mb-4">
                                            <h2 class="fs-22 fw-semibold">
                                                {{trans('home.start_date')}} : <br/> <br/> <span class="text-warning">{{$botUsdt->created_at}}</span>
                                            </h2>
                                        </div>
                                        <h4 class="fs-22 fw-semibold">{{trans('home.start_usdt')}} : <br> <span class="counter-value @if($botUsdt->start_usdt >= 0) text-success @else text-danger @endif" data-target="{{number_format($botUsdt->start_usdt, 2, '.', '')}}">0</span><span class=" @if($botUsdt->start_usdt >= 0) text-success @else text-danger @endif"></span></h4>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card border-2 bg-transparent text-center mb-0">
                                    <div class="card-body py-4">
                                        <div class="avatar-xxl mx-auto mb-4">
                                            <h2 class="fs-22 fw-semibold">
                                                {{trans('home.last_date')}} : <br/> <br/> <span class="text-warning">{{$botUsdt->updated_at}}</span>
                                            </h2>
                                        </div>
                                        <h4 class="fs-22 fw-semibold">{{trans('home.orders_usdt')}} : <br> <span class="counter-value @if($botUsdt->orders_usdt >= 0) text-success @else text-danger @endif" data-target="{{number_format($botUsdt->orders_usdt, 2, '.', '')}}">0</span><span class=" @if($botUsdt->orders_usdt >= 0) text-success @else text-danger @endif"></span></h4>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
        @if(count($biananceBots) > 0)
            <!-- Table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{trans('home.num')}}</th>
                                            <th>{{trans('home.name')}}</th>
                                            <th>{{trans('home.profit_per')}}</th>
                                            <th>{{trans('home.profit_usdt')}}</th>
                                            <th>{{trans('home.side')}}</th>
                                            <th>{{trans('home.quantity')}}</th>
                                            <th>{{trans('home.price')}}</th>
                                            <th>{{trans('home.status')}}</th>
                                            <th>{{trans('home.created_at')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($biananceBots as $key=>$biananceBot)
                                            @php
                                                $bot = App\Models\BotTypeChild::select()->where('id', $biananceBot->bot_num)->first();
                                            @endphp
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$bot->bot_name}}</td>
                                                <td class="{{($biananceBot->profit_per >= 0) ? 'text-success' : 'text-danger'}}">{{$biananceBot->profit_per}}</td>
                                                <td class="{{($biananceBot->profit_usdt >= 0) ? 'text-success' : 'text-danger'}}">{{$biananceBot->profit_usdt}}</td>
                                                <td class="{{($biananceBot->side == 'buy') ? 'text-success' : 'text-danger'}}">{{$biananceBot->side}}</td>
                                                <td>{{$biananceBot->quantity}}</td>
                                                <td>{{$biananceBot->price}}</td>
                                                <td class="{{($biananceBot->status == 'FILLED') ? 'text-success' : 'text-danger'}}">{{($biananceBot->status == 'FILLED')? trans('home.success') : trans('home.error') }}</td>
                                                <td class="text-warning">{{$biananceBot->created_at}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        @else

            <div class="row">
                <p style="text-align: center; font-weight: bold; font-size:20px; margin:auto; color: #fff">{{trans('home.no_data_in_this_page')}}</p>
            </div>
        @endif
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
    <section>
        
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

@endsection
@section('script')

    <script src="{{asset('adminbackend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminbackend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                paging: true
            });
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
@endsection