@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Add Activity')
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('activity.store') }}">
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
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}">
       
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                                        <input type="text" name="description" id="input-name" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description')}}">
    
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('nr_of_points') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Allocated Points') }}</label>
                                        <input type="number" name="nr_of_points" id="input-name" class="form-control form-control-alternative{{ $errors->has('nr_of_points') ? ' is-invalid' : '' }}" placeholder="{{ __('Allocated Points')}}">
    
                                        @if ($errors->has('nr_of_points'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nr_of_points') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('performance_type') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Type of Performance') }}</label>
                                        <select name="performance_type" class="form-control form-control-alternative{{ $errors->has('performance_type') ? ' is-invalid' : '' }}">
                                            <option value="">Choose Type of Performance</option>
                                            <option value="1">Individual</option>
                                            <option value="2">Class</option>
                                        </select>
    
                                        @if ($errors->has('performance_type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('performance_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input class="custom-control-input" name="has_sub_activities" value="1" id="customCheck1" type="checkbox">
                                        <label class="custom-control-label" for="customCheck1">has sub activities?</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
                                    <a type="button" href="{{ route('activity.index') }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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