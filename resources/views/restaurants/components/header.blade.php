<nav class="header-navbar navbar-expand-lg navbar navbar-fixed align-items-center navbar-shadow navbar-brand-center"
    data-nav="brand-center">
    <div class="navbar-header d-xl-block d-none">
        <ul class="nav navbar-nav">
            <li class="nav-item"><a class="navbar-brand"
                    href="{{ route('restaurant.home') }}">

                    <h2 class="brand-text mb-0">{{ Auth::user()->firstname }}</h2>
                </a>
            </li>
        </ul>
    </div>
    <div class="navbar-container d-flex content">

        <ul class="nav navbar-nav align-items-center ms-auto">

            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                    id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span
                            class="user-name fw-bolder">{{ Auth::user()->firstname }}</span><span
                            class="user-status">Restaurant</span></div>
                    <span class="avatar">
                        @if (Auth::user()->profile !== 'avatar.png')
                            <img class="round"
                                src="{{ asset('storage/avatars' . '/' . Auth::user()->profile) }}" alt="avatar"
                                height="40" width="40">
                        @else
                            <img class="round" src="{{ asset('storage/avatars/restaurant_avatar.png') }}"
                                alt="avatar" height="40" width="40">
                        @endif
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item"
                        href="{{ route('restaurant.profile') }}"><i class="me-50" data-feather="user"></i> Profile</a>
                        <a class="dropdown-item" href="{{route('resetPassword')}}"><i
                            class="me-50" data-feather="help-circle"></i> Mot de passe</a>
                    <form action="{{ route('restaurant.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item w-100"><i data-feather="power"></i>Se
                            déconnecter</button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>

<ul class="main-search-list-defaultlist-other-list d-none">
    <li class="auto-suggestion justify-content-between"><a
            class="d-flex align-items-center justify-content-between w-100 py-50">
            <div class="d-flex justify-content-start"><span class="me-75"
                    data-feather="alert-circle"></span><span>No
                    results found.</span></div>
        </a></li>
</ul>
<!-- END: Header-->
