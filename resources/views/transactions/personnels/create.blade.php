@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Add Personnel')
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('personnel.store') }}">
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

                                    <div class="form-group{{ $errors->has('serial_number') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Serial Number') }}</label>
                                        <input type="text" name="serial_number" class="form-control form-control-alternative{{ $errors->has('serial_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Serial Number') }}">
    
                                        @if ($errors->has('serial_number'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('serial_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('rank_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Rank') }}</label>
                                        <select name="rank_id" class="form-control form-control-alternative{{ $errors->has('rank_id') ? ' is-invalid' : '' }}">
                                            <option value="">Choose Rank</option>
                                            @foreach($ranks as $rank)
                                                <option value="{{ $rank->id }}" {{ old('rank_id') == $rank->id ? 'selected' : '' }}>{{ $rank->description }}</option>
                                            @endforeach
                                        </select>
    
                                        @if ($errors->has('rank_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('rank_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('personnel_category_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Category') }}</label>
                                        <select name="personnel_category_id" class="form-control form-control-alternative{{ $errors->has('personnel_category_id') ? ' is-invalid' : '' }}">
                                            <option value="">Choose Category</option>
                                            @foreach($personnelCategories as $personnelCategory)
                                                <option value="{{ $personnelCategory->id }}" {{ old('personnel_category_id') == $personnelCategory->id ? 'selected' : '' }}>{{ $personnelCategory->description }}</option>
                                            @endforeach
                                        </select>
    
                                        @if ($errors->has('personnel_category_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('personnel_category_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
                                    <a type="button" href="{{ route('personnel.index') }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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