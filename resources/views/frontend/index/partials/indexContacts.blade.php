<div class="container mb-5">
    <!-- Section heading -->
    <h3 class="text-center my-5 pt-3 pb-4 indigo-text font-weight-bold">
        <strong>{{__('frontend.contactUs')}}</strong>
    </h3>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-8 col-xl-9">
            <form action="{{route('comment.create')}}" method="POST">
            @csrf

            <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <div class="md-form">
                                <input type="text" id="contact-name" class="form-control" name="name">
                                <label for="contact-name" class="">{{__('auth.yourName')}}</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form">
                            <div class="md-form">
                                <input type="email" id="contact-email" class="form-control" name="email">
                                <label for="contact-email" class="">{{__('auth.yourEmail')}}</label>
                            </div>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="contact-message" class="md-textarea form-control" rows="3" name="message">
                            </textarea>
                            <label for="contact-message">{{__('auth.yourMessage')}}</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

                <div class="text-center text-md-left mt-4">
                    <input type="submit" class="btn btn-pink btn-rounded" value="{{__('frontend.send')}}">
                </div>
            </form>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4 col-xl-3">
            <ul class="text-center list-unstyled">
                <li>
                    <i class="fas fa-map-marker-alt fa-2x pink-text"></i>
                    <p>{{$contacts->place}}</p>
                </li>

                <li>
                    <i class="fas fa-phone fa-2x pink-text"></i>
                    <p>+ {{$contacts->phone->default}}</p>
                </li>

                <li>
                    <i class="fas fa-envelope fa-2x pink-text"></i>
                    <p>{{$contacts->email}}</p>
                </li>
            </ul>
        </div>
        <!--Grid column-->
    </div>
    <hr>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div id="mdb-lightbox-ui"></div>

            <div class="mdb-lightbox no-margin text-dark d-flex">
                @foreach($partners->files as $partner)
                    <figure class="col-md-4 partner d-flex flex-column">
                        <h6 class="text-center flex-grow-1">
                            {!! __($partner->name) !!}
                        </h6>
                        <div class="d-flex justify-content-center">
                            <img src="{{asset($partners->path."/".$partner->file)}}" class="mx-auto">
                        </div>
                    </figure>
                @endforeach
            </div>
        </div>
    </div>
</div>
