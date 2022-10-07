@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('List of Platoon of' .$class->name)
    ])   

    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
          <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                  <form action="{{ route('platoon.create', $company->id) }}">
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
                              <a href="{{ route('platoon.create', $class->id) }}" class="btn btn-primary">Add Platoon</a>
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
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($platoons) > 0)
                          @foreach($platoons as $platoon)
                            <tr>
                              <th scope="row">
                                <div class="media align-items-center">
                                  <div class="media-body">
                                    <span class="name mb-0 text-sm">{{ $platoon->platoon_name }}</span>
                                  </div>
                                </div>
                              </th>
                              <td class="budget">
                                {{ $platoon->platoon_description }}
                              </td>
                              <td class="budget">
                                {{ $platoon->company_name }}
                              </td>
                              <td>
                                <div class="row">
                                  <form action="{{ route('platoon.destroy', $platoon->platoon_id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('platoon.edit', $platoon->platoon_id) }}" class="btn btn-success" type="button">Edit</a>
                                    <a href="{{ route('squad.index', $platoon->id) }}" class="btn btn-default" type="button">Squad</a>
                                    <button type="submit" onclick="return alert('Do you really want to archive this Platoon?')" class="btn btn-danger">Archive</button>
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
                  @if (count($subModules) > 0)
                    <div class="card-footer">
                      {{ $subModules->links() }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection