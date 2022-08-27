@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Update Grade for '.$studentGrade->student->rank->name.' '.$studentGrade->student->firstname.' '.$studentGrade->student->middlename.' '.$studentGrade->student->lastname)
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-body">
                            <form method="post" action="{{ route('student.academic.update', $studentGrade->id) }}">
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
                                    <div class="form-group{{ $errors->has('grade') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ $studentGrade->subject->description }}</label>
                                        <input type="number" name="grade" id="input-name" value="{{ old('grade', $studentGrade->grade) }}" class="form-control form-control-alternative{{ $errors->has('grade') ? ' is-invalid' : '' }}" placeholder="{{ __('Input Grade') }}">
       
                                        @if ($errors->has('grade'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('grade') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
                                    <a type="button" href="{{ route('student.academic', $studentGrade->student_id) }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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