@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Checkout') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('postPayment') }}">
                        @csrf

                        <div class="form-group row">

                            <label for="card_number" class="col-md-4 col-form-label text-md-right">{{ __('Card Number') }}</label>

                            <div class="col-md-6">
                                <input type="number"  required maxlength="14"  name="card_number">
                            </div>

                            </div>
                        <div class="form-group row">

                            <label for="expiry_date" class="col-md-4 col-form-label text-md-right">{{ __('expiry_date') }}</label>

                            <div class="col-md-6">
                                <input type="string"  required name="expiry_date">

                            </div>

                        </div>
                        <div class="form-group row">

                            <label for="CVC" class="col-md-4 col-form-label text-md-right">{{ __('CVC') }}</label>

                            <div class="col-md-6">
                                <input type="number"  maxlength="3" required  name="CVC">

                            </div>

                        </div>
                        <div class="form-group row">

                            <label for="card_holder_name" class="col-md-4 col-form-label text-md-right">{{ __('Card Holder Name') }}</label>

                            <div class="col-md-6">
                                <input type="string"  required  name="card_holder_name">

                            </div>

                        </div>

                        <div class="form-group row">


                            <div class="col-md-6">
                                <input type="hidden"  value="{{$recipient_id}}"  name="recipient_id">

                            </div>

                        </div>
                        <div class="form-group row">


                            <div class="col-md-6">
                                <input type="hidden"  value="{{$amount}}"  name="amount">

                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Do Payment') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
