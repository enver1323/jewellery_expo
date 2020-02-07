@extends('layouts.cabinet')
@section('tab_content')
    <form action="{{route('cabinet.stalls.store')}}" method="POST" enctype="multipart/form-data">
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
                            <p class="dark-grey-text">
                                {{sprintf("%s %s", __('frontend.book'), __('frontend.stall'))}}
                            </p>
                            <select class="browser-default custom-select" id="stalls" required
                                    name="stalls[]" aria-describedby="stallsErr" multiple>
                            </select>
                            @error('stalls')
                            <small id="stallsErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>

                        <div id="equipmentContainer">
                        </div>

                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="logoDesc">{{__('frontend.upload')}}</span>
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
                    <input type="submit" value="{{__('frontend.book')}}"
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
    <script type="text/javascript" src="{{mix('js/equipmentSelect.js')}}"></script>
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', function (event) {
            let stalls = new APISelect('#stalls', "{{route('api.ajax.stalls')}}");
            new EquipmentSelect('equipmentContainer', "{{route('api.ajax.stallEquipment')}}");
        })
    </script>
@endpush
