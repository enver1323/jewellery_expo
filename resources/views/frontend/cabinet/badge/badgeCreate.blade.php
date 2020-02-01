@extends('layouts.cabinet')
@section('tab_content')
    <form action="{{route('cabinet.badges.store')}}" method="POST">
    @csrf
    <!-- Form with header -->
        <div class="card">
            <div class="card-body">
                <!-- Header -->
                <div class="form-header primary-color-dark mb-0">
                    <h3 class="font-weight-500 my-2 py-1">
                        <i class="fas fa-id-badge"></i> {{ sprintf('%s %s', __('frontend.create'), __('frontend.badge') )}}
                    </h3>
                </div>

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
                    <i class="fas fa-suitcase prefix"></i>
                    <input type="text" id="position" class="form-control" required
                           aria-describedby="positionErr" name="position"
                           value="{{$user->profile->position}}">
                    <label for="position">{{ __('auth.yourPosition') }}</label>
                    @error('position')
                    <small id="positionErr" class="form-text red-text">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
                </div>

                <div class="d-flex justify-content-around">
                    <input type="submit" value="{{__('frontend.create')}}"
                           class="btn primary-color-dark btn-lg">
                </div>

            </div>
        </div>
        <!-- Form with header -->
    </form>
@endsection
