@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">
          <!-- Page content -->
          <div class="container-fluid mt--6">
            <div class="row">
              <div class="col">
                <div class="card">
                  <!-- Card header -->
                  <div class="card-header border-0">
                      <div class="row align-items-center">
                          <div class="col-8">
                              <h3 class="mb-0">Users</h3>
                          </div>
                          <div class="col-4 text-right">
                              <a href="" class="btn btn-sm btn-primary">Add user</a>
                          </div>
                      </div>
                  </div>
                  <!-- Light table -->
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Status</th>
                          <th scope="col">Role</th>
                          <th scope="col">View</th>
                        </tr>
                      </thead>
                      <tbody class="list">
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
                              @if ($user->is_active)
                                <span class="badge badge-success">Active</span>
                              @else
                                <span class="badge badge-danger">Inactive</span>
                              @endif
                            </td>
                            <td>
                              @if($user->is_superadmin)
                                <span class="badge badge-primary">Superadmin</span>
                              @endif
                            </td>
                            <td>
                              <a href="{{ route('user.edit', $user->id) }}" class="btn btn-default" type="button">
                                View
                              </a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <!-- Card footer -->
                  <div class="card-footer">
                    <nav aria-label="...">
                      <ul class="pagination justify-content-end mb-0">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1">
                            <i class="fas fa-angle-left"></i>
                            <span class="sr-only">Previous</span>
                          </a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                          <a class="page-link" href="#">
                            <i class="fas fa-angle-right"></i>
                            <span class="sr-only">Next</span>
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush