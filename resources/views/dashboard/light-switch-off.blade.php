<a class="light-switch light-switch-off-{{ $light->id }} room-id-{{ $room->id }} text-right pointer"
   data-light-id="{{ $light->id }}" data-state="off"
   @if($param['states'][$light->id]->on === 1) style="display: none;" @endif >
    <i class="fa-regular fa-toggle-off fs-touchbutton" title="off"></i>
</a>
