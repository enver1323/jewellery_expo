@extends('layouts.cabinet')
@section('tab_content')
    <form action="{{route('cabinet.sections.update')}}" method="POST">
    @method('PATCH')
    @csrf
    <!-- Form with header -->
        <div class="card">
            <div class="card-body">
                <!-- Header -->
                <div class="form-header primary-color-dark mb-0">
                    <h3 class="font-weight-500 my-2 py-1">
                        <i class="fas fa-list"></i> {{ sprintf('%s %s', __('frontend.edit'), __('menus.productSections') )}}
                    </h3>
                </div>

                <!-- Body -->
                <div class="row my-4">
                    @foreach($industries as $industry)
                        <div class="col-12">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="section{{$loop->index}}" name="industries[]"
                                    {{$preselected->contains($industry->id) ? 'checked' : '' }} value="{{$industry->id}}">
                                <label class="custom-control-label" for="section{{$loop->index}}">
                                    {{$industry->name}}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-around">
                    <input type="submit" value="{{__('frontend.update')}}"
                           class="btn primary-color-dark btn-lg">
                </div>
            </div>
        </div>
    </form>
@endsection
