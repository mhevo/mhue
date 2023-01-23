<a href="#" class="light-switch light-switch-on-{{ $light->id }} @if($param['states'][$light->id]->on === 1) active @endif" data-light-id="{{ $light->id }}" data-state="on">
    <i class="fa-regular fa-toggle-on"></i>
</a>
