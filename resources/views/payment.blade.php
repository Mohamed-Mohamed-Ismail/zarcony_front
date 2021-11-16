@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Do Payment') }}</div>

                    <div class="card-body">
                            <form method="get" action="{{ route('checkout') }}">
                            <div class="form-group row">
                                <label for="recipient_id"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Recipient') }}</label>
                                <div class="col-md-6">
                                    <select class="form-select" name="recipient_id" aria-label="Select example">
                                        <option value=" ">Choose Recipient</option>
                                        @forelse ($users['users'] as $user)

                                            <option value="{{$user['id']}}">{{$user['name']}}</option>

                                        @empty
                                            <h6>No Users Found</h6>
                                        @endforelse
                                        @error('recipient_id')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                          </span>
                                        @enderror
                                    </select>

                                </div>

                            </div>
                            <div class="form-group row">

                                <label for="amount"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                                <div class="col-md-6">
                                    <input type="number" name="amount">

                                </div>
                                @error('amount')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                          </span>
                                @enderror
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Proceed to Checkout') }}
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
