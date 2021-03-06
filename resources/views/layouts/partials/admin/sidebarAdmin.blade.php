<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <div class="logo"></div>
        </div>
        <div class="sidebar-brand-text mx-1">{{ env('APP_NAME') }}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{request()->routeIs('admin.home') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{__('admin.dashboard')}}</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{__('admin.users')}}
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{request()->routeIs('admin.users*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.users.index') }}">
            <i class="fas fa-users fa-user-alt-slash"></i>
            <span>{{__('admin.users')}}</span>
        </a>
    </li>
    <li class="nav-item {{request()->routeIs('admin.industries*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.industries.index') }}">
            <i class="fas fa-cogs"></i>
            <span>{{__('admin.industries')}}</span>
        </a>
    </li>
    <li class="nav-item {{request()->routeIs('admin.comments*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.comments.index') }}">
            <i class="fas fa-envelope"></i>
            <span>{{__('admin.comments')}}</span>
        </a>
    </li>

    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        {{__('admin.system')}}
    </div>

    <li class="nav-item {{request()->routeIs('admin.stalls*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.stalls.index') }}">
            <i class="fas fa-warehouse"></i>
            <span>{{__('admin.stalls')}}</span>
        </a>
    </li>
    <li class="nav-item {{request()->routeIs('admin.stallEquipment*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.stallEquipment.index') }}">
            <i class="fas fa-list"></i>
            <span>{{__('admin.stallEquipment')}}</span>
        </a>
    </li>
    <li class="nav-item {{request()->routeIs('admin.slides*') ? 'active' : ''}}">
        <a class="nav-link" href="{{ route('admin.slides.index') }}">
            <i class="fas fa-image"></i>
            <span>{{__('admin.slides')}}</span>
        </a>
    </li>

{{--    <li class="nav-item {{request()->routeIs('admin.languages*') ? 'active' : ''}}">--}}
{{--        <a class="nav-link" href="{{ route('admin.languages.index') }}">--}}
{{--            <i class="fas fa-language"></i>--}}
{{--            <span>{{__('breadcrumbs.languages')}}</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="nav-item {{request()->routeIs('admin.slides*') ? 'active' : ''}}">--}}
{{--        <a class="nav-link" href="{{ route('admin.slides.index') }}">--}}
{{--            <i class="fas fa-image"></i>--}}
{{--            <span>{{__('breadcrumbs.slides')}}</span>--}}
{{--        </a>--}}
{{--    </li>--}}
{{--    <li class="nav-item {{request()->routeIs('admin.articles*') ? 'active' : ''}}">--}}
{{--        <a class="nav-link" href="{{ route('admin.articles.index') }}">--}}
{{--            <i class="fas fa-newspaper"></i>--}}
{{--            <span>{{__('breadcrumbs.articles')}}</span>--}}
{{--        </a>--}}
{{--    </li>--}}

{{--    <hr class="sidebar-divider">--}}
{{--    <div class="sidebar-heading">--}}
{{--        {{__('adminPanel.products')}}--}}
{{--    </div>--}}

{{--    <li class="nav-item {{request()->routeIs('admin.categories*') ? 'active' : ''}}">--}}
{{--        <a class="nav-link" href="{{ route('admin.categories.index') }}">--}}
{{--            <i class="fas fa-list"></i>--}}
{{--            <span>{{__('breadcrumbs.categories')}}</span>--}}
{{--        </a>--}}
{{--    </li>--}}

{{--    <li class="nav-item {{request()->routeIs('admin.brands*') ? 'active' : ''}}">--}}
{{--        <a class="nav-link" href="{{ route('admin.brands.index') }}">--}}
{{--            <i class="fas fa-shield-alt"></i>--}}
{{--            <span>{{__('breadcrumbs.brands')}}</span>--}}
{{--        </a>--}}
{{--    </li>--}}

{{--    <li class="nav-item {{request()->routeIs('admin.lines*') ? 'active' : ''}}">--}}
{{--        <a class="nav-link" href="{{ route('admin.lines.index') }}">--}}
{{--            <i class="fas fa-align-justify"></i>--}}
{{--            <span>{{__('breadcrumbs.lines')}}</span>--}}
{{--        </a>--}}
{{--    </li>--}}

{{--    <li class="nav-item {{request()->routeIs('admin.products*') ? 'active' : ''}}">--}}
{{--        <a class="nav-link" href="{{ route('admin.products.index') }}">--}}
{{--            <i class="fas fa-boxes"></i>--}}
{{--            <span>{{__('breadcrumbs.products')}}</span>--}}
{{--        </a>--}}
{{--    </li>--}}

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
