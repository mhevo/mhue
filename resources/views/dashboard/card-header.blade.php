<div class="card-header">
    <h5 class="mb-0">
        <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse{{ $room->id }}" aria-expanded="true" aria-controls="collapse{{ $room->id }}">
            {{ $room->label }}
        </button>
        <a href="#" class="switch-room" data-room-id="{{ $room->id }}">
            @if($param['anyLightInRoomOn'] === true)
                <i class="fa-regular fa-toggle-on"></i>
            @else
                <i class="fa-regular fa-toggle-off"></i>
            @endif
        </a>
    </h5>
</div>
