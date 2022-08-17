@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Add User')
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <i><small class="text-danger">*Password is the user's lastname</small></i>
                        </div>
                        
                        <div class="card-body">
                            <form method="post" action="{{ route('user.store') }}">
                                @csrf
                                
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
    
    
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Lastname') }}</label>
                                        <input type="text" name="lastname" id="input-name" class="form-control form-control-alternative{{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="{{ __('Lastname') }}" autofocus>
    
                                        @if ($errors->has('lastname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('lastname') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Firstname') }}</label>
                                        <input type="text" name="firstname" class="form-control form-control-alternative{{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="{{ __('Firstname') }}">
    
                                        @if ($errors->has('firstname'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('firstname') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('middlename') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Middlename') }}</label>
                                        <input type="text" name="middlename" class="form-control form-control-alternative{{ $errors->has('middlename') ? ' is-invalid' : '' }}" placeholder="{{ __('Middlename') }}">
    
                                        @if ($errors->has('middlename'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('middlename') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Email') }}</label>
                                        <input type="text" name="email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
    
                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
                                    <a type="button" href="{{ route('user.index') }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush