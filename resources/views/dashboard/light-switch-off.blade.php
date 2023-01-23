<a href="#" class="light-switch light-switch-off-{{ $light->id }} @if($param['states'][$light->id]->on === 0) active @endif" data-light-id="{{ $light->id }}" data-state="off">
    <i class="fa-regular fa-toggle-off"></i>
</a>
