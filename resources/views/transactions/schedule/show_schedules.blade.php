@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('List of Schedules')
    ])   

    <div class="container-fluid mt--7">
          <!-- Page content -->
          <div class="container-fluid mt--6">
            <div class="row">
              <div class="col">
                <div class="card">
                  <!-- Card header -->
                  <form action="{{ route('schedule.index') }}">
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
                        <div class="col text-right">
                            <a href="{{ route('schedule.create') }}" class="btn btn-primary">Add Schedule</a>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- Light table -->
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Date/Time</th>
                          <th scope="col">Subject/Activity</th>
                          <th scope="col">Company</th>
                          <th scope="col">Uniform</th>
                          <th scope="col">Venue</th>
                          <th scope="col">Instructor</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($schedules) > 0)
                          @foreach($schedules as $schedule)
                            <tr>
                              <td>{{ $schedule->from }} {{ $schedule->to }}</td>
                              {{-- <td>{{ $schedule->description }}</td> --}}
                              <td>
                                <div class="row">
                                  <form action="{{ route('activity.destroy', $activity->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('activity.edit', $activity->id) }}" class="btn btn-success" type="button">Edit</a>
                                        <button type="submit" onclick="return alert('Do you really want to archive this activity?')" class="btn btn-danger">Archive</button>
                                    </form>
                                </div>
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
                  @if (count($schedules) > 0)
                    <div class="card-footer">
                      {{ $schedules->links() }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection