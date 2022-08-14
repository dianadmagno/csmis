@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Add Student')
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
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
                                    <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                                    <div class="row">
                                        <div class="col">
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

                                            <div class="form-group{{ $errors->has('rank') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Rank') }}</label>
                                                <select name="rank" class="form-control form-control-alternative{{ $errors->has('rank') ? ' is-invalid' : '' }}">
                                                    <option value="">Choose Rank</option>
                                                    @foreach($ranks as $rank)
                                                        <option value="{{ $rank->id }}">{{ $rank->description }}</option>
                                                    @endforeach
                                                </select>
            
                                                @if ($errors->has('rank'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('rank') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('rank') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Serial Number') }}</label>
                                                <input type="text" name="serial_number" class="form-control form-control-alternative{{ $errors->has('serial_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Serial Number') }}">
            
                                                @if ($errors->has('serial_number'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('serial_number') }}</strong>
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
                                        </div>
                                        <div class="col">
                                            <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Age') }}</label>
                                                <input type="text" name="age" class="form-control form-control-alternative{{ $errors->has('age') ? ' is-invalid' : '' }}" placeholder="{{ __('Age') }}">
            
                                                @if ($errors->has('age'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('age') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Address') }}</label>
                                                <input type="text" name="address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}">
            
                                                @if ($errors->has('address'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('birthdate') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Birthday') }}</label>
                                                <input type="date" name="birthdate" class="form-control form-control-alternative{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" placeholder="{{ __('Birthday') }}">
            
                                                @if ($errors->has('birthdate'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('blood_type') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Blood Type') }}</label>
                                                <select name="blood_type" class="form-control form-control-alternative{{ $errors->has('blood_type') ? ' is-invalid' : '' }}">
                                                    <option value="">Choose Blood Type</option>
                                                    @foreach($bloodTypes as $bloodType)
                                                        <option value="{{ $bloodType->id }}">{{ $bloodType->description }}</option>
                                                    @endforeach
                                                </select>
            
                                                @if ($errors->has('blood_type'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('blood_type') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('religion') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Religion') }}</label>
                                                <select name="religion" class="form-control form-control-alternative{{ $errors->has('religion') ? ' is-invalid' : '' }}">
                                                    <option value="">Choose Religion</option>
                                                    @foreach($religions as $religion)
                                                        <option value="{{ $religion->id }}">{{ $religion->description }}</option>
                                                    @endforeach
                                                </select>
            
                                                @if ($errors->has('religion'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('religion') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Submit') }}</button>
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