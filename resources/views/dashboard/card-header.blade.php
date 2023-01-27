<div class="card-header container">
    <div class="row">
        <div class="col-7 col-md-2">
            <a class="btn btn-link text-left" data-bs-toggle="collapse" data-bs-target="#collapse{{ $room->id }}" aria-expanded="true" aria-controls="collapse{{ $room->id }}">
                {{ $room->label }}
            </a>
        </div>
        <div class="col-3 col-md-9">
            <a class="btn btn-outline-info add-color-picker" data-bs-toggle="modal" data-bs-target="#modal-add-color-picker-{{ $room->id }}">
                {{ __('msg.color') }}
             </a>

{{--            <a class="btn btn-outline-info">--}}
{{--                {{ __('msg.scene') }}--}}
{{--            </a>--}}
        </div>
        <div class="col-2 col-md-1">
            <a class="room-switch room-switch-on-{{ $room->id }} text-right pointer" data-room-id="{{ $room->id }}" data-state="on" style="{{ $param['anyLightInRoomOn'] === true ? '' : 'display: none;' }}">
                <i class="fa-regular fa-toggle-on fs-touchbutton"></i>
            </a>
            <a class="room-switch room-switch-off-{{ $room->id }} text-right pointer" data-room-id="{{ $room->id }}" data-state="off" style="{{ $param['anyLightInRoomOn'] === true ? 'display: none;' : '' }}">
                <i class="fa-regular fa-toggle-off fs-touchbutton"></i>
            </a>
        </div>
    </div>
</div>
@include('dashboard.card-header-modal-color-picker')
