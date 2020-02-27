<nav class="navbar navbar-expand-lg navbar-dark fixed-top indigo">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">
            <img src="{{asset('images/logo.png')}}" height="45" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav"
                aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{request()->routeIs('home') ? 'active' : ''}}">
                    <a class="nav-link waves-effect waves-light" href="{{route('home')}}">
                        <i class="fas fa-home"></i> {{__('frontend.home')}}
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" id="profileDropdown"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-info"></i> {{__('menus.fairInfo')}} </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info"
                         aria-labelledby="profileDropdown">
                        <a class="dropdown-item waves-effect waves-light" href="{{route('info.aboutFair')}}">
                            <i class="fas fa-info"></i> {{__('menus.aboutFair')}}
                        </a>
                        <a class="dropdown-item waves-effect waves-light" href="{{route('info.productSections')}}">
                            <i class="fas fa-list"></i> {{__('menus.productSections')}}
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" id="profileDropdown"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-warehouse"></i> {{__('menus.forExhibitor')}} </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info"
                         aria-labelledby="profileDropdown">
                        <a class="dropdown-item waves-effect waves-light" href="{{route('info.forExhibitor')}}">
                            <i class="fas fa-shoe-prints"></i> {{__('menus.forExhibitorSteps')}}
                        </a>
                        <a class="dropdown-item waves-effect waves-light" href="{{route('info.forExhibitor')}}#stallEquipment">
                            <i class="fas fa-list"></i> {{__('menus.equipmentList')}}
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle waves-effect waves-light" id="profileDropdown"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <i class="fas fa-users"></i> {{__('menus.forVisitor')}} </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-info"
                         aria-labelledby="profileDropdown">
                        <a class="dropdown-item waves-effect waves-light" href="{{route('info.forVisitor')}}">
                            <i class="fas fa-shoe-prints"></i> {{__('menus.forVisitorSteps')}}
                        </a>
                        <a class="dropdown-item waves-effect waves-light" href="{{route('info.exhibitorList')}}">
                            <i class="fas fa-list"></i> {{__('menus.exhibitorList')}}
                        </a>
                    </div>
                </li>
                @auth()
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="profileDropdown"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            <i class="fas fa-user"></i> {{__('frontend.cabinet')}} </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-info"
                             aria-labelledby="profileDropdown">
                            <a class="dropdown-item waves-effect waves-light" href="{{route('cabinet.profile')}}">
                                {{__('frontend.cabinet')}}
                            </a>
                            @admin
                            <a class="dropdown-item waves-effect waves-light" href="{{route('admin.home')}}">
                                {{__('auth.roleAdmin')}}
                            </a>
                            @endadmin
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
                <li class="nav-item dropdown my-auto">
                    <a class="nav-link" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                       aria-expanded="false"><i class="fa fa-language"></i> {{ mb_strtoupper(LaravelLocalization::getCurrentLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-center" aria-labelledby="navbarDropdownMenuLink">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item text-center"
                               href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        @endforeach
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
