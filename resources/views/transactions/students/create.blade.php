@extends('layouts.app')

@section('content')
    @include('users.partials.header', [
        'title' => __('Add Student')
    ])
    <div class="container-fluid mt--7">
          <!-- Page content -->
        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('student.store') }}">
                                @csrf
                                
                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
    
    
                                <div class="pl-lg-4">
                                    <h6 class="heading-small text-muted mb-4">{{ __('Personal information') }}</h6>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group{{ $errors->has('lastname') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Lastname') }}</label>
                                                <input type="text" value="{{ old('lastname') }}" name="lastname" id="input-name" class="form-control form-control-alternative{{ $errors->has('lastname') ? ' is-invalid' : '' }}" placeholder="{{ __('Lastname') }}" autofocus>
            
                                                @if ($errors->has('lastname'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('lastname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('firstname') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Firstname') }}</label>
                                                <input type="text" value="{{ old('firstname') }}" name="firstname" class="form-control form-control-alternative{{ $errors->has('firstname') ? ' is-invalid' : '' }}" placeholder="{{ __('Firstname') }}">
            
                                                @if ($errors->has('firstname'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('firstname') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('middlename') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Middlename') }}</label>
                                                <input type="text" value="{{ old('middlename') }}" name="middlename" class="form-control form-control-alternative{{ $errors->has('middlename') ? ' is-invalid' : '' }}" placeholder="{{ __('Middlename') }}">
            
                                                @if ($errors->has('middlename'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('middlename') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Email') }}</label>
                                                <input type="text" value="{{ old('email') }}" name="email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
            
                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Age') }}</label>
                                                <input type="text" value="{{ old('age') }}" name="age" class="form-control form-control-alternative{{ $errors->has('age') ? ' is-invalid' : '' }}" placeholder="{{ __('Age') }}">
            
                                                @if ($errors->has('age'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('age') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group{{ $errors->has('address') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Address') }}</label>
                                                <input type="text" value="{{ old('address') }}" name="address" class="form-control form-control-alternative{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address') }}">
            
                                                @if ($errors->has('address'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('address') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('birthdate') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Birthday') }}</label>
                                                <input type="date" value="{{ old('birthdate') }}" name="birthdate" class="form-control form-control-alternative{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" placeholder="{{ __('Birthday') }}">
            
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
                                                        <option value="{{ $bloodType->id }}" {{ old('blood_type_id') == $bloodType->id ? 'selected' : '' }}>{{ $bloodType->description }}</option>
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
                                                        <option value="{{ $religion->id }}" {{ old('religion_id') == $religion->id ? 'selected' : '' }}>{{ $religion->description }}</option>
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
                                                        <option value="{{ $rank->id }}" {{ old('rank_id') == $rank->id ? 'selected' : '' }}>{{ $rank->description }}</option>
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
                                                <input type="text" value="{{ old('serial_number') }}" name="serial_number" class="form-control form-control-alternative{{ $errors->has('serial_number') ? ' is-invalid' : '' }}" placeholder="{{ __('Serial Number (if available)') }}">
            
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
                                                        <option value="{{ $enlistmentType->id }}" {{ old('enlistment_type_id') == $enlistmentType->id ? 'selected' : '' }}>{{ $enlistmentType->description }}</option>
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
                                                        <option value="{{ $studentClass->id }}" {{ old('class_id') == $studentClass->id ? 'selected' : '' }}>{{ $studentClass->description }}</option>
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
                                                        <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>{{ $unit->description }}</option>
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
                                                        <option value="{{ $company->id }}" {{ old('company_id') == $company->id ? 'selected' : '' }}>{{ $company->description }}</option>
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
                                                    <option value="1" {{ old('bda') == '1' ? 'selected' : '' }}>Extra Small Short</option>
                                                    <option value="2" {{ old('bda') == '2' ? 'selected' : '' }}>Extra Small Regular</option>
                                                    <option value="3" {{ old('bda') == '3' ? 'selected' : '' }}>Small Short</option>
                                                    <option value="4" {{ old('bda') == '4' ? 'selected' : '' }}>Small Regular</option>
                                                    <option value="5" {{ old('bda') == '5' ? 'selected' : '' }}>Medium Short</option>
                                                    <option value="6" {{ old('bda') == '6' ? 'selected' : '' }}>Medium Regular</option>
                                                    <option value="7" {{ old('bda') == '7' ? 'selected' : '' }}>Large Short</option>
                                                    <option value="8" {{ old('bda') == '8' ? 'selected' : '' }}>Large Regular</option>
                                                    <option value="9" {{ old('bda') == '9' ? 'selected' : '' }}>Extra Large Short</option>
                                                    <option value="10" {{ old('bda') == '10' ? 'selected' : '' }}>Extra Large Regular</option>
                                                    <option value="11" {{ old('bda') == '11' ? 'selected' : '' }}>XXL Short</option>
                                                    <option value="12" {{ old('bda') == '12' ? 'selected' : '' }}>XXL Regular</option>
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
                                                        <option value="{{ $ethnicGroup->id }}" {{ old('ethnic_group_id') == $ethnicGroup->id ? 'selected' : '' }}>{{ $ethnicGroup->description }}</option>
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
                                                <input type="text" value="{{ old('headgear') }}" name="headgear" class="form-control form-control-alternative{{ $errors->has('headgear') ? ' is-invalid' : '' }}" placeholder="{{ __('Headgear Size') }}">
            
                                                @if ($errors->has('headgear'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('headgear') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('goa_chest') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('GOA Chest Size') }}</label>
                                                <input type="text" value="{{ old('goa_chest') }}" name="goa_chest" class="form-control form-control-alternative{{ $errors->has('goa_chest') ? ' is-invalid' : '' }}" placeholder="{{ __('GOA Chest Size') }}">
            
                                                @if ($errors->has('goa_chest'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('goa_chest') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            
                                            <div class="form-group{{ $errors->has('goa_waist') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('GOA Waist Size') }}</label>
                                                <input type="text" value="{{ old('goa_waist') }}" name="goa_waist" class="form-control form-control-alternative{{ $errors->has('goa_waist') ? ' is-invalid' : '' }}" placeholder="{{ __('GOA Waist Size') }}">
            
                                                @if ($errors->has('goa_waist'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('goa_waist') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('shoe_size') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Shoe Size') }}</label>
                                                <input type="text" value="{{ old('shoe_size') }}" name="shoe_size" class="form-control form-control-alternative{{ $errors->has('shoe_size') ? ' is-invalid' : '' }}" placeholder="{{ __('Shoe Size') }}">
            
                                                @if ($errors->has('shoe_size'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('shoe_size') }}</strong>
                                                    </span>
                                                @endif
                                            </div>

                                            <div class="form-group{{ $errors->has('shoe_width') ? ' has-danger' : '' }}">
                                                <label class="form-control-label" for="input-name">{{ __('Shoe Width') }}</label>
                                                <input type="text" value="{{ old('shoe_width') }}" name="shoe_width" class="form-control form-control-alternative{{ $errors->has('shoe_width') ? ' is-invalid' : '' }}" placeholder="{{ __('Shoe Width') }}">
            
                                                @if ($errors->has('shoe_width'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('shoe_width') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Submit') }}</button>
                                    <a type="button" href="{{ route('student.index') }}" class="btn btn-danger mt-4">{{ __('Back') }}</a>
                                </div>
                            </form>
                        </div>
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