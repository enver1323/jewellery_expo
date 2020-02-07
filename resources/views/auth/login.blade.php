@extends('layouts.auth')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-5">
                <form action="{{route('login')}}" method="POST">
                @csrf
                <!-- Form with header -->
                    <div class="card">
                        <div class="card-body">

                            <!-- Header -->
                            <div class="form-header indigo">
                                <h3 class="font-weight-500 my-2 py-1">
                                    <i class="fas fa-user"></i> {{ __('auth.login') }}:
                                </h3>
                            </div>

                            <!-- Body -->
                            <div class="md-form">
                                <i class="fas fa-envelope prefix"></i>
                                <input type="email" id="email" class="form-control" autofocus required
                                       aria-describedby="emailErr" name="email" value="{{old('email')}}">
                                <label for="email">{{ __('auth.yourEmail') }}</label>
                                @error('email')
                                <small id="emailErr" class="form-text red-text">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                            <div class="md-form">
                                <i class="fas fa-lock prefix"></i>
                                <input type="password" id="password" class="form-control" required
                                       name="password" aria-describedby="passErr">
                                <label for="password">{{ __('auth.yourPass') }}</label>
                                @error('password')
                                <small id="passErr" class="form-text red-text">
                                    <strong>{{ $message }}</strong>
                                </small>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-around">
                                <input type="submit" value="{{__('auth.signIn')}}"
                                       class="btn btn-pink btn-lg">
                                <a href="{{route('register')}}" class="btn btn-lg btn-pink ">
                                    {{__('auth.signUp')}}
                                </a>
                            </div>

                            <hr class="my-4">

                            <div class="d-flex align-items-center justify-content-between">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                           id="rememberMe" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label grey-text-2" for="rememberMe">
                                        {{__('auth.rememberMe')}}
                                    </label>
                                </div>
                                <div>
                                    <a href="{{route('password.request')}}">{{__('auth.forgotPass')}}</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Form with header -->
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
