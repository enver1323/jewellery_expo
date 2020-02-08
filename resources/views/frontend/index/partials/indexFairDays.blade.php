<div class="container">
    <section id="features" class="section feature-box mt-5 mb-5">
        <h3 class="text-center indigo-text font-weight-bold mb-5 mt-5 pt-5">
            <strong>{{__('frontend.expoDates')}}</strong>
        </h3>
        <p class="text-center w-responsive mx-auto my-5 grey-text font-weight-bold">{{__('pages.titles.index.expoDates')}}</p>

        <div class="row features-small pt-4">
            @foreach(__('pages.index.expoDates') as $date)
                <div class="col-md-4 mb-4">
                    <div class="col-1 col-md-2 float-left">
                        <i class="far fa-calendar-alt indigo-text fa-2x"></i>
                    </div>
                    <div class="col-10 col-md-9 col-lg-10 float-right">
                        <h4 class="font-weight-bold indigo-text">
                            <strong>{{date('d.m.Y', $expoDate + $loop->index * 86400)}}</strong>
                        </h4>
                        {{--                    <h6 class="mb-3 font-weight-bold dark-grey-text">Lorem ipsum dolor sit amet</h6>--}}
                        <p class="grey-text font-small">
                            {{$date['text']}}
                        </p>
                    </div>
                </div>
        @endforeach
    </section>

</div>
