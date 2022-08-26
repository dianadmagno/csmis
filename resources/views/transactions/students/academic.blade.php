@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('Input Grades for Academic')
    ])   

    <div class="container-fluid mt--7">
          <!-- Page content -->
          <div class="container-fluid mt--6">
            <div class="row">
              <div class="col">
                <div class="card">
                  <!-- Card header -->
                  <form action="{{ route('student.index') }}">
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
                      </div>
                    </div>
                  </form>
                  <!-- Light table -->
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Subject</th>
                          <th scope="col">Nr of Points</th>
                          <th scope="col">Nr of Items</th>
                          <th scope="col">Average</th>
                          <th scope="col">Input Grade</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                          @if (count($classSubjectInstructors) > 0)
                            @foreach($classSubjectInstructors as $classSubjectInstructor)
                              <tr>
                                <td>
                                    {{ $classSubjectInstructor->subject->description }}
                                </td>
                                <td>
                                    {{ $classSubjectInstructor->subject->nr_of_points }}
                                </td>
                                <td>{{ $classSubjectInstructor->subject->nr_of_items }}</td>
                                <td>
                                    @php
                                      $studentGrade = App\Models\Transactions\StudentGrade::where('student_id', $student->id)->where('subject_id', $classSubjectInstructor->subject->id)->first();
                                    @endphp
                                    @if (isset($studentGrade))
                                      {{ $studentGrade->average }}%
                                    @endif
                                </td>
                                <td>
                                    @csrf
                                    <a href="{{ route('student.academic.input_grade', [$student->id, $classSubjectInstructor->subject_id]) }}" class="btn btn-primary">Input Grade</a>
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
                  @if (count($classSubjectInstructors) > 0)
                    <div class="card-footer">
                      {{ $classSubjectInstructors->links() }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection