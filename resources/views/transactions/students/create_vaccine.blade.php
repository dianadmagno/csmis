@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Add Student Vaccine')
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('vaccine.store', $student->id) }}">
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
                                    <div class="form-group{{ $errors->has('vaccine_type_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Vaccine Type') }}</label>
                                        <select name="vaccine_type_id" class="form-control form-control-alternative{{ $errors->has('vaccine_type_id') ? ' is-invalid' : '' }}">
                                            <option value="">Choose Vaccine Type</option>
                                            @foreach($vaccineTypes as $vaccineType)
                                                <option value="{{ $vaccineType->id }}">{{ $vaccineType->description }}</option>
                                            @endforeach
                                        </select>
    
                                        @if ($errors->has('vaccine_type_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('vaccine_type_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('vaccine_name_id') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Vaccine Name') }}</label>
                                        <select name="vaccine_name_id" class="form-control form-control-alternative{{ $errors->has('vaccine_name_id') ? ' is-invalid' : '' }}">
                                            <option value="">Choose Vaccine Name</option>
                                            @foreach($vaccineNames as $vaccineName)
                                                <option value="{{ $vaccineName->id }}">{{ $vaccineName->description }}</option>
                                            @endforeach
                                        </select>
    
                                        @if ($errors->has('vaccine_name_id'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('vaccine_name_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('date') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Date of Vaccine') }}</label>
                                        <input type="date" value="{{ old('date') }}" name="date" class="form-control form-control-alternative{{ $errors->has('date') ? ' is-invalid' : '' }}" placeholder="{{ __('Date of Vaccine') }}">
    
                                        @if ($errors->has('date'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('place') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Place of Vaccine') }}</label>
                                        <input type="text" name="place" id="input-name" class="form-control form-control-alternative{{ $errors->has('place') ? ' is-invalid' : '' }}" placeholder="{{ __('Place of Vaccine') }}">
       
                                        @if ($errors->has('place'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('place') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('remarks') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Other Remarks') }}</label>
                                        <input type="text" name="remarks" id="input-name" class="form-control form-control-alternative{{ $errors->has('remarks') ? ' is-invalid' : '' }}" placeholder="{{ __('Other Remarks') }}">
       
                                        @if ($errors->has('remarks'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('remarks') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
                                    <a type="button" href="{{ route('student.vaccine', $student->id) }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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