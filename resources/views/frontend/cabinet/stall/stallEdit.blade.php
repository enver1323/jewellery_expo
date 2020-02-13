@extends('layouts.cabinet')
@section('tab_content')
    <form action="{{route('cabinet.stalls.update')}}" method="POST" enctype="multipart/form-data">
    @method("PATCH")
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
                                @foreach($stalls as $stall)
                                    <option value="{{$stall->id}}" selected>{{sprintf("%s %s - %s", __('frontend.floor'), $stall->floor, $stall->name)}}</option>
                                @endforeach
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
                <ul class="list-group list-group-horizontal-sm">
                    @foreach($documents->files as $document)
                        <li class="list-group-item">
                            <h6 class="d-inline">{{__($document->name)}}</h6>
                            <a href="{{asset($documents->path."/".$document->file.ucfirst(app()->getLocale()).".".$document->ext)}}">
                                <i class="ml-2 fas fa-download"></i>
                            </a>
                        </li>
                    @endforeach
                </ul>
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
            let equipment = new EquipmentSelect('equipmentContainer', "{{route('api.ajax.stallEquipment')}}");
            equipment.setEquipment(@json($equipment));
        })
    </script>
@endpush
