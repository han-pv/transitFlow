<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/admin') }}">
            <img src="{{ asset('images/Logistics/Logo.png') }}" class="img-fluid" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <!-- <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ url('/admin') }}">@lang('app.home')</a>
                </li> -->
                @can('blogs')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('admin.blogs.*') ? "link-warning" : ""}}" href="{{ route('admin.blogs.index') }}"><i class="ph ph-note"></i> @lang('app.blogs')</a>
                    </li>
                @endcan
                @can('team-members')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('admin.team-members.*') ? "link-warning" : ""}}" href="{{ route('admin.team-members.index') }}"><i class="ph ph-users-four"></i> @lang('app.teamMembers')</a>
                    </li>
                @endcan
                @can('testimonials')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('admin.testimonials.*') ? "link-warning" : ""}}" href="{{ route('admin.testimonials.index') }}"><i class="ph ph-chat"></i> @lang('app.testimonials')</a>
                    </li>
                @endcan
                @can('banners')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('admin.banners.*') ? "link-warning" : ""}}" href="{{ route('admin.banners.index') }}"><i class="ph ph-panorama"></i> @lang('app.banners')</a>
                    </li>
                @endcan
                @can('gallery')
                <li class="nav-item">
                    <a class="nav-link {{ Request::routeIs('admin.gallery.*') ? "link-warning" : ""}}" href="{{ route('admin.gallery.index') }}"><i class="ph ph-image"></i> @lang('app.gallery')</a>
                </li>
                @endcan
                @can('about')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('admin.about.*') ? "link-warning" : ""}}" href="{{ route('admin.about.index') }}"><i class="ph ph-building-office"></i> @lang('app.about')</a>
                    </li>
                @endcan
                @can('users')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('admin.users.*') ? "link-warning" : ""}}" href="{{ route('admin.users.index') }}"><i class="ph ph-users"></i> @lang('app.users')</a>
                    </li>
                @endcan
            </ul>
            <ul class="navbar-nav ms-auto">
            @can('contacts')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::routeIs('admin.contacts.*') ? "link-warning" : ""}}" href="{{ route('admin.contacts.index') }}"><i class="ph ph-envelope-open"></i> @lang('app.contacts')</a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout').submit();">
                        <i class="ph ph-arrow-square-out"></i> Logout
                    </a>
                    <form method="POST" action="{{ route('logout') }}" id="logout">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>