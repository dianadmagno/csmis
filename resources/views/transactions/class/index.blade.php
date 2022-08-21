@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('List of Classes')
    ])   

    <div class="container-fluid mt--7">
          <!-- Page content -->
          <div class="container-fluid mt--6">
            <div class="row">
              <div class="col">
                <div class="card">
                  <!-- Card header -->
                  <form action="{{ route('class.index') }}">
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
                            <a href="{{ route('class.create') }}" class="btn btn-primary">Add Class</a>
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
                          <th scope="col">Class Name</th>
                          <th scope="col">Status</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($classes) > 0)
                          @foreach($classes as $class)
                            <tr>
                              <th scope="row">
                                <div class="media align-items-center">
                                  <div class="media-body">
                                    <span class="name mb-0 text-sm">{{ $class->name }}</span>
                                  </div>
                                </div>
                              </th>
                              <td class="budget">
                                {{ $class->description }}
                              </td>
                              <td class="budget">
                                {{ $class->alias }}
                              </td>
                              <td class="budget">
                                @if($class->is_active)
                                  <span class="badge badge-primary">Active</span>
                                @else
                                  <span class="badge badge-danger">Inactive</span>
                                @endif
                              </td>
                              <td>
                                <div class="row">
                                  <form action="{{ route('class.destroy', $class->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{ route('class.edit', $class->id) }}" class="btn btn-success" type="button">Edit</a>
                                    <a href="{{ route('assigned.personnels', $class->id) }}" class="btn btn-default" type="button">Assign Personnel</a>
                                    <a href="{{ route('module.class', $class->id) }}" class="btn btn-primary" type="button">Assign Module</a>
                                    <button type="submit" onclick="return alert('Do you really want to archive this role?')" class="btn btn-danger">Archive</button>
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
                  @if (count($classes) > 0)
                    <div class="card-footer">
                      {{ $classes->links() }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection