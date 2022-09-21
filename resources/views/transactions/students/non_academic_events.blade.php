@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('List of Events for '.$activity->description)
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
                        <div class="col text-right">
                          <a href="{{ route('student.nonacademics', $student->id) }}" class="btn btn-danger">Back</a>
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
                          <th scope="col">Percentage</th>
                          <th scope="col">Score</th>
                          <th scope="col">Average</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($events) > 0)
                          @foreach($events as $event)
                            <tr>
                              <th scope="row">
                                <div class="media align-items-center">
                                  <div class="media-body">
                                    <span class="name mb-0 text-sm">{{ $event->name }}</span>
                                  </div>
                                </div>
                              </th>
                              <td class="budget">
                                {{ $event->description }}
                              </td>
                              <td class="budget">
                                {{ $event->percentage }}%
                              </td>
                              <td class="budget">
                                {{ $event->EventAverageScore()->pluck('score')->first() }}
                              </td>
                              <td class="budget">
                                {{ $event->EventAverageScore()->pluck('average')->first() }}
                              </td>
                              <td>
                                <div class="row text-center">
                                  @if($event->EventAverageScore()->count() >= 1)
                                    <a href="" class="btn btn-success" type="button">Edit Score</a>
                                  @else
                                    <a href="{{ route('student.nonacademiceventgrade.create', [$student->id, $event->id]) }}" class="btn btn-primary" type="button">Input Score</a>
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