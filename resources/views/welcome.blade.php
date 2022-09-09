@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    <div class="header d-flex align-items-center py-7 py-lg-8" style="background-image: url(../images/background.jpg); background-size: cover; background-position: center;">
        <span class="mask bg-gradient-default opacity-7"></span>
        <div class="container">
            <div class="header-body text-center mt-4 mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6">
                        <img src="{{ asset('logos/scs logo.png') }}" style="width: 103px;" class="mt--3 navbar-brand-img" alt="SCS Logo">
                        <img src="{{ asset('logos/tradoc logo.png') }}" style="width: 110px;" class="mt--3 navbar-brand-img" alt="Tradoc Logo">
                        <img src="{{ asset('logos/army logo.png') }}" style="width: 103px;" class="mt--3 navbar-brand-img" alt="Army Logo"><br><br>
                        <h1 class="text-white">{{ __('CANDIDATE SOLDIER MANAGEMENT INFORMATION SYSTEM') }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
