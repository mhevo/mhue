<div class="row light-group-{{ $light->id }}">
    <div class="col-10 col-md-11">
        <a class="btn btn-link">{{ $light->label }}</a>
        <a class="btn btn-outline-info add-color-picker" data-bs-toggle="modal" data-bs-target="#modal-add-color-picker-{{ $light->id }}">
            {{ __('msg.color') }}
        </a>
    </div>
    <div class="col-2 col-md-1">
        @include('dashboard.light-switch-on')
        @include('dashboard.light-switch-off')
    </div>
</div>
@include('dashboard.card-header-modal-color-picker-light')
