@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('Assign Class to '.$personnel->rank->name.' '.$personnel->firstname.' '.$personnel->middlename.' '.$personnel->lastname.'')
    ])   

    <div class="container-fluid mt--7">
          <!-- Page content -->
          <div class="container-fluid mt--6">
            <div class="row">
              <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{ route('assign.class.store', $personnel->id) }}">
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
                                <div class="form-group{{ $errors->has('class_id') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Class') }}</label>
                                    <select name="class_id" class="form-control form-control-alternative{{ $errors->has('class_id') ? ' is-invalid' : '' }}" required>
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
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Submit') }}</button>
                                <a type="button" href="{{ route('assigned.classes', $personnel->id) }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
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