<nav class="navbar navbar-light navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">{{ __('msg.navbar-brand') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBurger" aria-controls="navbarBurger" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarBurger">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') || Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/">{{ __('msg.navlink-dashboard') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('configuration') ? 'active' : '' }}" aria-current="page" href="/configuration">{{ __('msg.navlink-configuration') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<hr class="header-end" />
