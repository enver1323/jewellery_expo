@extends('layouts.app')
@section('header')
    <div id="home" class="view jarallax" data-jarallax='{"speed": 0.2}'
         style="background-image: url(https://mdbootstrap.com/img/Photos/Others/images/45.jpg); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="mask rgba-black-strong">
            <div class="container h-100 d-flex justify-content-center align-items-center">
                <div class="row smooth-scroll">
                    <div class="col-md-12 text-center white-text">
                        <div class="">
                            <h3 class="display-4 font-weight-bold mb-2 rgba-black-light py-2">Event Agency</h3>
                            <hr class="hr-light my-4">
                            <h4 class="subtext-header mt-2 mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing
                                elit. Deleniti
                                consequuntur, nihil voluptatem
                                modi.
                            </h4>
                        </div>
                        <a href="#about" data-offset="90" class="btn btn-rounded btn-pink ">
                            Visit us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- Registration section -->
    @include('frontend.index.partials.indexRegistration')
    <!-- Registration section -->

    <!-- Fair Days -->
    @include('frontend.index.partials.indexFairDays')
    <!-- Fair Days -->

    <!-- Streak -->
    @include('frontend.index.partials.indexStreak')
    <!-- Streak -->

    <!-- Contact us -->
    @include('frontend.index.partials.indexContacts')
    <!-- Contact us -->

@endsection
