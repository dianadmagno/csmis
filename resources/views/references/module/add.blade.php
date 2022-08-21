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
                            <form method="post" action="{{ route('assigned.module', $class->id) }}">
                                @csrf
                                
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
    
    
                                <div class="form-group{{ $errors->has('module_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Module') }}</label>
                                        <select name="module_id" class="form-control form-control-alternative{{ $errors->has('module_id') ? ' is-invalid' : '' }}">
                                            <option value="">Choose Module</option>
                                            @foreach($modules as $module)
                                                <option value="{{ $module->id }}">{{ $module->description }}</option>
                                            @endforeach
                                        </select>
    
                                        @if ($errors->has('module_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('module_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
                                    <a type="button" href="{{ route('module.class', $class->id) }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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