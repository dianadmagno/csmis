
      <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <center><h5 class="mb-0">List of Students of Class {{ $class->description }}</h5></center>
            </div>
        </div>
      </div>
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col">Rank</th>
                <th scope="col">Last Name</th>
                <th scope="col">First Name</th>
                <th scope="col">Middle Name</th>
                <th scope="col">Mobile Number</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $d)
                <tr>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->lastname }}</td>
                    <td>{{ $d->firstname }}</td>
                    <td>{{ $d->middlename }}</td>
                    <td>{{ $d->mobile_number }}</td>
                    <td>{{ $d->email }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>