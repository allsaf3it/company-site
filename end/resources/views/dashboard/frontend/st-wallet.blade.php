@extends('dashboard.layouts.app')
@section('meta')
    <link href="{{asset('adminbackend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
@endsection
@section('main')
    <section class="section">
    @include('dashboard.alerts.alert')
        <!-- Cards -->
        <div class="row">
            <div class="col-lg-12 mt-5">
                <div class="card border-0 bg-transparent">
                    <div class="card-body">
                        <div class="row g-4 row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
                            <div class="col">
                                <div class="card border-2 bg-transparent text-center border-primary mb-0">
                                    <div class="card-body py-4">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <div class="avatar-title bg-primary bg-opacity-25 text-primary fs-24 rounded-circle">
                                                <i class="bi bi-currency-dollar"></i>
                                            </div>
                                        </div>
                                        <h4 class="fs-22 fw-semibold"><span class="counter-value" data-target="{{$user->fees}}">0</span>$</h4>
                                        <p class="text-muted fs-14 mb-0">S.T Wallet</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                            <div class="col">
                                <div class="card bg-transparent text-center mb-0">
                                    <div class="card-body py-4">
                                        <div class="avatar-sm mx-auto mb-4">
                                            <div class="avatar-title bg-dark-subtle text-white fs-22 rounded-circle">
                                                <i class="bi bi-credit-card-2-front"></i>
                                            </div>
                                        </div>
                                        <h4 class="fs-22 fw-semibold"><span class="counter-value" data-target="{{$user->all_profit}}">0</span>$</h4>
                                        <p class="text-muted fs-14 mb-0">User Affilate</p>
                                    </div>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                </div>
            </div><!--end col-->

        </div>
        @if(count($feesBots) > 0 || count($depositsBinance) > 0 || count($withdrawHistory) > 0)
            <!-- Table -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>{{trans('home.value')}}</th>
                                            <th>{{trans('home.date')}}</th>
                                            <th>{{trans('home.type')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($feesBots)  > 0)
                                            @foreach($feesBots as $feesBot)                           
                                                <tr>
                                                    <td class="text-danger"> {{ ($feesBot->fees != 0) ? - $feesBot->fees : $feesBot->fees }}</td>
                                                    <td>{{$feesBot->created_at}}</td>
                                                    <td>{{trans('home.Fees Bots')}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if(count($depositsBinance)  > 0)
                                            @foreach($depositsBinance as $depositsBinance)                           
                                                <tr>
                                                    <td class="text-success"> {{$depositsBinance->amount}}</td>
                                                    <td>{{$depositsBinance->created_at}}</td>
                                                    <td>{{trans('home.DepositBinance')}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if(count($withdrawHistory)  > 0)
                                            @foreach($withdrawHistory as $withdrawHistoryItem)                           
                                                <tr>
                                                    <td class="text-danger"> {{ ($withdrawHistoryItem->amount != 0) ? - $withdrawHistoryItem->amount : $withdrawHistoryItem->amount }}</td>
                                                    <td>{{$withdrawHistoryItem->created_at}}</td>
                                                    <td>{{trans('home.withdraw_history')}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if(count($planHistory)  > 0)
                                            @foreach($planHistory as $planHistoryItem)                           
                                                <tr>
                                                    <td class="text-danger"> {{ ($planHistoryItem->amount != 0) ? - $planHistoryItem->amount : $planHistoryItem->amount }}</td>
                                                    <td>{{$planHistoryItem->created_at}}</td>
                                                    <td>{{trans('home.plan_history')}}</td>
                                                </tr>
                                            @endforeach
                                        @endif
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
    <section>
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
@endsection