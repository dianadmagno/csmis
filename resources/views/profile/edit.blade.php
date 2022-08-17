@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Edit Profile')
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-1 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    @if ($user->photo)
                                        <img src="{{ asset('user images/'.$user->photo.'') }}" class="rounded-circle">
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
                                <i class="ni business_briefcase-24 mr-2"></i>{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}
                            </div>
                            <div class="h5">
                                @if($user->is_superadmin)
                                    <i class="ni education_hat mr-2"></i>Superadmin
                                @endif
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
                            <form method="post" action="{{ route('user.photo', $user->id) }}" enctype="multipart/form-data">
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
                        <form method="post" action="{{ route('user.update', $user->id) }}">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            
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
                                    <input type="text" name="lastname" id="input-name" class="form-control form-control-alternative{{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="{{ __('Lastname') }}" value="{{ old('lastname', $user->lastname) }}" autofocus>

                                    @if ($errors->has('lastname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('lastname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Firstname') }}</label>
                                    <input type="text" name="firstname" id="input-name" class="form-control form-control-alternative{{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="{{ __('Firstname') }}" value="{{ old('firstname', $user->firstname) }}">

                                    @if ($errors->has('firstname'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('firstname') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('middlename') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Middlename') }}</label>
                                    <input type="text" name="middlename" id="input-name" class="form-control form-control-alternative{{ $errors->has('middlename') ? ' is-invalid' : '' }}" placeholder="{{ __('Middlename') }}" value="{{ old('middlename', $user->middlename) }}">

                                    @if ($errors->has('middlename'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('middlename') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="text" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}">

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                @if (auth()->user()->is_superadmin)
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">{{ __('Is Superadmin?') }}</label>
                                        <label class="custom-toggle ml-3">
                                            <input type="checkbox" name="is_superadmin" value="1" {{ $user->is_superadmin ? 'checked' : '' }}>
                                            <span class="custom-toggle-slider rounded-circle mb--3 mt-3" data-label-off="No" data-label-on="Yes"></span>
                                        </label>
                                    </div>
                                @endif

                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </form>
                        <hr class="my-4" />
                        <form method="post" action="{{ route('user.password', $user->id) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Change Password') }}</h6>

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-current-password">{{ __('Current Password') }}</label>
                                    <input type="password" name="old_password" id="input-current-password" class="form-control form-control-alternative{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}">
                                    
                                    @if ($errors->has('old_password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('New Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}">
                                    
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm New Password') }}">
                                </div>

                                <button type="submit" class="btn btn-success mt-4">{{ __('Change password') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
