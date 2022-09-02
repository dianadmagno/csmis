@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Input Grade for '.$student->rank->name.' '.$student->firstname.' '.$student->middlename.' '.$student->lastname)
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('nonacad.store', [$student->id, $event->id]) }}">
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
                                    <div class="form-group{{ $errors->has('average') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ $event->description }}</label>
                                        <input type="number" name="average" id="input-name" class="form-control form-control-alternative{{ $errors->has('average') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Score') }}">
       
                                        @if ($errors->has('average'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('average') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
                                    <a type="button" href="{{ route('student.nonacademic', $student->id) }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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