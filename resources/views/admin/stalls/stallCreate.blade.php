@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.stalls.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h4 class="text-primary">{{__('admin.stalls')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="md-form mb-4">
                            <i class="fas fa-warehouse prefix"></i>
                            <label for="name">{{ __('admin.name') }}</label>
                            <input type="text" id="name" class="form-control" autofocus
                                   aria-describedby="nameErr" name="name" required
                                   value="{{old('name')}}">
                            @error('name')
                            <small id="nameErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <div class="md-form mb-4">
                            <i class="fas fa-sort-numeric-up-alt prefix"></i>
                            <label for="floor">{{ __('frontend.floor') }}</label>
                            <input type="number" id="floor" class="form-control"
                                   aria-describedby="floorErr" name="floor" required
                                   value="{{old('floor')}}">
                            @error('floor')
                            <small id="floorErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <div class="md-form mb-4">
                            <i class="fas fa-border-all prefix"></i>
                            <label for="area">{{ __('admin.area') }}</label>
                            <input type="number" id="area" class="form-control"
                                   aria-describedby="areaErr" name="area" required
                                   value="{{old('area')}}">
                            @error('area')
                            <small id="areaErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <div class="input-group mb-4">
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
                        <div class="md-form mb-4">
                            <label for="user">{{__('admin.users')}}</label>
                            <select class="browser-default custom-select" id="user"
                                    name="user_id" aria-describedby="userErr">
                                <option selected value="">
                                    {{__('admin.vacant')}}
                                </option>
                            </select>
                            @error('user_id')
                            <small id="userErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="{{__('admin.create')}}">
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
@push('scripts')
    <script src="{{mix('js/apiSelect.js')}}"></script>
    <script type="text/javascript">
        window.addEventListener('DOMContentLoaded', function (event) {
            new APISelect('#user', "{{route('api.ajax.exhibitors')}}", 'email');
        })
    </script>
@endpush
