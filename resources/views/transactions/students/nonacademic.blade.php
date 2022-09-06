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
                        <div class="col-5">
                          @php
                            $totalAllocatedPoints = 0;
                            $classActivity3 = App\Models\Transactions\ClassActivity::where('class_id', $student->studentClasses()->latest()->pluck('class_id')->toArray())->where('activity_id', 3)->first();
                            $classActivity2 = App\Models\Transactions\ClassActivity::where('class_id', $student->studentClasses()->latest()->pluck('class_id')->toArray())->where('activity_id', 2)->first();
                            $classActivity1 = App\Models\Transactions\ClassActivity::where('class_id', $student->studentClasses()->latest()->pluck('class_id')->toArray())->where('activity_id', 1)->first();
                            $conduct = App\Models\Transactions\ClassActivity::where('class_id', $student->studentClasses()->latest()->pluck('class_id')->toArray())->where('activity_id', 5)->first();
                            if($conduct) {
                              $totalConductPoints = 120;
                              $drs = App\Models\Transactions\StudentDeliquencyReport::where('student_id', $student->id)->get()->pluck('demerit_points'); 
                              if(count($drs) > 0) {
                                  foreach ($drs as $key=>$value) {
                                      $totalConductPoints = $totalConductPointsz - $value;
                                  }
                              }
                            } else {
                              $totalConductPoints = 0;
                            }
                          @endphp
                          @if($classActivity3)
                            @php 
                              $activity3 = App\Models\Transactions\NonAcademicGrade::where('student_id', $student->id)->where('activity_id', 3)->sum('average');
                              $totalActivity3 = $activity3 / 3 * .50;
                              $activity2 = App\Models\Transactions\NonAcademicGrade::where('student_id', $student->id)->where('activity_id', 2)->sum('average');
                              $totalActivity2 = $activity2 / 3 * .30;
                              $activity1 = App\Models\Transactions\NonAcademicGrade::where('student_id', $student->id)->where('activity_id', 1)->sum('average');
                              $totalActivity1 = $activity1 / 3 * .20;
                              $totalActivity = $totalActivity1 + $totalActivity2 + $totalActivity3;
                            @endphp
                          @elseif($classActivity2)
                            @php 
                              $activity2 = App\Models\Transactions\NonAcademicGrade::where('student_id', $student->id)->where('activity_id', 2)->sum('average');
                              $totalActivity2 = $activity2 / 3 * .70;
                              $activity1 = App\Models\Transactions\NonAcademicGrade::where('student_id', $student->id)->where('activity_id', 1)->sum('average');
                              $totalActivity1 = $activity1 / 3 * .30;
                              $totalActivity = $totalActivity1 + $totalActivity2;
                            @endphp
                          @elseif($classActivity1)
                            @php 
                              $activity1 = App\Models\Transactions\NonAcademicGrade::where('student_id', $student->id)->where('activity_id', 1)->sum('average');
                              $totalActivity1 = $activity1 / 3 * .100;
                              $totalActivity = $totalActivity1;
                            @endphp
                          @endif
                          @php
                            $aptitude = App\Models\Transactions\NonAcademicGrade::where('student_id', $student->id)->where('activity_id', 4)->first();
                          @endphp
                          @if($aptitude)
                            @php $aptitudeStudent = App\Models\Transactions\NonAcademicGrade::where('event_id', 10)->where('student_id', $student->id)->first() @endphp
                            @php $aptitudeDirector = App\Models\Transactions\NonAcademicGrade::where('event_id', 11)->where('student_id', $student->id)->first() @endphp
                            @php $aptitudeTacO = App\Models\Transactions\NonAcademicGrade::where('event_id', 12)->where('student_id', $student->id)->first() @endphp
                            @if($aptitudeStudent)
                              @php $totalAptitudeStudent = $aptitudeStudent->average * .50 @endphp
                            @endif
                            @if($aptitudeDirector)
                              @php $totalAptitudeDirector = $aptitudeDirector->average * .25 @endphp
                            @endif
                            @if($aptitudeTacO)
                              @php $totalAptitudeTacO = $aptitudeTacO->average * .25 @endphp
                            @endif
                            @php $totalAllocatedPoints = $totalAptitudeStudent + $totalAptitudeDirector + $totalAptitudeTacO @endphp
                          @endif
                          <small>Total Non-Academic Points: <b>{{ round($totalActivity + $totalConductPoints + ($totalAllocatedPoints * .80)) }}</b></small> 
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
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($activities) > 0)
                          @foreach($activities as $activity)
                            <tr>
                              @php $totalAllocatedPoints = App\Models\Transactions\NonAcademicGrade::where('student_id', $student->id)->where('activity_id', $activity->id); @endphp
                              @if($activity->id == 5)
                                @php $totalAllocatedPoints = 120; @endphp
                                @php $drs = App\Models\Transactions\StudentDeliquencyReport::where('student_id', $student->id)->get()->pluck('demerit_points'); @endphp
                                @if(count($drs) > 0)
                                  @foreach ($drs as $key=>$value)
                                    @php $totalAllocatedPoints = $totalAllocatedPoints - $value; @endphp
                                  @endforeach
                                @endif
                              @elseif($activity->id == 4)
                                @php $aptitudeStudent = App\Models\Transactions\NonAcademicGrade::where('event_id', 10)->where('student_id', $student->id)->first() @endphp
                                @php $aptitudeDirector = App\Models\Transactions\NonAcademicGrade::where('event_id', 11)->where('student_id', $student->id)->first() @endphp
                                @php $aptitudeTacO = App\Models\Transactions\NonAcademicGrade::where('event_id', 12)->where('student_id', $student->id)->first() @endphp
                                @php $totalAptitudeStudent = 0 @endphp
                                @php $totalAptitudeDirector = 0 @endphp
                                @php $totalAptitudeTacO = 0 @endphp
                                @if($aptitudeStudent)
                                  @php $totalAptitudeStudent = $aptitudeStudent->average * .50 @endphp
                                @endif
                                @if($aptitudeDirector)
                                  @php $totalAptitudeDirector = $aptitudeDirector->average * .25 @endphp
                                @endif
                                @if($aptitudeTacO)
                                  @php $totalAptitudeTacO = $aptitudeTacO->average * .25 @endphp
                                @endif
                                @php $totalAllocatedPoints = $totalAptitudeStudent + $totalAptitudeDirector + $totalAptitudeTacO @endphp
                                @php $totalAllocatedPoints = $totalAllocatedPoints * .80 @endphp
                              @elseif($activity->id == 3)
                                @php $totalAllocatedPoints = $totalAllocatedPoints->sum('average') / 3 * .50 @endphp
                              @elseif($activity->id == 2)
                                @php $totalAllocatedPoints = $totalAllocatedPoints->sum('average') / 3 * .30 @endphp
                              @elseif($activity->id == 1)
                                @php $totalAllocatedPoints = $totalAllocatedPoints->sum('average') / 3 * .20 @endphp
                              @else
                                @php $totalAllocatedPoints = $totalAllocatedPoints->sum('average') ? $totalAllocatedPoints->sum('average') / count($totalAllocatedPoints->get()) : ''; @endphp
                              @endif
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
                                {{ $totalAllocatedPoints ? round($totalAllocatedPoints) : '' }}
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