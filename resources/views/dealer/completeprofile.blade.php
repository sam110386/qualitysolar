@extends('layouts.dealer')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Complete Your Profile') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('dealer.completeprofile_save') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('About Me*') }}</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required>
                                {{ old('description', isset($user) ? $user->description : '') }}
                                </textarea>

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name*') }}</label>

                            <div class="col-md-6">
                                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name', isset($user) ? $user->company_name : '') }}" required>

                                @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address*') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', isset($user) ? $user->address : '') }}" required>

                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="driver_license" class="col-md-4 col-form-label text-md-right">{{ __('Driver License*') }}</label>

                            <div class="col-md-6">
                                <input id="driver_license" type="file" class="form-control @error('driver_license') is-invalid @enderror" name="driver_license" required>

                                @error('driver_license')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="electrician_license" class="col-md-4 col-form-label text-md-right">{{ __('Electrician License*') }}</label>

                            <div class="col-md-6">
                                <input id="electrician_license" type="file" class="form-control @error('electrician_license') is-invalid @enderror" name="electrician_license" required>

                                @error('electrician_license')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vehicle_insurance" class="col-md-4 col-form-label text-md-right">{{ __('Vehicle Insurance*') }}</label>

                            <div class="col-md-6">
                                <input id="vehicle_insurance" type="file" class="form-control @error('vehicle_insurance') is-invalid @enderror" name="vehicle_insurance" required>

                                @error('vehicle_insurance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="liability_insurance" class="col-md-4 col-form-label text-md-right">{{ __('Liability Insurance*') }}</label>

                            <div class="col-md-6">
                                <input id="liability_insurance" type="file" class="form-control @error('liability_insurance') is-invalid @enderror" name="liability_insurance" required>

                                @error('liability_insurance')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="master_agreement" class="col-md-4 col-form-label text-md-right">{{ __('Vehya Master Agreement') }}</label>

                            <div class="col-md-6">
                                <input id="master_agreement" type="file" class="form-control @error('master_agreement') is-invalid @enderror" name="master_agreement">

                                @error('master_agreement')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="evcharger_certification" class="col-md-4 col-form-label text-md-right">{{ __('Vehya EV Charger Certification') }}</label>
                            <div class="col-md-6">
                                <input id="evcharger_certification" type="file" class="form-control @error('evcharger_certification') is-invalid @enderror" name="evcharger_certification">

                                @error('evcharger_certification')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="w9_certification" class="col-md-4 col-form-label text-md-right">{{ __('W9') }}</label>
                            <div class="col-md-6">
                                <input id="w9_certification" type="file" class="form-control @error('w9_certification') is-invalid @enderror" name="w9_certification">

                                @error('w9_certification')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ein" class="col-md-4 col-form-label text-md-right">{{ __('EIN') }}</label>
                            <div class="col-md-6">
                                <input id="ein" type="text" class="form-control @error('ein') is-invalid @enderror" name="ein" value="{{ old('ein', isset($user) ? $user->ein : '') }}">

                                @error('ein')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="poc" class="col-md-4 col-form-label text-md-right">{{ __('POC') }}</label>
                            <div class="col-md-6">
                                <input id="poc" type="text" class="form-control @error('poc') is-invalid @enderror" name="poc" value="{{ old('poc', isset($user) ? $user->poc : '') }}">

                                @error('poc')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection