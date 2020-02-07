<footer class="page-footer text-center text-md-left pt-0">

    <!--Footer Links-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">

                <div id="mdb-lightbox-ui"></div>

                <div class="mdb-lightbox no-margin text-dark">
                    @foreach($partners->files as $partner)
                        <figure class="col-md-4 partner">
                            <h6 class="text-center">
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
    <!--/Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright py-3 text-center indigo">
        <div class="container-fluid">
            © {{date('Y')}} Copyright: <a href="{{route('home')}}" target="_blank">
                UJF 2020 </a>
        </div>
    </div>
    <!--/Copyright-->

</footer>
