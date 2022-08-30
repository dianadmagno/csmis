@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('Input Grades for Non Academic')
    ])   

    <div class="container-fluid mt--7">
          <!-- Page content -->
          <div class="container-fluid mt--6">
            <div class="row">
              <div class="col">
                <div class="card">
                  <!-- Card header -->
                  <form action="{{ route('student.nonacademic', $student->id) }}">
                    <div class="card-header border-0">
                      @if (session('status'))
                        <div class="col mt-1 alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                      @endif
                      <div class="row align-items-center">
                        <div class="col-3">
                          <div class="form-group mb-0">
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                              </div>
                              <input name="keyword" class="form-control" placeholder="Search" type="text">
                            </div>
                          </div>
                        </div>
                        <div class="col-2">
                          <button type="submit" class="btn btn-default">Search</button>
                        </div>
                        <!-- <div class="col text-right">
                            <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>
                        </div> -->
                      </div>
                    </div>
                  </form>
                  <!-- Light table -->
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Event</th>
                          <th scope="col">Grades/Remarks</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($events) > 0)
                          @foreach($events as $event)
                            <tr>
                                <td>
                                    {{ $event->description }}
                                </td>
                                <td>
                                    <form action="{{ route('nonacad.store', [$student->id, $activity->id]) }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="input-group mb-6">
                                                <input name="grades" id="grades" class="form-control" placeholder="Input Grade" type="number">
                                                <!-- <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}"> -->
                                                <!-- <label class="form-control-label" for="input-name">{{ __('Sex') }}</label> -->
                                                <select name="remarks" class="form-control form-control-alternative{{ $errors->has('remarks') ? ' is-invalid' : '' }}">
                                                    <option value="">Remarks</option>
                                                    <option value="Go">Go</option>
                                                    <option value="No Go">No Go</option>
                                                </select>
            
                                                @if ($errors->has('remarks'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('remarks') }}</strong>
                                                    </span>
                                                @endif
                                            <!-- </div> -->
                                        <!-- </div> -->
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-primary"><i class="ni ni-check-bold"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                          @endforeach
                        @else
                            <tr class="text-center">
                                <td colspan="5">No Available Data</td>
                            </tr>
                        @endif
                      </tbody>
                    </table>
                  </div>
                  <!-- Card footer -->
                  @if (count($events) > 0)
                    <div class="card-footer">
                      {{ $events->links() }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection