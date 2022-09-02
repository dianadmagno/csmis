@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Dashboard')
    ])   
    
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">New Students</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $totalNewStudents }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        @if($totalNewStudents)
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> {{ $totalNewStudents / $totalPrevStudents * 100}}%</span>
                                <span class="text-nowrap">Since Last Batch</span>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Top Academic Student</h5>
                                <span class="h2 font-weight-bold mb-0">{{ $topAcademicStudent->student->rank->name }} {{ $topAcademicStudent->student->firstname }} {{ $topAcademicStudent->student->middlename }} {{ $topAcademicStudent->student->lastname }}</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        @if($totalNewStudents)
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <span class="text-nowrap">{{ App\Models\Transactions\StudentClass::find($topAcademicStudent->student->studentClasses()->latest()->pluck('class_id')->first())->description }}</span>
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="card bg-gradient-default shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-light ls-1 mb-1">Overview</h6>
                                <h2 class="text-white mb-0">Sales value</h2>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales" data-update='{"data":{"datasets":[{"data":[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}' data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Week</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <!-- Chart wrapper -->
                            <canvas id="chart-sales" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h2 class="mb-0">Total orders</h2>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Chart -->
                        <div class="chart">
                            <canvas id="chart-orders" class="chart-canvas"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-md-6 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0">New Students By Class</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Class</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Percentage</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($studentsByClasses as $studentsByClass)
                                    <tr>
                                        <td>{{ App\Models\Transactions\StudentClass::find($studentsByClass->class_id)->description }}</td>
                                        <td>{{ $studentsByClass->total }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                @php $studentsByClassPercent = $studentsByClass ? $studentsByClass->total / $totalNewStudents * 100 : '' @endphp
                                                <span class="mr-2">{{ $studentsByClassPercent }}%</span>
                                                <div>
                                                    <div class="progress">
                                                    <div class="progress-bar bg-gradient-primary" role="progressbar" aria-valuenow="{{ $studentsByClassPercent  }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $studentsByClassPercent }}%;"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0">Total Current Students By Sex</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
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
                    </div>
                </div>
            </div>
            <div class="col-sm-3 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0">Total Current Students By Religion</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Religion</th>
                                    <th scope="col">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($religions as $religion)
                                    <tr>
                                        <td>{{ App\Models\References\Religion::where('id', $religion->religion_id)->first()->description }}</td>
                                        <td>{{ $religion->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0">Squad Run By Class</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Class</th>
                                    <th scope="col">Squad</th>
                                    <th scope="col">Best Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($squadRunByClasses as $squadRunByClass)
                                    <tr>
                                        <td>{{ $squadRunByClass->studentClass->description }}</td>
                                        <td>{{ $squadRunByClass->group }}</td>
                                        <td>{{ $squadRunByClass->time }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0">Platoon Run By Class</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Class</th>
                                    <th scope="col">Platoon</th>
                                    <th scope="col">Best Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($platoonRunByClasses as $platoonRunByClass)
                                    <tr>
                                        <td>{{ $platoonRunByClass->studentClass->description }}</td>
                                        <td>{{ $platoonRunByClass->group }}</td>
                                        <td>{{ $platoonRunByClass->time }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-xl-3 mb-5 mb-xl-0">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="mb-0">Company Run By Class</h5>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Class</th>
                                    <th scope="col">Best Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($companyRunByClasses as $companyRunByClass)
                                    <tr>
                                        <td>{{ $companyRunByClass->studentClass->description }}</td>
                                        <td>{{ $companyRunByClass->time }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush