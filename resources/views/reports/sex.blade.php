
      <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <center><h5 class="mb-0">Reports of {{ $class->description }} By Sex</h5></center>
            </div>
        </div>
      </div>
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col">Sex</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sex as $s)
                <tr>
                    <td>{{ $s->sex == 1 ? 'Male' : 'Female' }}</td>
                    <td>{{ $s->total }}</td>
                </tr>
            @endforeach
        </tbody>
      </table>