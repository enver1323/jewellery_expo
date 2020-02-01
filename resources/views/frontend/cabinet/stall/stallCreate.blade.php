@extends('layouts.cabinet')
@section('tab_content')
    <form action="{{route('cabinet.stalls.store')}}" method="POST">
    @csrf
    <!-- Form with header -->
        <div class="card">
            <div class="card-body">
                <!-- Header -->
                <div class="form-header primary-color-dark mb-0">
                    <h3 class="font-weight-500 my-2 py-1">
                        <i class="fas fa-passport"></i> {{ sprintf('%s %s', __('frontend.book'), __('frontend.stall') )}}
                    </h3>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="md-form">
                            <i class="fas fa-user prefix"></i>
                            <input type="number" id="number" class="form-control" autofocus
                                   aria-describedby="numberErr" name="number" required>
                            <label for="number">
                                {{ sprintf("%s %s", __('frontend.stall'), __('frontend.number')) }}
                            </label>
                            @error('number')
                            <small id="numberErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="md-form">
                            <i class="fas fa-user prefix"></i>
                            <input type="number" id="area" class="form-control" aria-describedby="areaErr" name="area"
                                   required>
                            <label for="area">
                                {{ __('frontend.area') }}
                            </label>
                            @error('area')
                            <small id="areaErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="logoDesc">{{__('frontend.update')}}</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="photo" aria-describedby="logoDesc"
                                       name="photo">
                                <label class="custom-file-label" for="photo">{{__('frontend.logo')}}</label>
                            </div>
                            @error('photo')
                            <small class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-around">
                    <input type="submit" value="{{__('frontend.create')}}"
                           class="btn primary-color-dark btn-lg">
                </div>

            </div>
        </div>

        <div class="card mt-5">
            <div class="card-body">
                <div class="form-header primary-color-dark mb-0">
                    <h3 class="font-weight-500 my-2 py-1">
                        <i class="fas fa-passport"></i> {{ sprintf('%s %s', __('frontend.floor'), __('frontend.plan') )}}
                    </h3>
                </div>
                <img src="https://picsum.photos/640/320" alt="" class="w-100">
            </div>
        </div>

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
