
      <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <center><h5 class="mb-0">Order of Merit of {{ $className->description }}</h5></center>
            </div>
        </div>
      </div>
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col">Nr</th>
                <th scope="col">Rank</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">GWA</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $d)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->lastname }}</td>
                    <td>{{ $d->firstname }}</td>
                    <td>{{ $d->middlename }}</td>
                    <td>{{ $d->gwa }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>