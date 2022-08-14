@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
      'title' => __('List of Religion')
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
                            <a href="{{ route('religion.create') }}" class="btn btn-primary">Add Religion</a>
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
                          <th scope="col">Name</th>
                          <th scope="col">Desription</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        @if (count($religions) > 0)
                          @foreach($religions as $religion)
                            <tr>
                              <th scope="row">
                                <div class="media align-items-center">
                                  <div class="media-body">
                                    <span class="name mb-0 text-sm">{{ $religion->name }}</span>
                                  </div>
                                </div>
                              </th>
                              <td class="budget">
                                {{ $religion->description }}
                              </td>
                              <td>
                                <div class="row">
                                    <a href="{{ route('religion.edit', $religion->id) }}" class="btn btn-warning" type="button">
                                        Edit
                                      </a>
                                      <form action="{{ route('religion.destroy', $religion->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <a type="button" class="btn btn-danger" onclick="confirm('{{ __("Are you sure you want to delete this category?") }}') ? this.parentElement.submit() : ''">
                                            {{ __('Delete') }}
                                        </a>
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
                  @if (count($religions) > 0)
                    <div class="card-footer">
                      {{ $religions->links() }}
                    </div>
                  @endif
                </div>
              </div>
            </div>
          </div>

        @include('layouts.footers.auth')
    </div>
@endsection