@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('Events for '.$activity->description)
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
                        <div class="col-5">
                          @if($activity->id == 4)
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
                            <small>Total Allocation Points: <b>{{ $totalAptitudeStudent + $totalAptitudeDirector + $totalAptitudeTacO }}</b></small>
                          @else
                            <small>Total Allocation Points: <b>{{ $totalAllocatedPoints ? round($totalAllocatedPoints) : '0' }}</b></small>
                          @endif
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- Light table -->
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Event</th>
                          <th scope="col">Average</th>
                          <th scope="col">Input Score</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($events) > 0)
                          @foreach($events as $event)
                            <tr>
                                @php $nonAcademicGrade = App\Models\Transactions\NonAcademicGrade::where('event_id', $event->id)->where('student_id', $student->id)->first() @endphp
                                <td>
                                  {{ $event->description }}
                                </td>
                                <td>
                                  @if(isset($nonAcademicGrade))
                                    @if($event->id == 10)
                                      {{ $nonAcademicGrade->average * .50 }}
                                    @elseif($event->id == 11 || $event->id == 12)
                                      {{ $nonAcademicGrade->average * .25 }}
                                    @else
                                      {{ $nonAcademicGrade->average }}
                                    @endif
                                  @endif
                                </td>
                                <td>
                                  @if(!$nonAcademicGrade)
                                    <a href="{{ route('student.nonacademic.input_grade', [$student->id, $event->id]) }}" class="btn btn-primary">Input Score</a>
                                  @else
                                    <a href="" class="btn btn-success">Edit Score</a>
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