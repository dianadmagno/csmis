@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Assign Module')
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('instructor.add', $class->id) }}">
                                @csrf
                                
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
    
    
                                <div class="form-group{{ $errors->has('instructor_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Instructor') }}</label>
                                        <select name="instructor_id" class="form-control form-control-alternative{{ $errors->has('instructor_id') ? ' is-invalid' : '' }}">
                                            <option value="">Choose Instructors</option>
                                            @foreach($instructors as $instructor)
                                                <option value="{{ $instructor->id }}">{{ $instructor->firstname }} {{ $instructor->lastname }}</option>
                                            @endforeach
                                        </select>
    
                                        @if ($errors->has('instructor_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('instructor_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
                                    <a type="button" href="{{ route('assigned.subject', $class->id) }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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