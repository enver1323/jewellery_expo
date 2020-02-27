@extends('layouts.admin')
@section('content')
    <form action="{{route('admin.stallEquipment.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-6">
                @include('layouts.partials.admin.translatable', ['name' => 'name'])
            </div>
            <div class="col-12 col-lg-6">
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <h4 class="text-primary">{{__('admin.stallEquipment')}}</h4>
                    </div>
                    <div class="card-body">
                        <div class="md-form mb-4">
                            <label for="price">{{__('admin.price')}}</label>
                            <input class="browser-default custom-select" id="price" required value="{{old('price')}}"
                                    name="price" aria-describedby="priceErr" type="number">
                            @error('price')
                            <small id="priceErr" class="form-text red-text">
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