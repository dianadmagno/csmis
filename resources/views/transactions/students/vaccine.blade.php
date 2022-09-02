@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('List of Vaccines of ' .$student->firstname.' '.$student->middlename[0].' ' .$student->lastname)
    ])
    
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
          <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                  <form action="{{ route('student.vaccine', $student->id) }}">
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
                              <a href="{{ route('vaccine.create', $student->id) }}" class="btn btn-primary">Add Vaccine</a>
                          </div>
                        </div>
                      </div>
                  </form>
                  <!-- Light table -->
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Vaccine Type</th>
                          <th scope="col">Vaccine Name</th>
                          <th scope="col">Date</th>
                          <th scope="col">Place of Vaccine</th>
                          <th scope="col">Remarks</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($vaccines) > 0)
                          @foreach($vaccines as $vaccine)
                            <tr>
                              <th scope="row">
                                <div class="media align-items-center">
                                  <div class="media-body">
                                    <span class="name mb-0 text-sm">{{ $vaccine->vaccine_type }}</span>
                                  </div>
                                </div>
                              </th>
                              <td class="budget">
                                {{ $vaccine->vaccine_name }}
                              </td>
                              <td class="budget">
                                {{ $vaccine->date }}
                              </td>
                              <td class="budget">
                                {{ $vaccine->place }}
                              </td>
                              <td class="budget">
                                {{ $vaccine->remarks }}
                              </td>
                              <td>
                                <div class="row">
                                  <form action="{{ route('vaccine.destroy', $vaccine->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        {{-- <a href="{{ route('vaccine.edit', $vaccine->id) }}" class="btn btn-success" type="button">Edit</a> --}}
                                        <button type="submit" onclick="return alert('Do you really want to delete this Vaccine?')" class="btn btn-danger">Delete</button>
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
                  @if (count($vaccines) > 0)
                    <div class="card-footer">
                      {{ $vaccines->links() }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection