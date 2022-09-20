@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('List of Sub Activities for '.$activity->description)
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
                          <th scope="col">Average</th>
                          <th scope="col">Total</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($subActivities) > 0)
                          @foreach($subActivities as $subActivity)
                            @php $eventAverageScore = App\Models\Transactions\EventAverageScore::where('student_id', $student->id)
                                                        ->whereHas('subActivityEvent', function($query) use($subActivity) {
                                                          $query->where('sub_activity_id', $subActivity->id);
                                                        }) 
                            @endphp
                            <tr>
                              <th scope="row">
                                <div class="media align-items-center">
                                  <div class="media-body">
                                    <span class="name mb-0 text-sm">{{ $subActivity->name }}</span>
                                  </div>
                                </div>
                              </th>
                              <td class="budget">
                                {{ $subActivity->description }}
                              </td>
                              <td class="budget">
                                {{ $subActivity->percentage }}%
                              </td>
                              <td class="budget">
                                {{ $eventAverageScore->count() > 0 ? round($eventAverageScore->sum('score') / $eventAverageScore->count(), 0) : '' }}
                              </td>
                              <td class="budget">
                                {{ $eventAverageScore->count() > 0 ? round($eventAverageScore->sum('score') / $eventAverageScore->count() * ('.'.$subActivity->percentage), 0) : '' }}
                              </td>
                              <td>
                                <div class="row">
                                    <a href="{{ route('student.nonacademicsubactivityevents.index', [$student->id, $subActivity->id]) }}" class="btn btn-default" type="button">Events</a>
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
                  @if (count($subActivities) > 0)
                    <div class="card-footer">
                      {{ $subActivities->links() }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection