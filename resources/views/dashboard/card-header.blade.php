<div class="card-header container">
    <div class="row">
        <div class="col-10 col-md-11">
            <a class="btn btn-link text-left" data-bs-toggle="collapse" data-bs-target="#collapse{{ $room->id }}" aria-expanded="true" aria-controls="collapse{{ $room->id }}">
                {{ $room->label }}
            </a>
            &nbsp;
            <a class="btn btn-outline-info">
                {{ __('msg.scene') }}
             </a>
        </div>
        <div class="col-2 col-md-1">
            <a href="#" class="room-switch room-switch-on-{{ $room->id }} text-right" data-room-id="{{ $room->id }}" data-state="on" style="{{ $param['anyLightInRoomOn'] === true ? '' : 'display: none;' }}">
                <i class="fa-regular fa-toggle-on fs-touchbutton"></i>
            </a>
            <a href="#" class="room-switch room-switch-off-{{ $room->id }} text-right" data-room-id="{{ $room->id }}" data-state="off" style="{{ $param['anyLightInRoomOn'] === true ? 'display: none;' : '' }}">
                <i class="fa-regular fa-toggle-off fs-touchbutton"></i>
            </a>
        </div>
    </div>
</div>
