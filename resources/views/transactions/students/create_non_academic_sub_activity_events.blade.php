@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Input Grade for '.$event->description)
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('student.nonacademicsubactivityevents.store', [$student->id, $event->id]) }}">
                                @csrf
                                
                                @if (session('status'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
    
                                <div class="pl-lg-4">
                                    <div class="form-group{{ $errors->has('repetition_time') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">Input Repetition/Time</label>
                                        <input type="text" name="repetition_time" id="input-name" class="form-control form-control-alternative{{ $errors->has('repetition_time') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Repetition/Time') }}" required>
       
                                        @if ($errors->has('repetition_time'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('repetition_time') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('score') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">Input Average/Score</label>
                                        <input type="number" name="score" id="input-name" class="form-control form-control-alternative{{ $errors->has('score') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Average/Score') }}" required>
       
                                        @if ($errors->has('score'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('score') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
                                    <a type="button" href="{{ route('student.nonacademicsubactivityevents.index', [$student->id, $event->sub_activity_id]) }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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