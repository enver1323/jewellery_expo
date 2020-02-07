@extends('layouts.cabinet')
@section('tab_content')
    <form action="{{route('cabinet.update')}}" method="POST">
    @method('PATCH')
    @csrf
    <!-- Form with header -->
        <div class="card">
            <div class="card-body">
                <!-- Header -->
                <div class="form-header primary-color-dark mb-0">
                    <h3 class="font-weight-500 my-2 py-1">
                        <i class="fas fa-user"></i> {{ sprintf('%s %s', __('frontend.edit'), __('frontend.profile') )}}
                    </h3>
                </div>

                <!-- Body -->
                <div class="row">
                    <!-- User Info -->
                    <div class="col-12 col-lg-6">
                        <div class="md-form">
                            <i class="fas fa-user prefix"></i>
                            <input type="text" id="name" class="form-control" autofocus
                                   aria-describedby="nameErr" name="name" required
                                   value="{{$user->name}}">
                            <label for="name">{{ __('auth.yourName') }}</label>
                            @error('name')
                            <small id="nameErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-envelope prefix"></i>
                            <input type="email" id="email" class="form-control"
                                   aria-describedby="emailErr" name="email" required
                                   value="{{$user->email}}">
                            <label for="email">{{ __('auth.yourEmail') }}</label>
                            @error('email')
                            <small id="emailErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-lock prefix"></i>
                            <input type="password" id="password" class="form-control"
                                   name="password" aria-describedby="passErr" value="">
                            <label for="password">{{ __('auth.yourPass') }}</label>
                            @error('password')
                            <small id="passErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-lock prefix"></i>
                            <input type="password" id="passwordConfirm" class="form-control"
                                   name="password_confirmation" aria-describedby="passConfirmErr">
                            <label for="passwordConfirm">{{ __('auth.yourPassConfirm') }}</label>
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
                                       id="roleSwitch" value=1 {{$user->isExhibitor() ? 'checked' : ''}}>
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
                            <input type="text" id="company" class="form-control" required
                                   aria-describedby="companyErr" name="profile[company]"
                                   value="{{$user->profile->company}}">
                            <label for="company">{{ __('auth.yourCompany') }}</label>
                            @error('profile.company')
                            <small id="companyErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-suitcase prefix"></i>
                            <input type="text" id="position" class="form-control" required
                                   aria-describedby="positionErr" name="profile[position]"
                                   value="{{$user->profile->position}}">
                            <label for="position">{{ __('auth.yourPosition') }}</label>
                            @error('profile.position')
                            <small id="positionErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-phone-alt prefix"></i>
                            <input type="text" id="phone" class="form-control" required
                                   name="profile[phone]" aria-describedby="phoneErr"
                                   value="{{$user->profile->phone}}">
                            <label for="phone">{{ __('auth.yourPhone') }}</label>
                            @error('profile.phone')
                            <small id="phoneErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <select class="browser-default custom-select" id="country" required
                                    name="profile[country_code]" aria-describedby="countryErr">
                                <option selected value="{{$user->profile->getCountry()->id}}">
                                    {{$user->profile->country->name}}
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
                                       value=1 {{$user->profile->isMale() ? "checked" : ''}}>
                                <label class="custom-control-label" for="genderSwitch">
                                    {{__('auth.genderMale')}}
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Profile Info -->
                </div>

                <div class="d-flex justify-content-around">
                    <input type="submit" value="{{__('frontend.update')}}"
                           class="btn primary-color-dark btn-lg">
                </div>

            </div>
        </div>
        <!-- Form with header -->
    </form>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{mix('js/apiSelect.js')}}"></script>
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', function (event) {
            new APISelect('#country', "{{route('api.ajax.countries')}}");
        })
    </script>
@endpush
