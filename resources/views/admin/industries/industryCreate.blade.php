@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.industries.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-6">
                @include('layouts.partials.admin.translatable', ['name' => 'name'])
            </div>
            <div class="col-12 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h4 class="text-primary">{{__('admin.industries')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="md-form mb-4">
                            <label for="parent">{{__('admin.parent')}}</label>
                            <select class="browser-default custom-select" id="parent" required
                                    name="parent_id" aria-describedby="parentErr">
                                <option selected disabled hidden>
                                    {{__('admin.root')}}
                                </option>
                            </select>
                            @error('parent_id')
                            <small id="parentErr" class="form-text red-text">
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
            new APISelect("#parent", '{{route('api.ajax.industries')}}');
        });
    </script>
@endpush
