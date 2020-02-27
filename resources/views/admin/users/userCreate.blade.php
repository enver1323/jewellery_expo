@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.users.store')}}" method="POST">
    @csrf
    <!-- Form with header -->
        <div class="card">
            <div class="card-body">
                <!-- Header -->
                <div class="form-header mb-0">
                    <h3 class="font-weight-500 my-2 py-1">
                        {{ __('auth.register') }}:
                    </h3>
                </div>

                <!-- Body -->
                <div class="row">
                    <!-- User Info -->
                    <div class="col-12 col-lg-6">
                        <div class="md-form">
                            <i class="fas fa-user prefix"></i>
                            <label for="name">{{ __('auth.yourName') }}</label>
                            <input type="text" id="name" class="form-control" autofocus
                                   aria-describedby="nameErr" name="name" required
                                   value="{{old('name')}}">
                            @error('name')
                            <small id="nameErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-envelope prefix"></i>
                            <label for="email">{{ __('auth.yourEmail') }}</label>
                            <input type="email" id="email" class="form-control"
                                   aria-describedby="emailErr" name="email" required
                                   value="{{old('email')}}">
                            @error('email')
                            <small id="emailErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-lock prefix"></i>
                            <label for="password">{{ __('auth.yourPass') }}</label>
                            <input type="password" id="password" class="form-control" required
                                   name="password" aria-describedby="passErr"
                                   value="{{old('password')}}">
                            @error('password')
                            <small id="passErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-lock prefix"></i>
                            <label for="passwordConfirm">{{ __('auth.yourPassConfirm') }}</label>
                            <input type="password" id="passwordConfirm" class="form-control"
                                   name="password_confirmation" aria-describedby="passConfirmErr"
                                   required>
                            @error('password_confirmation')
                            <small id="passConfirmErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-around ">
                            <div class="custom-control custom-switch p-0">
                                <span class="mr-5">{{__('auth.roleVisitor')}}</span>
                                <input name="role" type="checkbox" class="custom-control-input"
                                       id="roleSwitch" value=1>
                                <label class="custom-control-label" for="roleSwitch">
                                    {{__('auth.roleExhibitor')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- User Info -->

                    <!-- Profile Info -->
                    <div class="col-12 col-lg-6">
                        <div class="md-form">
                            <i class="fas fa-building prefix"></i>
                            <label for="company">{{ __('auth.yourCompany') }}</label>
                            <input type="text" id="company" class="form-control" required
                                   aria-describedby="companyErr" name="profile[company]"
                                   value="{{old('profile.company')}}">
                            @error('profile.company')
                            <small id="companyErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-suitcase prefix"></i>
                            <label for="position">{{ __('auth.yourPosition') }}</label>
                            <input type="text" id="position" class="form-control" required
                                   aria-describedby="positionErr" name="profile[position]"
                                   value="{{old('profile.position')}}">
                            @error('profile.position')
                            <small id="positionErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form mb-4">
                            <i class="fas fa-phone-alt prefix"></i>
                            <label for="phone">{{ __('auth.yourPhone') }}</label>
                            <input type="text" id="phone" class="form-control" required
                                   name="profile[phone]" aria-describedby="phoneErr"
                                   value="{{old('profile.phone')}}">
                            @error('profile.phone')
                            <small id="phoneErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <select class="browser-default custom-select" id="country" required
                                    name="profile[country_code]" aria-describedby="countryErr">
                                <option selected disabled hidden>
                                    {{__('auth.yourCountry')}}
                                </option>
                            </select>
                            @error('profile.country_code')
                            <small id="countryErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-around ">
                            <div class="custom-control custom-switch p-0">
                                <span class="mr-5">{{__('auth.genderFemale')}}</span>
                                <input name="profile[gender]" type="checkbox"
                                       class="custom-control-input" id="genderSwitch"
                                       value=1>
                                <label class="custom-control-label" for="genderSwitch">
                                    {{__('auth.genderMale')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Profile Info -->
                </div>

                <div class="d-flex justify-content-around">
                    <input type="submit" value="{{__('admin.create')}}"
                           class="btn btn-primary btn-lg">
                </div>

            </div>
        </div>
        <!-- Form with header -->
    </form>
@endsection
@push('scripts')
    <script src="{{mix('js/apiSelect.js')}}"></script>
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', function (event) {
            new APISelect('#country', "{{route('api.ajax.countries')}}");
        })
    </script>
@endpush
