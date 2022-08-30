@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Update Class')
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('class.update', $class->id) }}">
                                @csrf
                                @method('put')
                                
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
                                        <input type="text" value="{{ old('name', $class->name) }}" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}">
       
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('alias') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Class Name (if available)') }}</label>
                                        <input type="text" value="{{ old('alias', $class->alias) }}" name="alias" id="input-name" class="form-control form-control-alternative{{ $errors->has('alias') ? ' is-invalid' : '' }}" placeholder="{{ __('Class Name')}}">
    
                                        @if ($errors->has('alias'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('alias') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('course_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Training Course') }}</label>
                                        <select name="course_id" class="form-control form-control-alternative{{ $errors->has('course_id') ? ' is-invalid' : '' }}">
                                            <option value="">Choose Training Course</option>
                                            @foreach($courses as $course)
                                                <option value="{{ $course->id }}" {{ $class->course_id == $course->id ? 'selected' : '' }}>{{ $course->description }}</option>
                                            @endforeach
                                        </select>
    
                                        @if ($errors->has('course_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('course_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('graduation_date') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Date of Graduation (if available)') }}</label>
                                        <input type="date" value="{{ old('graduation_date', $class->graduation_date) }}" name="graduation_date" id="input-name" class="form-control form-control-alternative{{ $errors->has('graduation_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Date of Graduation')}}">
    
                                        @if ($errors->has('graduation_date'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('graduation_date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
                                    <a type="button" href="{{ route('class.index') }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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