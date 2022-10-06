@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('List of Non Academic Activities for '.$student->rank->name.' '.$student->firstname.' '.$student->middlename.' '.$student->lastname)
    ])   

    <div class="container-fluid mt--7">
          <!-- Page content -->
          <div class="container-fluid mt--6">
            <div class="row">
              <div class="col">
                <div class="card">
                  <!-- Card header -->
                  <form action="{{ route('activity.index') }}">
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
                        <div class="col-5">
                          <small>Total Non-Academic Points: <b>{{ $totalPoints }} / 300</b></small> 
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- Light table -->
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Description</th>
                          <th scope="col">Allocated Points</th>
                          <th scope="col">Average</th>
                          <th scope="col">Total Points</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($activities) > 0)
                          @foreach($activities as $activity)
                            <tr>
                              <th scope="row">
                                <div class="media align-items-center">
                                  <div class="media-body">
                                    <span class="name mb-0 text-sm">{{ $activity->name }}</span>
                                  </div>
                                </div>
                              </th>
                              <td class="budget">
                                {{ $activity->description }}
                              </td>
                              <td class="budget">
                                {{ $activity->nr_of_points }}
                              </td>
                              <td class="budget">
                                {{ $activity->activityAverage ? $activity->activityAverage->average : '' }}
                                @if($activity->id == 1)
                                  100
                                @endif
                              </td>
                              <td class="budget">
                                {{ $activity->activityAverage ? $activity->activityAverage->total_points : '' }}
                                @if($activity->id == 1)
                                  {{ $activity->nr_of_points }}
                                @endif
                              </td>
                              <td>
                                <div class="text-center">
                                  @if($activity->id == 1)
                                    <a href="{{ route('student.drIndex', $student->id) }}" class="btn btn-warning" type="button">Demerit Report</a>
                                  @elseif($activity->has_sub_activities)
                                    <a href="{{ route('student.nonacademicsubactivity.index', [$student->id, $activity->id]) }}" class="btn btn-primary" type="button">Sub Activity</a>
                                  @else
                                    <a href="{{ route('student.nonacademics.events', [$student->id, $activity->id]) }}" class="btn btn-default" type="button">Events</a>
                                  @endif
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
                  @if (count($activities) > 0)
                    <div class="card-footer">
                      {{ $activities->links() }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection