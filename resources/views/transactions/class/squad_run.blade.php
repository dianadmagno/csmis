@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Input Time for '.$class->description)
    ])

    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('class.squadrun.store', [$class->id, $activity->id]) }}">
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
                                    @if($activity->id == 3)
                                        <div class="form-group{{ $errors->has('group') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Squad') }}</label>
                                            <select name="group" class="form-control form-control-alternative{{ $errors->has('group') ? ' is-invalid' : '' }}" required>
                                                <option value="">Choose Squad</option>
                                                <option>1st Squad, 1st Platoon</option>
                                                <option>2nd Squad, 1st Platoon</option>
                                                <option>3rd Squad, 1st Platoon</option>
                                                <option>4th Squad, 1st Platoon</option>
                                                <option>1st Squad, 2nd Platoon</option>
                                                <option>2nd Squad, 2nd Platoon</option>
                                                <option>3rd Squad, 2nd Platoon</option>
                                                <option>4th Squad, 2nd Platoon</option>
                                                <option>1st Squad, 3rd Platoon</option>
                                                <option>2nd Squad, 3rd Platoon</option>
                                                <option>3rd Squad, 3rd Platoon</option>
                                                <option>4th Squad, 3rd Platoon</option>
                                                <option>1st Squad, 4th Platoon</option>
                                                <option>2nd Squad, 4th Platoon</option>
                                                <option>3rd Squad, 4th Platoon</option>
                                                <option>4th Squad, 4th Platoon</option>
                                            </select>
        
                                            @if ($errors->has('group'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('group') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    @elseif($activity->id == 4)
                                        <div class="form-group{{ $errors->has('group') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Platoon') }}</label>
                                            <select name="group" class="form-control form-control-alternative{{ $errors->has('group') ? ' is-invalid' : '' }}" required>
                                                <option value="">Choose Platoon</option>
                                                <option>1st Platoon</option>
                                                <option>2nd Platoon</option>
                                                <option>3rd Platoon</option>
                                                <option>4th Platoon</option>
                                            </select>
        
                                            @if ($errors->has('group'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('group') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="form-group{{ $errors->has('time') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">Input Time</label>
                                        <input type="text" name="time" id="input-name" class="form-control form-control-alternative{{ $errors->has('time') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Time') }}" required>
       
                                        @if ($errors->has('time'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('time') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
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