@extends('layouts.app')
@section('header')
    <div class="poster poster-sm poster-cabinet">
        <div class="container">
            <div class="row page-title">
                <h1>
                    {{sprintf("%s %s", __('frontend.personal'),__('frontend.cabinet'))}}
                </h1>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="container">
        <div class="row d-flex flex-lg-row-reverse my-5">
            @if(count($errors->getBags()))
                <div class="mb-5 col-12">
                    @foreach ($errors->getBags() as $type => $error)
                        <div class="alert alert-{{$type}} alert-dismissible" role="alert">
                            {{ $errors->$type->first() }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="col-lg-4 col-12">
                <div class="cabinet-sidebar">
                    <hr>
                    <ul class="nav md-pills pills-primary flex-column" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('cabinet.profile') ? 'active' : ''}}"
                               href="{{route('cabinet.profile')}}">
                                {{__('frontend.profile')}}<i class="fa fa-user ml-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('cabinet.sections*') ? 'active' : ''}}"
                               href="{{route('cabinet.sections.edit')}}">
                                {{__('menus.productSections')}}<i class="fa fa-list ml-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('cabinet.badges*') ? 'active' : ''}}"
                               href="{{route('cabinet.badges.index')}}">
                                {{sprintf("%s %s", __('frontend.create'), __('frontend.badge'))}}
                                <i class="fas fa-id-badge ml-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('cabinet.visas*') ? 'active' : ''}}"
                               href="{{route('cabinet.visas.index')}}">
                                {{__('frontend.visa')}}
                                <i class="fas fa-passport ml-2"></i>
                            </a>
                        </li>
                        @exhibitor
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('cabinet.stalls*') ? 'active' : ''}}"
                               href="{{route('cabinet.stalls.edit')}}">
                                {{sprintf("%s %s", __('frontend.book'), __('frontend.stall'))}}
                                <i class="fas fa-warehouse ml-2"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{request()->routeIs('cabinet.catalogues*') ? 'active' : ''}}"
                               href="{{route('cabinet.catalogues.edit')}}">
                                {{sprintf("%s %s", __('frontend.book'), __('frontend.catalogue'))}}
                                <i class="fas fa-book ml-2"></i>
                            </a>
                        </li>
                        @endexhibitor
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col-lg-8 col-12">
                @yield('tab_content')
            </div>
        </div>
    </div>
@endsection
