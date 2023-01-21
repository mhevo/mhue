<div class="row row-room-light-{{ $assignedLight->id }}">
    <div class="col-12">
        <i class="fa-solid fa-lightbulb"></i>
        {{ $assignedLight->label }}
        <a class="delete-light-button" href="#" data-room-id="{{ $room->id }}" data-light-id="{{ $assignedLight->id }}">
            <i class="fa-solid fa-trash-can"></i>
        </a>
    </div>
</div>
