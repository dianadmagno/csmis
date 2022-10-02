@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Generate Reports')
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('report.generate') }}">
                                @csrf
                                
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
    
                                <div class="col">
                                    <div class="col ">
                                        <div class="pl-lg-4">
                                            <div class="form-group{{ $errors->has('report_type') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Report Type') }}</label>
                                                <select name="report_type" class="form-control form-control-alternative{{ $errors->has('report_type') ? ' is-invalid' : '' }}">
                                                    <option value="">Choose Report Type</option>
                                                    <option value="1" {{ old('report_type') == 1 ? 'selected' : '' }}>Reports By Vaccine</option>
                                                    <option value="2" {{ old('report_type') == 2 ? 'selected' : '' }}>Reports By Ranking</option>
                                                    <option value="3" {{ old('report_type') == 3 ? 'selected' : '' }}>Reports By Ethnic Group</option>
                                                    <option value="4" {{ old('report_type') == 4 ? 'selected' : '' }}>Reports By Highest Education</option>
                                                    <option value="5" {{ old('report_type') == 5 ? 'selected' : '' }}>Reports By Course</option>
                                                    <option value="6" {{ old('report_type') == 6 ? 'selected' : '' }}>Reports By Blood Type</option>
                                                    <option value="7" {{ old('report_type') == 7 ? 'selected' : '' }}>Reports By Age</option>
                                                    <option value="8" {{ old('report_type') == 8 ? 'selected' : '' }}>Reports By Licensed</option>
                                                    <option value="9" {{ old('report_type') == 9 ? 'selected' : '' }}>Reports By Location</option>
                                                    <option value="10" {{ old('report_type') == 10 ? 'selected' : '' }}>Reports By Sex</option>
                                                    <option value="11" {{ old('report_type') == 11 ? 'selected' : '' }}>List of Students per Class</option>
                                                </select>
            
                                                @if ($errors->has('report_type'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('report_type') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('class_id') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Class') }}</label>
                                                <select name="class_id" class="form-control form-control-alternative{{ $errors->has('class_id') ? ' is-invalid' : '' }}">
                                                    <option value="">Choose Class</option>
                                                    @foreach($classes as $class)
                                                        <option value="{{ $class->id }}" {{ old('class_id') == $class->id ? 'selected' : '' }}>{{ $class->description }}</option>
                                                    @endforeach
                                                </select>
            
                                                @if ($errors->has('class_id'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('class_id') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            {{-- <div class="form-group{{ $errors->has('start_date') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Start Date') }}</label>
                                                <input type="date" value="{{ old('start_date') }}" name="start_date" class="form-control form-control-alternative{{ $errors->has('start_date') ? ' is-invalid' : '' }}" placeholder="{{ __('Start Date') }}">
            
                                                @if ($errors->has('start_date'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('start_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('end_date') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('End Date') }}</label>
                                                <input type="date" value="{{ old('end_date') }}" name="end_date" class="form-control form-control-alternative{{ $errors->has('end_date') ? ' is-invalid' : '' }}" placeholder="{{ __('End Date') }}">
            
                                                @if ($errors->has('end_date'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('end_date') }}</strong>
                                                    </span>
                                                @endif
                                            </div> --}}
                                            <button type="submit" class="btn btn-primary mt-4">{{ __('Generate') }}</button>
                                        </div>  
                                    </div>
                                </div>  
                            </form>
                        </div>
                    </div>
                    <div class="card">
                          <!-- Card header -->
                        <div class="card-body">
                            @if($report == 10)
                            @include('reports.sex')
                            @elseif($report == 9)
                            @include('reports.region')
                            @elseif($report == 3)
                            @include('reports.ethnicGroup')
                            @elseif($report == 4)
                            @include('reports.educationalAttainment')
                            @elseif($report == 6)
                            @include('reports.bloodType')
                            @elseif($report == 11)
                            @include('reports.listOfStudents')
                            @endif
                        </div>
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