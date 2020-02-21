<footer class="page-footer text-center text-md-left pt-0 indigo mt-5">

    <div class="container">

        <!--Grid row-->
        <div class="row pt-5 mb-3 text-center d-flex justify-content-center">

            <!--Grid column-->
            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="{{route('home')}}">{{__('frontend.home')}}</a>
                </h6>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="{{route('info.aboutFair')}}">{{__('menus.aboutFair')}}</a>
                </h6>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-2 mb-3">
                <!--Facebook-->
                <a class="p-2 m-2 fa-lg fb-ic" href="{{$links->facebook}}" target="_blank">
                    <i class="fab fa-facebook-f fa-lg white-text mr-md-4"> </i>
                </a>
                <!--Instagram-->
                <a class="p-2 m-2 fa-lg ins-ic" href="{{$links->instagram}}" target="_blank">
                    <i class="fab fa-instagram fa-lg white-text mr-md-4"> </i>
                </a>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="{{route('info.forExhibitor')}}">{{__('menus.forExhibitor')}}</a>
                </h6>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-md-2 mb-3">
                <h6 class="text-uppercase font-weight-bold">
                    <a href="{{route('info.forVisitor')}}">{{__('menus.forVisitor')}}</a>
                </h6>
            </div>
            <!--Grid column-->

        </div>

    </div>

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center dark-blue">
        <div class="container-fluid">
            © {{date('Y')}} Copyright: <a href="{{route('home')}}" target="_blank">
                UJF 2020 </a>
        </div>
    </div>
    <!--/Copyright-->

</footer>
