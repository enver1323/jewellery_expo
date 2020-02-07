@extends('layouts.app')
@section('head')
    <link rel="stylesheet" href="{{mix('css/owlCarousel.css')}}">
@endsection
@section('header')
    <div class="owl-carousel owl-theme" id="owl">
        @foreach($slides as $slide)
            <div class="poster poster-index item view jarallax"
                 style="background-image: url('{{$slide->photo->getUrl()}}')">
                @if($slide->description)
                    <div class="rgba-black-strong mask">
                        <div class="container mask">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center rgba-black-light py-2">
                                        <h1 class="my-0"><strong>{{ $slide->description }}</strong></h1>
                                    </div>
                                    <hr class="hr-light my-4">
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
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
@push('scripts')
    <script type="text/javascript" src="{{mix('js/owlCarousel.js')}}"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            $('#owl').owlCarousel({
                loop: true,
                margin: 10,
                items: 1,
                responsiveClass: true,
            })
        });
    </script>
@endpush
