<div class="streak streak-photo streak-long-2"
     style="background-image: url('https://mdbootstrap.com/img/Photos/Others/images/46.jpg');">
    <div class="flex-center mask rgba-indigo-strong">
        <div class="text-center white-text">
            <h2 class="font-weight-bold mb-3 pt-4 mt-4">{{mb_strtoupper(__('frontend.exhibitionComingSoon'))}}!</h2>
            <p class="font-weight-bold white-text">{{date('l d/m/Y, h:i', $expoDate)}}</p>

            <!--Grid row-->
            <div class="row mt-5 mb-5">

                <!--Grid column-->
                <div class="col-lg-4 col-md-4">
                    <hr class="white mx-5">
                    <h1 class="display-4 font-weight-bold white-text">
                        <strong>{{$days = (int) (($expoDate - time()) / 86400)}}</strong>
                    </h1>
                    <hr class="white mx-5">
                    <p class="font-weight-bold spacing">{{mb_strtoupper(__('frontend.days'))}}</p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-4">
                    <h1 class="display-4 font-weight-bold white-text rgba-white-light mx-4 py-3 mt-3">
                        <strong>{{$hours = (int) (($expoDate - time() - 86400 * $days) / 3600)}}</strong>
                    </h1>
                    <p class="font-weight-bold spacing pt-3">{{mb_strtoupper(__('frontend.hours'))}}</p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-4">
                    <hr class="white mx-5">
                    <h1 class="display-4 font-weight-bold white-text">
                        <strong>{{(int) (($expoDate - time() - $days * 86400 - $hours * 3600) / 60)}}</strong>
                    </h1>
                    <hr class="white mx-5">
                    <p class="font-weight-bold spacing">{{mb_strtoupper(__('frontend.minutes'))}}</p>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>
    </div>
</div>
