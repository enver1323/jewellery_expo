@extends('layouts.cabinet')
@section('tab_content')
    <form action="{{route('cabinet.badges.update', $badge)}}" method="POST">
    @method('PATCH')
    @csrf
    <!-- Form with header -->
        <div class="card">
            <div class="card-body">
                <!-- Header -->
                <div class="form-header primary-color-dark mb-0">
                    <h3 class="font-weight-500 my-2 py-1">
                        <i class="fas fa-id-badge"></i> {{ sprintf('%s %s', __('frontend.update'), __('frontend.badge') )}}
                    </h3>
                </div>

                <div class="md-form">
                    <i class="fas fa-user prefix"></i>
                    <input type="text" id="name" class="form-control" autofocus
                           aria-describedby="nameErr" name="name" required
                           value="{{$badge->name}}">
                    <label for="name">{{ __('frontend.name') }}</label>
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
                           value="{{$badge->position}}">
                    <label for="position">{{ __('frontend.position') }}</label>
                    @error('position')
                    <small id="positionErr" class="form-text red-text">
                        <strong>{{ $message }}</strong>
                    </small>
                    @enderror
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
