<div class="container-fluid grey lighten-4">
    <div class="container">
        <section id="pricing" class="section team-section pb-5 pt-1">
            <h3 class="text-center my-5 pt-3 pb-4 dark-grey-text font-weight-bold">
                <strong>{{__('frontend.registerForEvent')}}</strong>
            </h3>
            <p class="text-center w-responsive mx-auto my-5 grey-text">{{__('frontend.registerForEventDesc')}}</p>

            <div class="row d-flex justify-content-around">
                <div class="col-md-4">
                    <div class="card card-image h-100"
                         style="background-image: url('https://mdbootstrap.com/img/Photos/Others/pricing-table%20(7).jpg');">
                        <div class="text-white text-center pricing-card d-flex align-items-center rgba-stylish-strong">
                            <div class="card-body d-flex flex-column">
                                <div class="m-5">
                                    <h1 class="font-weight-bold">{{__('auth.roleExhibitor')}}</h1>
                                </div>
                                <ul class="striped flex-grow-1">
                                    <li>
                                        <p>{{__('frontend.book')}}
                                            <strong>{{__('frontend.visa')}}</strong>
                                        </p>
                                    </li>
                                    <li>
                                        <p>{{__('frontend.book')}}
                                            <strong>{{__('frontend.equipment')}}</strong>
                                        </p>
                                    </li>
                                    <li>
                                        <p>{{__('frontend.book')}}
                                            <strong>{{__('frontend.stall')}}</strong>
                                        </p>
                                    </li>
                                    <li>
                                        <p>{{__('frontend.get')}}
                                            <strong>{{__('frontend.accommodation')}}</strong>
                                        </p>
                                    </li>
                                    <li>
                                        <p>{{__('frontend.get')}}
                                            <strong>{{__('frontend.badge')}}</strong>
                                        </p>
                                    </li>
                                </ul>
                                <a class="btn btn-indigo btn-rounded mb-4" href="{{route('register')}}">
                                    {{__('auth.register')}}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card pricing-card h-100">
                        <div class="card-body d-flex flex-column">
                            <div class="m-5">
                                <h1 class="indigo-text font-weight-bold">{{__('auth.roleVisitor')}}</h1>
                            </div>
                            <ul class="striped darker-striped py-2 my-5 flex-grow-1">
                                <li>
                                    <p>{{__('frontend.get')}}
                                        <strong>{{__('frontend.visa')}}</strong>
                                    </p>
                                </li>
                                <li>
                                    <p>{{__('frontend.get')}}
                                        <strong>{{__('frontend.accommodation')}}</strong>
                                    </p>
                                </li>
                                <li>
                                    <p>{{__('frontend.get')}}
                                        <strong>{{__('frontend.badge')}}</strong>
                                    </p>
                                </li>
                            </ul>
                            <a class="btn btn-indigo btn-rounded mb-4" href="{{route('register')}}">
                                {{__('auth.register')}}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
