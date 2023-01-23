<ul class="list-group">
    <li class="list-group-item light-group-{{ $light->id }}">
        {{ $light->label }}
        @include('dashboard.light-switch-on')
        @include('dashboard.light-switch-off')
    </li>
</ul>
