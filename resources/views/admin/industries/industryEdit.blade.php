@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.industries.update', $industry)}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @csrf
        <div class="row">
            <div class="col-12 col-lg-6">
                @include('layouts.partials.admin.translatable', ['name' => 'name', 'entries' => $industry->getTranslations('name')])
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
                                @if($parent = $industry->ancestors->last())
                                    <option selected value="{{$parent->id}}">
                                        {{$parent->name}}
                                    </option>
                                @else
                                    <option selected disabled hidden>
                                    {{__('admin.root')}}
                                    </option>
                                @endif
                            </select>
                            @error('parent_id')
                            <small id="parentErr" class="form-text red-text">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="{{__('admin.update')}}">
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
