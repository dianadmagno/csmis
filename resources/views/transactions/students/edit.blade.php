@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Student Profile')
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-1 order-lg-2">
                            <div class="card-profile-image">
                                <a href="#">
                                    @if ($student->photo)
                                        <img src="{{ asset('student images/'.$student->photo.'') }}" class="rounded-circle">
                                    @else
                                        <img src="{{ asset('user images/user.png') }}" class="rounded-circle">
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4 mt-6">
                        <div class="text-center">
                            <div>
                                <i class="ni business_briefcase-24 mr-2"></i>{{ $student->rank->name }} {{ $student->firstname }} {{ $student->middlename }} {{ $student->lastname }}
                            </div>
                            <div class="h5">
                                <i class="ni education_hat mr-2"></i>{{ $student->enlistmentType->description }}
                            </div>
                            <hr class="my-4">
                            <form method="post" action="{{ route('user.photo', $student->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <input type="file" class="ml-5" name="photo"><br><br>
                                <div class="row ml-3">
                                    <button type="submit" name="action" value="upload" class="btn btn-success">Upload Photo</button>
                                    <button type="submit" name="action" value="remove" onclick="alert('Do you really want to delete this photo?')" class="btn btn-danger">Remove Photo</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-body">
                        <form method="post" action="{{ route('student.update', $student->id) }}">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Personal Information') }}</h6>
                            
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif


                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Lastname') }}</label>
                                            <input type="text" value="{{ old('lastname', $student->lastname) }}" name="lastname" id="input-name" class="form-control form-control-alternative{{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="{{ __('Lastname') }}" autofocus>
        
                                            @if ($errors->has('lastname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('lastname') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Firstname') }}</label>
                                            <input type="text" value="{{ old('firstname', $student->firstname) }}" name="firstname" class="form-control form-control-alternative{{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="{{ __('Firstname') }}">
        
                                            @if ($errors->has('firstname'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('firstname') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('middlename') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Middlename') }}</label>
                                            <input type="text" value="{{ old('middlename', $student->middlename) }}" name="middlename" class="form-control form-control-alternative{{ $errors->has('middlename') ? ' is-invalid' : '' }}" placeholder="{{ __('Middlename') }}">
        
                                            @if ($errors->has('middlename'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('middlename') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Email') }}</label>
                                            <input type="text" value="{{ old('email', $student->email) }}" name="email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
        
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Age') }}</label>
                                            <input type="text" value="{{ old('age', $student->age) }}" name="age" class="form-control form-control-alternative{{ $errors->has('age') ? ' is-invalid' : '' }}" placeholder="{{ __('Age') }}">
        
                                            @if ($errors->has('age'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('age') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('civil_status') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Civil Status') }}</label>
                                            <select name="civil_status" class="form-control form-control-alternative{{ $errors->has('civil_status') ? ' is-invalid' : '' }}">
                                                <option value="">Choose Civil Status</option>
                                                <option value="1">Single</option>
                                                <option value="2">Married</option>
                                                <option value="3">Widowed</option>
                                                <option value="4">Separated</option>
                                                <option value="5">Divorced</option>
                                            </select>
        
                                            @if ($errors->has('civil_status'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('civil_status') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('sex') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Sex') }}</label>
                                            <select name="sex" class="form-control form-control-alternative{{ $errors->has('sex') ? ' is-invalid' : '' }}">
                                                <option value="">Choose Sex</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                            </select>
        
                                            @if ($errors->has('sex'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('sex') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('mobile_number') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Mobile Number') }}</label>
                                            <input type="text" value="{{ old('mobile_number', $student->mobile_number) }}" name="mobile_number" class="form-control form-control-alternative{{ $errors->has('mobile_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Mobile Number') }}">
        
                                            @if ($errors->has('mobile_number'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('mobile_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Address') }}</label>
                                            <input type="text" value="{{ old('address', $student->address) }}" name="address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}">
        
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('birthdate') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Birthday') }}</label>
                                            <input type="date" value="{{ old('birthdate', $student->birthdate) }}" name="birthdate" class="form-control form-control-alternative{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" placeholder="{{ __('Birthday') }}">
        
                                            @if ($errors->has('birthdate'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('birthdate') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group{{ $errors->has('blood_type_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Blood Type') }}</label>
                                            <select name="blood_type_id" class="form-control form-control-alternative{{ $errors->has('blood_type_id') ? ' is-invalid' : '' }}">
                                                <option value="">Choose Blood Type</option>
                                                @foreach($bloodTypes as $bloodType)
                                                    <option value="{{ $bloodType->id }}" {{ $student->bloodType->id == $bloodType->id ? 'selected' : '' }}>{{ $bloodType->description }}</option>
                                                @endforeach
                                            </select>
        
                                            @if ($errors->has('blood_type_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('blood_type_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('religion_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Religion') }}</label>
                                            <select name="religion_id" class="form-control form-control-alternative{{ $errors->has('religion_id') ? ' is-invalid' : '' }}">
                                                <option value="">Choose Religion</option>
                                                @foreach($religions as $religion)
                                                    <option value="{{ $religion->id }}" {{ $student->religion->id == $religion->id ? 'selected' : '' }}>{{ $religion->description }}</option>
                                                @endforeach
                                            </select>
        
                                            @if ($errors->has('religion_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('religion_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-3">
                                <h6 class="heading-small text-muted mb-4">{{ __('Student information') }}</h6>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('rank_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Rank') }}</label>
                                            <select name="rank_id" class="form-control form-control-alternative{{ $errors->has('rank_id') ? ' is-invalid' : '' }}">
                                                <option value="">Choose Rank</option>
                                                @foreach($ranks as $rank)
                                                    <option value="{{ $rank->id }}" {{ $student->rank->id == $rank->id ? 'selected' : '' }}>{{ $rank->description }}</option>
                                                @endforeach
                                            </select>
        
                                            @if ($errors->has('rank_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('rank_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('serial_number') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Serial Number') }}</label>
                                            <input type="text" value="{{ old('serial_number', $student->serial_number) }}" name="serial_number" class="form-control form-control-alternative{{ $errors->has('serial_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Serial Number (if available)') }}">
        
                                            @if ($errors->has('serial_number'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('serial_number') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('enlistment_type_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Enlistment Type') }}</label>
                                            <select name="enlistment_type_id" class="form-control form-control-alternative{{ $errors->has('enlistment_type_id') ? ' is-invalid' : '' }}">
                                                <option value="">Choose Enlistment Type</option>
                                                @foreach($enlistmentTypes as $enlistmentType)
                                                    <option value="{{ $enlistmentType->id }}" {{ $student->enlistmentType->id == $enlistmentType->id ? 'selected' : '' }}>{{ $enlistmentType->description }}</option>
                                                @endforeach
                                            </select>
        
                                            @if ($errors->has('enlistment_type_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('enlistment_type_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('class_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Class') }}</label>
                                            <select name="class_id" class="form-control form-control-alternative{{ $errors->has('class_id') ? ' is-invalid' : '' }}">
                                                <option value="">Choose Class</option>
                                                @foreach($studentClasses as $studentClass)
                                                    <option value="{{ $studentClass->id }}" {{ $student->class->id == $studentClass->id ? 'selected' : '' }}>{{ $studentClass->description }}</option>
                                                @endforeach
                                            </select>
        
                                            @if ($errors->has('class_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('class_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('unit_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Unit') }}</label>
                                            <select name="unit_id" class="form-control form-control-alternative{{ $errors->has('unit_id') ? ' is-invalid' : '' }}">
                                                <option value="">Choose Unit</option>
                                                @foreach($units as $unit)
                                                    <option value="{{ $unit->id }}" {{ $student->unit->id == $unit->id ? 'selected' : '' }}>{{ $unit->description }}</option>
                                                @endforeach
                                            </select>
        
                                            @if ($errors->has('unit_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('unit_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('company_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Company') }}</label>
                                            <select name="company_id" class="form-control form-control-alternative{{ $errors->has('company_id') ? ' is-invalid' : '' }}">
                                                <option value="">Choose Company</option>
                                                @foreach($companies as $company)
                                                    <option value="{{ $company->id }}" {{ $student->company->id == $company->id ? 'selected' : '' }}>{{ $company->description }}</option>
                                                @endforeach
                                            </select>
        
                                            @if ($errors->has('unit_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('unit_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('bda') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('BDA Size') }}</label>
                                            <select name="bda" class="form-control form-control-alternative{{ $errors->has('bda') ? ' is-invalid' : '' }}">
                                                <option value="">Choose BDA Size</option>
                                                <option value="1" {{ $student->bda == '1' ? 'selected' : '' }}>Extra Small Short</option>
                                                <option value="2" {{ $student->bda == '2' ? 'selected' : '' }}>Extra Small Regular</option>
                                                <option value="3" {{ $student->bda == '3' ? 'selected' : '' }}>Small Short</option>
                                                <option value="4" {{ $student->bda == '4' ? 'selected' : '' }}>Small Regular</option>
                                                <option value="5" {{ $student->bda == '5' ? 'selected' : '' }}>Medium Short</option>
                                                <option value="6" {{ $student->bda == '6' ? 'selected' : '' }}>Medium Regular</option>
                                                <option value="7" {{ $student->bda == '7' ? 'selected' : '' }}>Large Short</option>
                                                <option value="8" {{ $student->bda == '8' ? 'selected' : '' }}>Large Regular</option>
                                                <option value="9" {{ $student->bda == '9' ? 'selected' : '' }}>Extra Large Short</option>
                                                <option value="10" {{ $student->bda == '10' ? 'selected' : '' }}>Extra Large Regular</option>
                                                <option value="11" {{ $student->bda == '11' ? 'selected' : '' }}>XXL Short</option>
                                                <option value="12" {{ $student->bda == '12' ? 'selected' : '' }}>XXL Regular</option>
                                            </select>
        
                                            @if ($errors->has('bda'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('bda') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group{{ $errors->has('ethnic_group_id') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Ethnic Group') }}</label>
                                            <select name="ethnic_group_id" class="form-control form-control-alternative{{ $errors->has('ethnic_group_id') ? ' is-invalid' : '' }}">
                                                <option value="">Choose Ethnic Group</option>
                                                @foreach($ethnicGroups as $ethnicGroup)
                                                    <option value="{{ $ethnicGroup->id }}" {{ $student->ethnicGroup->id == $ethnicGroup->id ? 'selected' : '' }}>{{ $ethnicGroup->description }}</option>
                                                @endforeach
                                            </select>
        
                                            @if ($errors->has('ethnic_group_id'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('ethnic_group_id') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('headgear') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Headgear Size') }}</label>
                                            <input type="text" value="{{ old('headgear', $student->headgear) }}" name="headgear" class="form-control form-control-alternative{{ $errors->has('headgear') ? ' is-invalid' : '' }}" placeholder="{{ __('Headgear Size') }}">
        
                                            @if ($errors->has('headgear'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('headgear') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('goa_chest') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('GOA Chest Size') }}</label>
                                            <input type="text" value="{{ old('goa_chest', $student->goa_chest) }}" name="goa_chest" class="form-control form-control-alternative{{ $errors->has('goa_chest') ? ' is-invalid' : '' }}" placeholder="{{ __('GOA Chest Size') }}">
        
                                            @if ($errors->has('goa_chest'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('goa_chest') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group{{ $errors->has('goa_waist') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('GOA Waist Size') }}</label>
                                            <input type="text" value="{{ old('goa_waist', $student->goa_waist) }}" name="goa_waist" class="form-control form-control-alternative{{ $errors->has('goa_waist') ? ' is-invalid' : '' }}" placeholder="{{ __('GOA Waist Size') }}">
        
                                            @if ($errors->has('goa_waist'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('goa_waist') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('shoe_size') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Shoe Size') }}</label>
                                            <input type="text" value="{{ old('shoe_size', $student->shoe_size) }}" name="shoe_size" class="form-control form-control-alternative{{ $errors->has('shoe_size') ? ' is-invalid' : '' }}" placeholder="{{ __('Shoe Size') }}">
        
                                            @if ($errors->has('shoe_size'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('shoe_size') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('shoe_width') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Shoe Width') }}</label>
                                            <input type="text" value="{{ old('shoe_width', $student->shoe_width) }}" name="shoe_width" class="form-control form-control-alternative{{ $errors->has('shoe_width') ? ' is-invalid' : '' }}" placeholder="{{ __('Shoe Width') }}">
        
                                            @if ($errors->has('shoe_width'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('shoe_width') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection
