@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('My Transactions Histroy') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <div class="row mb-7 ">
                            <label class="col-lg-3 fw-bold text-muted">{{ __('Latest 10 Out Transactions History') }}</label>
                            <div class="col-lg-6  p-3 mb-5 bg-white rounded">
                                <span class="fw-bolder fs-6 text-dark">

                                        <table id="kt_datatable_example_3"
                                               class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                            <thead>
                                            <tr class="">
                                                <th style="width: 5%">#</th>
                                                <th style="width: 55%"> Payment Number</th>
                                                <th style="width: 20%">amount</th>
                                                <th style="width: 20%">Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $index =0;?>
                                            @forelse($user['user']['outTransactions'] as $outTransaction)
                                                <?php $index++?>
                                                @if($index == 11)
                                                    @break
                                                    @endif
                                                <tr>
                                                    <td>{{$index}}</td>
                                                    <td>{{$outTransaction['payment_number']}}</td>
                                                    <td>{{$outTransaction['amount']}}</td>
                                                    <td>{{$outTransaction['created_at']}}</td>

                                                </tr>
                                            @empty
                                                <tr>
                                                    <h1 class="text-center">No Data To View </h1>
                                                <tr>
                                            @endforelse
                                            </tbody>
                                        </table>

                                </span>
                            </div>
                        </div>
                        <div class="row mb-7 ">
                            <label class="col-lg-3 fw-bold text-muted">{{ __('Latest 10 In Transactions History') }}</label>
                            <div class="col-lg-6  p-3 mb-5 bg-white rounded">
                                <span class="fw-bolder fs-6 text-dark">
                                      <table id="kt_datatable_example_3"
                                             class="table table-striped table-row-bordered gy-5 gs-7 border rounded">
                                            <thead>
                                            <tr class="">
                                                <th style="width: 5%"> #</th>
                                                <th style="width: 55%"> Payment Number</th>
                                                <th style="width: 20%">amount</th>
                                                <th style="width: 20%">Date</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $index =0;?>
                                                @forelse($user['in_transactions'] as $in_transaction)
                                                    <?php $index++?>
                                                    @if($index == 11)
                                                        @break
                                                    @endif
                                                    <tr>

                                                        <td>{{$index}}</td>
                                                        <td>{{$in_transaction['payment_number']}}</td>
                                                        <td>{{$in_transaction['amount']}}</td>
                                                        <td>{{$in_transaction['created_at']}}</td>

                                                    </tr>
                                                @empty

                                                    <tr>No Data To View </tr>

                                                @endforelse
                                            </tbody>
                                        </table>

                                </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
