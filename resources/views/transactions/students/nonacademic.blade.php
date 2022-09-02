@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('List of Activities for '.$student->rank->name.' '.$student->firstname.' '.$student->middlename.' '.$student->lastname)
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
                        <!-- <div class="col text-right">
                            <a href="{{ route('activity.create') }}" class="btn btn-primary">Add Activity</a>
                        </div> -->
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
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($activities) > 0)
                          @foreach($activities as $activity)
                            <tr>
                              @php 
                                if($activity->id == 5){
                                  $totalAllocatedPoints = 120;
                                  $drs = App\Models\Transactions\StudentDeliquencyReport::where('student_id', $student->id)->get()->pluck('demerit_points'); 
                                  if(count($drs) > 0) {
                                      foreach ($drs as $key=>$value) {
                                          $totalAllocatedPoints = $totalAllocatedPoints - $value;
                                      }
                                  }
                                } else {
                                  $totalAllocatedPoints = NonAcademicGrade::where('student_id', $studId)->where('activity_id', $activityId);
                                  if($activity->id == 4) {
                                    $totalAllocatedPoints = $totalAllocatedPoints->sum('average') ? $totalAllocatedPoints->sum('average') + count($totalAllocatedPoints->get()) : '';
                                  } else {
                                    $totalAllocatedPoints = $totalAllocatedPoints->sum('average') ? $totalAllocatedPoints->sum('average') / count($totalAllocatedPoints->get()) : '';
                                  }
                                }
                                @endphp
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
                                {{ $totalAllocatedPoints }}
                              </td>
                              <td>
                                @if($activity->id == 5)
                                  <div class="row">
                                    <a href="{{ route('student.drIndex', $student->id) }}" class="btn btn-primary">Deliquency Report</a>
                                  </div>
                                @else
                                  <div class="row">
                                    <a href="{{ route('student.nonacad', [$student->id, $activity->id]) }}" class="btn btn-default" type="button">Events</a>
                                  </div>
                                @endif
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