@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Thank You') }}</div>

                <div class="card-body">
                  @if($response['message']=="success")
                          <h5>Successful Payment your payment Number is :- {{$response['response']['payment_number']}}</h5>
                    @elseif($response['message'] =="error")
                        <h5>{{$response['response']}}</h5>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
