@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Terminate '.$student->rank->name.' '.$student->firstname.' '.$student->middlename.' '.$student->lastname)
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('student.terminate.store', $student->id) }}">
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
                                    <div class="form-group{{ $errors->has('termination_remarks') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Remarks for Termination') }}</label>
                                        <textarea name="termination_remarks" rows="10" class="form-control" required></textarea>
       
                                        @if ($errors->has('termination_remarks'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('termination_remarks') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Terminate Student') }}</button>
                                    <a type="button" href="{{ route('student.index') }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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