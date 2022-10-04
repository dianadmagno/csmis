
      <div class="card-header border-0">
        <div class="row align-items-center">
            <div class="col">
                <center><h5 class="mb-0">Count of students per class</h5></center>
            </div>
        </div>
      </div>
      <table class="table align-items-center table-flush">
        <thead class="thead-light">
            <tr>
                <th scope="col">Class</th>
                <th scope="col">Count</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $key => $d)
                <tr>
                    @foreach($d as $new)
                    <td>{{ $new }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
      </table>