@extends('layouts.cabinet')
@section('tab_content')
    <form action="{{route('cabinet.catalogues.update')}}" method="POST" enctype="multipart/form-data">
    @method("PATCH")
    @csrf
    <!-- Form with header -->
        <div class="card">
            <div class="card-body">
                <!-- Header -->
                <div class="form-header primary-color-dark mb-0">
                    <h3 class="font-weight-500 my-2 py-1">
                        <i class="fas fa-passport"></i> {{ sprintf("%s %s", __('frontend.book'), __('frontend.catalogue'))}}
                    </h3>
                </div>
                <div class="col-12">
                    <div class="md-form">
                        <p class="dark-grey-text">
                            {{sprintf("%s %s", __('frontend.book'), __('frontend.catalogue'))}}
                        </p>
                        <select class="browser-default custom-select" id="type" required name="type"
                                aria-describedby="typeErr">
                            @foreach($types as $type)
                                <option value="{{$type->name}}" {{isset($catalogue) && $catalogue->type == $type->name ? 'selected' : '' }}>
                                    {{sprintf("%s $%s",__($type->name), $type->price)}}
                                </option>
                            @endforeach
                        </select>
                        @error('type')
                        <small id="typeErr" class="form-text red-text">
                            <strong>{{ $message }}</strong>
                        </small>
                        @enderror
                    </div>
                    <div class="md-form">
                        <i class="fas fa-list prefix"></i>
                        <input type="text" id="description" class="form-control" required
                               aria-describedby="descriptionErr" name="description"
                               value="{{isset($catalogue) ? $catalogue->description : ''}}">
                        <label for="position">{{ __('admin.description') }}</label>
                        @error('description')
                        <small id="descriptionErr" class="form-text red-text">
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

    </form>
@endsection
