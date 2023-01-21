<div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 200px;">
    <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none {{ Request::is('configuration/lights') ? 'fw-bold' : '' }}" href="/configuration/lights">
        <i class="fa-sharp fa-solid fa-lightbulb m-3"></i>
        <span class="fs-4 p-1">{{ __('configuration.nav-lights') }}</span>
    </a>
    <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none {{ Request::is('configuration/rooms') ? 'fw-bold' : '' }}" href="/configuration/rooms">
        <i class="fa-sharp fa-solid fa-door-open m-3"></i>
        <span class="fs-4">{{ __('configuration.nav-rooms') }}</span>
    </a>
    <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none {{ Request::is('configuration/zones') ? 'fw-bold' : '' }}" href="/configuration/zones">
        <i class="fa-solid fa-cubes m-3"></i>
        <span class="fs-4">{{ __('configuration.nav-zones') }}</span>
    </a>
    <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none {{ Request::is('configuration/bridges') ? 'fw-bold' : '' }}" href="/configuration/bridges">
        <i class="fa-solid fa-bridge m-3"></i>
        <span class="fs-4">{{ __('configuration.nav-bridges') }}</span>
    </a>
</div>
