@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('List of Students')
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
                            <a href="{{ route('student.create') }}" class="btn btn-primary">Add Student</a>
                        </div>
                        @if (session('status'))
                            <div class="col mt-1 alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                      </div>
                    </div>
                  </form>
                  <!-- Light table -->
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Fullname</th>
                          <th scope="col">Class</th>
                          <th scope="col">Company</th>
                          <th scope="col">Email</th>
                          <th scope="col">View</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($students) > 0)
                          @foreach($students as $student)
                            <tr>
                              <th scope="row">
                                <div class="media align-items-center">
                                  <a href="#" class="avatar rounded-circle mr-3">
                                    @if($student->photo)
                                      <img alt="Student Image" src="{{ asset('student images/'.$student->photo.'') }}">
                                    @else
                                      <img alt="Student Image" src="{{ asset('user images/user.png') }}">
                                    @endif
                                  </a>
                                  <div class="media-body">
                                    <span class="name mb-0 text-sm">{{ $student->rank->name }} {{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}</span>
                                  </div>
                                </div>
                              </th>
                              <td>
                                {{ $student->class->description }}
                              </td>
                              <td>{{ $student->company->description }}</td>
                              <td>
                                {{ $student->email }}
                              </td>
                              <td>
                                <form action="{{ route('student.destroy', $student->id) }}" method="post">
                                  @csrf
                                  @method('delete')
                                  <a href="{{ route('student.edit', $student->id) }}" class="btn btn-default" type="button">
                                    View
                                  </a>
                                  <button type="submit" class="btn btn-danger" onclick="return alert('Do you really want to archive this student?')">Archive</button>
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
                  @if (count($students) > 0)
                    <div class="card-footer">
                      {{ $students->links() }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection