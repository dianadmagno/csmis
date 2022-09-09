@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Update Subject')
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('subjects.update', $subject->id) }}">
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
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $subject->name) }}">
       
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Description') }}</label>
                                        <input type="text" name="description" id="input-name" class="form-control form-control-alternative{{ $errors->has('description') ? ' is-invalid' : '' }}" placeholder="{{ __('Description')}}" value="{{ old('description', $subject->description) }}">
    
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('nr_of_points') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Number of Points') }}</label>
                                        <input type="text" name="nr_of_points" id="input-name" class="form-control form-control-alternative{{ $errors->has('nr_of_points') ? ' is-invalid' : '' }}" placeholder="{{ __('Number of Points')}}" value="{{ old('nr_of_points', $subject->nr_of_points) }}">
    
                                        @if ($errors->has('nr_of_points'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nr_of_points') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('nr_of_pds') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Number of PDS') }}</label>
                                        <input type="text" name="nr_of_pds" id="input-name" class="form-control form-control-alternative{{ $errors->has('nr_of_pds') ? ' is-invalid' : '' }}" placeholder="{{ __('Number of PDS')}}" value="{{ old('nr_of_pds', $subject->nr_of_pds) }}">
    
                                        @if ($errors->has('nr_of_pds'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('nr_of_pds') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('sub_module_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Module') }}</label>
                                        <select name="sub_module_id" class="form-control form-control-alternative{{ $errors->has('module_id') ? ' is-invalid' : '' }}" value="{{ old('sub_module_id', $subject->sub_module_id) }}">
                                            <option value="">Choose Sub Module</option>
                                            @foreach($subModules as $subModule)
                                                <option value="{{ $subject->sub_module_id }}">{{ $subModule->description }}</option>
                                            @endforeach
                                        </select>
    
                                        @if ($errors->has('sub_module_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('sub_module_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
                                <a type="button" href="{{ route('subject.subIndex', $subModule->id) }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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