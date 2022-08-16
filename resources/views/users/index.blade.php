@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('List of Users')
    ])   

    <div class="container-fluid mt--7">
          <!-- Page content -->
          <div class="container-fluid mt--6">
            <div class="row">
              <div class="col">
                <div class="card">
                  <!-- Card header -->
                  <form action="{{ route('user.index') }}">
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
                            <a href="{{ route('user.create') }}" class="btn btn-primary">Add User</a>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- Light table -->
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Role</th>
                          <th scope="col">View</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($users) > 0)
                          @foreach($users as $user)
                            <tr>
                              <th scope="row">
                                <div class="media align-items-center">
                                  <a href="#" class="avatar rounded-circle mr-3">
                                    @if($user->photo)
                                      <img alt="User Image" src="{{ asset('user images/'.$user->photo.'') }}">
                                    @else
                                      <img alt="User Image" src="{{ asset('user images/user.png') }}">
                                    @endif
                                  </a>
                                  <div class="media-body">
                                    <span class="name mb-0 text-sm">{{ $user->firstname }} {{ $user->middlename }} {{ $user->lastname }}</span>
                                  </div>
                                </div>
                              </th>
                              <td class="budget">
                                {{ $user->email }}
                              </td>
                              <td>
                                @if($user->is_superadmin)
                                  <span class="badge badge-primary">Superadmin</span>
                                @elseif (count($user->userRoles) > 0)
                                @else
                                  <span class="badge badge-success">Guest</span>
                                @endif
                              </td>
                              <td>
                                <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <a href="{{ route('user.edit', $user->id) }}" class="btn btn-default" type="button">
                                    View
                                  </a>
                                  <button type="submit" class="btn btn-danger" onclick="return alert('Do you really want to deactivate this user?')">Deactivate</button>
                                </form>
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
                  @if (count($users) > 0)
                    <div class="card-footer">
                      {{ $users->links() }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection