@extends('layouts.cabinet')
@section('tab_content')
    <div class="card">
        <h3 class="card-header primary-color white-text text-center">{{__('frontend.badge')}}</h3>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <h5 class="font-weight-bold">
                        {{__('frontend.name')}}:
                    </h5>
                </div>
                <div class="col-8">
                    <p class="card-text">
                        {{$badge->name}}:
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h5 class="font-weight-bold">
                        {{__('frontend.position')}}:
                    </h5>
                </div>
                <div class="col-8">
                    <p class="card-text">
                        {{$badge->position}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h5 class="font-weight-bold">
                        {{__('frontend.approved')}}:
                    </h5>
                </div>
                <div class="col-8">
                    <p class="card-text">
                        {{$badge->isApproved() ? __('frontend.yes') : __('frontend.no')}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
