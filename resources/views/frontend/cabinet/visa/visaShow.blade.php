@extends('layouts.cabinet')
@section('tab_content')
    <div class="card">
        <h3 class="card-header primary-color white-text text-center">{{__('frontend.visa')}}</h3>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <h5 class="font-weight-bold">
                        {{__('frontend.name')}}:
                    </h5>
                </div>
                <div class="col-8">
                    <p class="card-text">
                        {{$visa->name}}:
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
                        {{$visa->position}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h5 class="font-weight-bold">
                        {{__('frontend.gender')}}:
                    </h5>
                </div>
                <div class="col-8">
                    <p class="card-text">
                        {{__("auth.gender".ucfirst($visa->gender))}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h5 class="font-weight-bold">
                        {{__('frontend.address')}}:
                    </h5>
                </div>
                <div class="col-8">
                    <p class="card-text">
                        {{$visa->address}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h5 class="font-weight-bold">
                        {{__('frontend.embassyAddress')}}:
                    </h5>
                </div>
                <div class="col-8">
                    <p class="card-text">
                        {{$visa->embassy_address}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h5 class="font-weight-bold">
                        {{__('frontend.checkInDate')}}:
                    </h5>
                </div>
                <div class="col-8">
                    <p class="card-text">
                        {{$visa->check_in_at->toDateString()}}
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <h5 class="font-weight-bold">
                        {{__('frontend.checkOutDate')}}:
                    </h5>
                </div>
                <div class="col-8">
                    <p class="card-text">
                        {{$visa->check_out_at->toDateString()}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
