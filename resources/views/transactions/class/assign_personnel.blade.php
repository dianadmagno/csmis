@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('Assign Personnel to '.$class->description.'')
    ])   

    <div class="container-fluid mt--7">
          <!-- Page content -->
          <div class="container-fluid mt--6">
            <div class="row">
              <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('assign.personnel.store', $class->id) }}">
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
                                <div class="form-group{{ $errors->has('personnel_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Personnel') }}</label>
                                    <select name="personnel_id" class="form-control form-control-alternative{{ $errors->has('company_id') ? ' is-invalid' : '' }}" required>
                                        <option value="">Choose Personnel</option>
                                        @foreach($personnels as $personnel)
                                            <option value="{{ $personnel->id }}" {{ old('personnel') == $personnel->id ? 'selected' : '' }}>{{ $personnel->rank->name }} {{ $personnel->firstname }} {{ $personnel->middlename }} {{ $personnel->lastname }} ({{$personnel->personnelCategory->description}})</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('personnel_id'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('personnel_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
                                <a type="button" href="{{ route('assigned.personnels', $class->id) }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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