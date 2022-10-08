@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('Audit Logs')
    ])   

    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
          <div class="row">
            <div class="col">
                <div class="card">
                    <!-- Card header -->
                  <form action="{{ route('unit.index') }}">
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
                    <table class="table align-items-center table-flush" >
                    <thead class="thead-light">
                      <tr>
                        <th scope="col">Model</th>
                        <th scope="col">Action</th>
                        <th scope="col">User</th>
                        <th scope="col">Time</th>
                        <th scope="col">Old Values</th>
                        <th scope="col">New Values</th>
                      </tr>
                    </thead>
                    <tbody id="audits">
                      @foreach($audits as $audit)
                        <tr>
                          <td>{{ $audit->auditable_type }} (id: {{ $audit->auditable_id }})</td>
                          <td>{{ $audit->event }}</td>
                          <td>{{ $audit->user->lastname }}</td>
                          <td>{{ $audit->created_at }}</td>
                          <td>
                            <table class="table align-items-center table-flush">
                              @foreach($audit->old_values as $attribute => $value)
                                <tr>
                                  <td><b>{{ $attribute }}</b></td>
                                  <td>{{ $value }}</td>
                                </tr>
                              @endforeach
                            </table>
                          </td>
                          <td>
                            <table class="table align-items-center table-flush">
                              @foreach($audit->new_values as $attribute => $value)
                                <tr>
                                  <td><b>{{ $attribute }}</b></td>
                                  <td>{{ $value }}</td>
                                </tr>
                              @endforeach
                            </table>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
              
                </div>
              
       
                  </div>
                  <!-- Card footer -->
                  @if (count($audits) > 0)
                    <div class="card-footer">
                      {{-- {{ $audits->links() }} --}}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection