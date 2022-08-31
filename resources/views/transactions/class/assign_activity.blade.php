@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Assign Activity to '.$class->description)
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('assign.activity', $class->id) }}">
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
                                    <div class="form-group{{ $errors->has('activity_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Activity') }}</label>
                                        <select name="activity_id" class="form-control form-control-alternative{{ $errors->has('activity_id') ? ' is-invalid' : '' }}" required>
                                            <option value="">Choose Activity</option>
                                            @foreach($activities as $activity)
                                                <option value="{{ $activity->id }}" {{ old('activity_id') == $activity->id ? 'selected' : '' }}>{{ $activity->description }}</option>
                                            @endforeach
                                        </select>
       
                                        @if ($errors->has('activity_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('activity_id') }}</strong>
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