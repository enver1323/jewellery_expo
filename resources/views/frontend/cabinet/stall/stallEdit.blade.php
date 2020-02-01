@extends('layouts.cabinet')
@section('tab_content')
    <form action="{{route('cabinet.visas.store')}}" method="POST">
    @csrf
    @method('PATCH')
    <!-- Form with header -->
        <div class="card">
            <div class="card-body">
                <!-- Header -->
                <div class="form-header primary-color-dark mb-0">
                    <h3 class="font-weight-500 my-2 py-1">
                        <i class="fas fa-passport"></i> {{ sprintf('%s %s', __('frontend.update'), __('frontend.visa') )}}
                    </h3>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <div class="md-form">
                            <i class="fas fa-user prefix"></i>
                            <input type="text" id="name" class="form-control" autofocus
                                   aria-describedby="nameErr" name="name" required
                                   value="{{$visa->name}}">
                            <label for="name">{{ __('auth.yourName') }}</label>
                            @error('name')
                            <small id="nameErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-suitcase prefix"></i>
                            <input type="text" id="position" class="form-control" required
                                   aria-describedby="positionErr" name="position"
                                   value="{{$visa->position}}">
                            <label for="position">{{ __('auth.yourPosition') }}</label>
                            @error('position')
                            <small id="positionErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-globe prefix"></i>
                            <input type="text" id="address" class="form-control" required
                                   name="address" aria-describedby="addressErr"
                                   value="{{$visa->address}}">
                            <label for="address">{{ __('frontend.address') }}</label>
                            @error('address')
                            <small id="addressErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-around ">
                            <div class="custom-control custom-switch p-0">
                                <span class="mr-5">{{__('auth.genderFemale')}}</span>
                                <input name="gender" type="checkbox" aria-describedby="genderSwitchErr"
                                       class="custom-control-input" id="genderSwitch"
                                       value=1 {{$visa->isMale() ? "checked" : ''}}>
                                <label class="custom-control-label" for="genderSwitch">
                                    {{__('auth.genderMale')}}
                                </label>
                                @error('gender')
                                <small id="genderSwitchErr" class="form-text red-text">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="md-form">
                            <i class="fas fa-address-book prefix"></i>
                            <input type="text" id="embassyAddress" class="form-control" required
                                   name="embassy_address" aria-describedby="embassyAddrErr"
                                   value="{{$visa->embassy_address}}">
                            <label for="embassyAddress">{{ __('frontend.embassyAddress') }}</label>
                            @error('embassy_address')
                            <small id="embassyAddrErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-calendar-alt prefix"></i>
                            <input placeholder="{{__('frontend.selectDate')}}" type="text" id="checkIn" required
                                   name="check_in_at" class="form-control datepicker" aria-describedby="checkInErr"
                                   value="{{$visa->check_in_at->toDateString()}}">
                            <label for="checkIn">{{__('frontend.checkInDate')}}</label>
                            @error('check_in_at')
                            <small id="checkInErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-calendar-alt prefix"></i>
                            <input placeholder="{{__('frontend.selectDate')}}" type="text" id="checkOut" required
                                   name="check_out_at" class="form-control datepicker" aria-describedby="checkOutErr"
                                   value="{{$visa->check_out_at->toDateString()}}">
                            <label for="checkOut">{{__('frontend.checkOutDate')}}</label>
                            @error('check_out_at')
                            <small id="checkOutErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                    </div>
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
            new APISelect('#country', "{{route('api.ajax.countries.index')}}");
            let dateFormat = {
                "format": "yyyy-mm-dd"
            };

            $('#checkIn').pickadate(dateFormat);
            $('#checkOut').pickadate(dateFormat);
        })
    </script>
@endpush
