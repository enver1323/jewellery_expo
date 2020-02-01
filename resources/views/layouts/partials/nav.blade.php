<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">{{__('frontend.home')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{request()->is('index') ? 'active' : ''}}">
                    <a class="nav-link waves-effect waves-light" href="#">
                        <i class="fas fa-home"></i> {{__('frontend.home')}}
                    </a>
                </li>
                @auth()
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="profileDropdown"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="fas fa-user"></i> {{__('frontend.profile')}} </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info"
                             aria-labelledby="profileDropdown">
                            <a class="dropdown-item waves-effect waves-light" href="{{route('cabinet.index')}}">
                                {{__('frontend.cabinet')}}
                            </a>
                            <form action="{{route('logout')}}" class="w-100" method="POST">
                                @csrf
                                <input type="submit" class="dropdown-item w-100"
                                       value="{{__('frontend.logout')}}">
                            </form>
                        </div>
                    </li>
                @endauth
                @guest()
                    <li class="nav-item ">
                        <a href="{{route('login')}}" class="nav-link btn-pink waves-effect waves-light">
                            {{__('auth.signIn')}}
                        </a>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>
