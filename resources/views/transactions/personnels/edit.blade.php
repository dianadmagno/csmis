@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Edit Personnel')
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-1 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    @if ($personnel->photo)
                                        <img src="{{ asset('personnel images/'.$personnel->photo.'') }}" class="rounded-circle">
                                    @else
                                        <img src="{{ asset('user images/user.png') }}" class="rounded-circle">
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4 mt-6">
                        <div class="text-center">
                            <div>
                                <i class="ni business_briefcase-24 mr-2"></i>{{ $personnel->rank->name }} {{ $personnel->firstname }} {{ $personnel->middlename }} {{ $personnel->lastname }}
                            </div>
                            <div class="h5">
                                <i class="ni education_hat mr-2"></i>{{ $personnel->personnelCategory->description }}
                            </div>
                            <hr class="my-4">
                            @if (session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form method="post" action="{{ route('user.photo', $personnel->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="file" class="ml-5" name="photo"><br><br>
                                <div class="row ml-3">
                                    <button type="submit" name="action" value="upload" class="btn btn-success">Upload Photo</button>
                                    <button type="submit" name="action" value="remove" onclick="return confirm('Do you really want to delete this photo?')" class="btn btn-danger">Remove Photo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <form method="post" action="{{ route('personnel.update', $personnel->id) }}">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Personnel information') }}</h6>
                            
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
                                    <input type="text" name="lastname" id="input-name" class="form-control form-control-alternative{{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="{{ __('Lastname') }}" value="{{ old('lastname', $personnel->lastname) }}">

                                    @if ($errors->has('lastname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Firstname') }}</label>
                                    <input type="text" name="firstname" id="input-name" class="form-control form-control-alternative{{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="{{ __('Firstname') }}" value="{{ old('firstname', $personnel->firstname) }}">

                                    @if ($errors->has('firstname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('middlename') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Middlename') }}</label>
                                    <input type="text" name="middlename" id="input-name" class="form-control form-control-alternative{{ $errors->has('middlename') ? ' is-invalid' : '' }}" placeholder="{{ __('Middlename') }}" value="{{ old('middlename', $personnel->middlename) }}">

                                    @if ($errors->has('middlename'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('middlename') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('serial_number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Serial Number') }}</label>
                                    <input type="text" name="serial_number" id="input-name" class="form-control form-control-alternative{{ $errors->has('serial_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Serial Number') }}" value="{{ old('serial_number', $personnel->serial_number) }}">

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
                                            <option value="{{ $rank->id }}" {{ $personnel->rank->id == $rank->id ? 'selected' : '' }}>{{ $rank->description }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('rank_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rank_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('personnel_category_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Rank') }}</label>
                                    <select name="personnel_category_id" class="form-control form-control-alternative{{ $errors->has('personnel_category_id') ? ' is-invalid' : '' }}">
                                        <option value="">Choose Category</option>
                                        @foreach($personnelCategories as $personnelCategory)
                                            <option value="{{ $personnelCategory->id }}" {{ $personnel->personnelCategory->id == $personnelCategory->id ? 'selected' : '' }}>{{ $personnelCategory->description }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('personnel_category_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('personnel_category_id') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
                                <a type="button" href="{{ route('personnel.index') }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
