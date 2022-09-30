
      <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <center><h5 class="mb-0">Reports of {{ $class->description }} By Ethnic Group</h5></center>
            </div>
        </div>
      </div>
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col">Highest Educational</th>
                <th scope="col">Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $d)
                <tr>
                    @foreach($d as $new)
                    <td>{{ $new }}</td>
                    {{-- <td>{{ $d->description }}</td>
                    <td>{{ $d->count }}</td> --}}
                    @endforeach
                </tr>
            @endforeach
        </tbody>
      </table>