@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('Deliquency Report List')
    ])   

    <div class="container-fluid mt--7">
          <!-- Page content -->
          <div class="container-fluid mt--6">
            <div class="row">
              <div class="col">
                <div class="card">
                  <!-- Card header -->
                  <form action="{{ route('student.drIndex', $student->id) }}">
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
                          <a href="{{ route('student.drCreate', $student->id) }}" class="btn btn-primary">Add Deliquency Report</a>
                        </div>
                      </div>
                    </div>
                  </form>
                  <!-- Light table -->
                  <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col">Deliquency Report Type</th>
                          <th scope="col">Demerit Points</th>
                          <th scope="col">Remarks</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($drs) > 0)
                          @foreach($drs as $dr)
                            <tr>
                                <td>
                                  {{ $dr->dr_type }}
                                </td>
                                <td>
                                  {{ $dr->demerit_points }}
                                </td>
                                <td>
                                  {{ $dr->remarks }}
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
                  @if (count($drs) > 0)
                    <div class="card-footer">
                      {{ $drs->links() }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection