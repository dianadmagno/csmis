@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Edit Time for '.$activityRun->studentClass->description)
    ])

    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('class.squadrun.update', [$class->id, $activityRun->activity_id]) }}">
                                @csrf
                                @method('put')
                                @if (session('status'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
    
                                <div class="pl-lg-4">
                                    @if($activityRun->activity_id == 3)
                                        <div class="form-group{{ $errors->has('group') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Squad') }}</label>
                                            <select name="group" class="form-control form-control-alternative{{ $errors->has('group') ? ' is-invalid' : '' }}" required>
                                                <option value="">Choose Squad</option>
                                                <option {{ $activityRun->group == '1st Squad, 1st Platoon' ? 'selected' : '' }}>1st Squad, 1st Platoon</option>
                                                <option {{ $activityRun->group == '2nd Squad, 1st Platoon' ? 'selected' : '' }}>2nd Squad, 1st Platoon</option>
                                                <option {{ $activityRun->group == '3rd Squad, 1st Platoon' ? 'selected' : '' }}>3rd Squad, 1st Platoon</option>
                                                <option {{ $activityRun->group == '4th Squad, 1st Platoon' ? 'selected' : '' }}>4th Squad, 1st Platoon</option>
                                                <option {{ $activityRun->group == '1st Squad, 2nd Platoon' ? 'selected' : '' }}>1st Squad, 2nd Platoon</option>
                                                <option {{ $activityRun->group == '2nd Squad, 2nd Platoon' ? 'selected' : '' }}>2nd Squad, 2nd Platoon</option>
                                                <option {{ $activityRun->group == '3rd Squad, 2nd Platoon' ? 'selected' : '' }}>3rd Squad, 2nd Platoon</option>
                                                <option {{ $activityRun->group == '4th Squad, 2nd Platoon' ? 'selected' : '' }}>4th Squad, 2nd Platoon</option>
                                                <option {{ $activityRun->group == '1st Squad, 3rd Platoon' ? 'selected' : '' }}>1st Squad, 3rd Platoon</option>
                                                <option {{ $activityRun->group == '2nd Squad, 3rd Platoon' ? 'selected' : '' }}>2nd Squad, 3rd Platoon</option>
                                                <option {{ $activityRun->group == '3rd Squad, 3rd Platoon' ? 'selected' : '' }}>3rd Squad, 3rd Platoon</option>
                                                <option {{ $activityRun->group == '4th Squad, 3rd Platoon' ? 'selected' : '' }}>4th Squad, 3rd Platoon</option>
                                                <option {{ $activityRun->group == '1st Squad, 4th Platoon' ? 'selected' : '' }}>1st Squad, 4th Platoon</option>
                                                <option {{ $activityRun->group == '2nd Squad, 4th Platoon' ? 'selected' : '' }}>2nd Squad, 4th Platoon</option>
                                                <option {{ $activityRun->group == '3rd Squad, 4th Platoon' ? 'selected' : '' }}>3rd Squad, 4th Platoon</option>
                                                <option {{ $activityRun->group == '4th Squad, 4th Platoon' ? 'selected' : '' }}>4th Squad, 4th Platoon</option>
                                            </select>
        
                                            @if ($errors->has('group'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('group') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    @elseif($activityRun->activity_id == 4)
                                        <div class="form-group{{ $errors->has('group') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Platoon') }}</label>
                                            <select name="group" class="form-control form-control-alternative{{ $errors->has('group') ? ' is-invalid' : '' }}" required>
                                                <option value="">Choose Platoon</option>
                                                <option {{ $activityRun->group == '1st Platoon' ? 'selected' : '' }}>1st Platoon</option>
                                                <option {{ $activityRun->group == '2nd Platoon' ? 'selected' : '' }}>2nd Platoon</option>
                                                <option {{ $activityRun->group == '3rd Platoon' ? 'selected' : '' }}>3rd Platoon</option>
                                                <option {{ $activityRun->group == '4th Platoon' ? 'selected' : '' }}>4th Platoon</option>
                                            </select>
        
                                            @if ($errors->has('group'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('group') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="form-group{{ $errors->has('time') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">Input Best Time</label>
                                        <input type="text" value="{{ old('time', $activityRun->time) }}" name="time" id="input-name" class="form-control form-control-alternative{{ $errors->has('time') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Best Time') }}" required>
       
                                        @if ($errors->has('time'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('time') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
                                    <a type="button" href="{{ route('assigned.activities', $class->id) }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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