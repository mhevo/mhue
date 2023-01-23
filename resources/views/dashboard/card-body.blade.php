<div id="collapse{{ $room->id }}" class="collapse" aria-labelledby="heading{{ $room->id }}" data-bs-parent="accordionRoom">
    <div class="card-body">
        @foreach($param['lights'] as $light)
            @include('dashboard.light-entry')
        @endforeach
    </div>
</div>
