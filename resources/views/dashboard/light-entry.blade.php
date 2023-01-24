<div class="row light-group-{{ $light->id }}">
    <div class="col-10 col-md-11">
        <a class="btn btn-link">{{ $light->label }}</a>
    </div>
    <div class="col-2 col-md-1">
        @include('dashboard.light-switch-on')
        @include('dashboard.light-switch-off')
    </div>
</div>
