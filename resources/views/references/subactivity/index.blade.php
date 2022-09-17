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
                        <div class="col text-right">
                            <a href="{{ route('sub-activity.create', $activity->id) }}" class="btn btn-primary">Add Sub Activity</a>
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
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($subActivities) > 0)
                          @foreach($subActivities as $subActivity)
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
                              <td>
                                <div class="row">
                                  <form action="{{ route('activity.destroy', $subActivity->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <div class="dropdown">
                                      <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                      </button>
                                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a href="{{ route('activity.edit', $subActivity->id) }}" class="dropdown-item" type="button">Edit</a>
                                        <a href="{{ route('event.subIndex', $subActivity->id) }}" class="dropdown-item" type="button">Events</a>
                                        <button type="submit" onclick="return alert('Do you really want to archive this activity?')" class="dropdown-item">Archive</button>
                                      </div>
                                    </div>
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