@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Add Deliquency Report')
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('student.drStore', $student->id) }}">
                                @csrf
                                
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                    <div class="form-group{{ $errors->has('dr_type') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Demerit Type') }}</label>
                                        <input type="text" name="dr_type" id="input-name" class="form-control form-control-alternative{{ $errors->has('dr_type') ? ' is-invalid' : '' }}" placeholder="{{ __('Demerit Type') }}">
       
                                        @if ($errors->has('dr_type'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('dr_type') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('demerit_points') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Demerit Points') }}</label>
                                        <input type="number" name="demerit_points" id="input-name" class="form-control form-control-alternative{{ $errors->has('demerit_points') ? ' is-invalid' : '' }}" placeholder="{{ __('Demerit Points') }}">
       
                                        @if ($errors->has('demerit_points'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('demerit_points') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('remarks') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Remarks') }}</label>
                                        <input type="text" name="remarks" id="input-name" class="form-control form-control-alternative{{ $errors->has('remarks') ? ' is-invalid' : '' }}" placeholder="{{ __('Remarks') }}">
       
                                        @if ($errors->has('remarks'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('remarks') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
                                    <a type="button" href="{{ route('student.drIndex', $student->id) }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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