@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                @if($errors->has('name'))
                <em class="invalid-feedback">
                    {{ $errors->first('name') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                @if($errors->has('email'))
                <em class="invalid-feedback">
                    {{ $errors->first('email') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }}">
                <label for="phone">Phone*</label>
                <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', isset($user) ? $user->phone : '') }}" required>
                @if($errors->has('phone'))
                <em class="invalid-feedback">
                    {{ $errors->first('phone') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input type="password" id="password" name="password" class="form-control">
                @if($errors->has('password'))
                <em class="invalid-feedback">
                    {{ $errors->first('password') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.password_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                <label for="description">{{ __('About Me*') }}</label>
                <textarea id="description" class="form-control @error('description') is-invalid @enderror" rows="2" cols="40" name="description" required>{!! old('description', isset($user) ? trim($user->description) : '') !!}</textarea>

                @if($errors->has('description'))
                <em class="invalid-feedback">
                    {{ $errors->first('description') }}
                </em>
                @endif
            </div>

            <div class="form-group {{ $errors->has('company_name') ? 'has-error' : '' }}">
                <label for="company_name">{{ __('Company Name*') }}</label>
                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name', isset($user) ? $user->company_name : '') }}" required>
                @if($errors->has('company_name'))
                <em class="invalid-feedback">
                    {{ $errors->first('company_name') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                <label for="address">{{ __('Address*') }}</label>
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address', isset($user) ? $user->address : '') }}" required>

                @if($errors->has('address'))
                <em class="invalid-feedback">
                    {{ $errors->first('address') }}
                </em>
                @endif
            </div>


            <div class="form-group {{ $errors->has('driver_license') ? 'has-error' : '' }}">
                <label for="driver_license">{{ __('Driver License') }}</label>
                <input id="driver_license" type="file" class="form-control @error('driver_license') is-invalid @enderror" name="driver_license">
                @if($errors->has('driver_license'))
                <em class="invalid-feedback">
                    {{ $errors->first('driver_license') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('electrician_license') ? 'has-error' : '' }}">
                <label for="electrician_license">{{ __('Electrician License') }}</label>
                <input id="electrician_license" type="file" class="form-control @error('electrician_license') is-invalid @enderror" name="electrician_license">
                @if($errors->has('electrician_license'))
                <em class="invalid-feedback">
                    {{ $errors->first('electrician_license') }}
                </em>
                @endif

            </div>
            <div class="form-group {{ $errors->has('vehicle_insurance') ? 'has-error' : '' }}">
                <label for="vehicle_insurance">{{ __('Vehicle Insurance') }}</label>
                <input id="vehicle_insurance" type="file" class="form-control @error('vehicle_insurance') is-invalid @enderror" name="vehicle_insurance">
                @if($errors->has('vehicle_insurance'))
                <em class="invalid-feedback">
                    {{ $errors->first('vehicle_insurance') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('liability_insurance') ? 'has-error' : '' }}">
                <label for="liability_insurance">{{ __('Liability Insurance') }}</label>
                <input id="liability_insurance" type="file" class="form-control @error('liability_insurance') is-invalid @enderror" name="liability_insurance">
                @if($errors->has('liability_insurance'))
                <em class="invalid-feedback">
                    {{ $errors->first('liability_insurance') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('master_agreement') ? 'has-error' : '' }}">
                <label for="master_agreement">{{ __('Vehya Master Agreement') }}</label>
                <input id="master_agreement" type="file" class="form-control @error('master_agreement') is-invalid @enderror" name="master_agreement">
                @if($errors->has('master_agreement'))
                <em class="invalid-feedback">
                    {{ $errors->first('master_agreement') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('evcharger_certification') ? 'has-error' : '' }}">
                <label for="evcharger_certification">{{ __('Vehya EV Charger Certification') }}</label>
                <input id="evcharger_certification" type="file" class="form-control @error('evcharger_certification') is-invalid @enderror" name="evcharger_certification">
                @if($errors->has('evcharger_certification'))
                <em class="invalid-feedback">
                    {{ $errors->first('evcharger_certification') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('w9_certification') ? 'has-error' : '' }}">
                <label for="w9_certification">{{ __('W9') }}</label>
                <input id="w9_certification" type="file" class="form-control @error('w9_certification') is-invalid @enderror" name="w9_certification">
                @if($errors->has('w9_certification'))
                <em class="invalid-feedback">
                    {{ $errors->first('w9_certification') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('ein') ? 'has-error' : '' }}">
                <label for="ein">{{ __('EIN') }}</label>
                <input id="ein" type="text" class="form-control @error('ein') is-invalid @enderror" name="ein" value="{{ old('ein', isset($user) ? $user->ein : '') }}">
                @if($errors->has('ein'))
                <em class="invalid-feedback">
                    {{ $errors->first('ein') }}
                </em>
                @endif
            </div>
            <div class="form-group {{ $errors->has('ein') ? 'has-error' : '' }}">
                <label for="poc">{{ __('POC') }}</label>
                <input id="poc" type="text" class="form-control @error('poc') is-invalid @enderror" name="poc" value="{{ old('poc', isset($user) ? $user->poc : '') }}">
                @if($errors->has('poc'))
                <em class="invalid-feedback">
                    {{ $errors->first('poc') }}
                </em>
                @endif
            </div>
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                <a class="btn btn-primary" href="{{ url()->previous() }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </form>

    </div>
</div>
@endsection