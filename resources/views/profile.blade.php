@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('My profile') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row mb-7 ">
                            <label class="col-lg-2 fw-bold text-muted">{{ __('My Name') }}</label>
                            <div class="col-lg-6 shadow-sm p-3 mb-5 bg-white rounded">
                                <span class="fw-bolder fs-6 text-dark">{{ $user['user']['name'] }}</span>
                            </div>
                        </div>
                        <div class="row mb-7 ">
                            <label class="col-lg-2 fw-bold text-muted">{{ __('My Email') }}</label>
                            <div class="col-lg-6 shadow-sm p-3 mb-5 bg-white rounded">
                                <span class="fw-bolder fs-6 text-dark">{{ $user['user']['email'] }}</span>
                            </div>
                        </div>
                        <div class="row mb-7 ">
                            <label class="col-lg-2 fw-bold text-muted">{{ __('My Balance') }}</label>
                            <div class="col-lg-6 shadow-sm p-3 mb-5 bg-white rounded">
                                <span class="fw-bolder fs-6 text-dark">{{ $user['user']['balance'] }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
