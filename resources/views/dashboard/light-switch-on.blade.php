<a href="#" class="light-switch light-switch-on-{{ $light->id }} room-id-{{ $room->id }} text-right"
   data-light-id="{{ $light->id }}"
   data-state="on"
   @if($param['states'][$light->id]->on === 0)
       style="display: none;"
    @endif
>
    <i class="fa-regular fa-toggle-on fs-touchbutton" title="on"></i>
</a>
