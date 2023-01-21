<x-guest-layout>
    <div id="accordionRoom">
        @foreach ($params as $param)
            @php
            $room = $param['room'];
            @endphp
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">
                        <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse{{ $room->id }}" aria-expanded="true" aria-controls="collapse{{ $room->id }}">
                            {{ $room->label }}
                        </button>
                        <a href="#" class="switch-room" data-room-id="{{ $room->id }}">
                            @if(true === true)
                                <i class="fa-regular fa-toggle-on"></i>
                            @else
                                <i class="fa-regular fa-toggle-off"></i>
                            @endif
                        </a>
                    </h5>
                </div>
                <div id="collapse{{ $room->id }}" class="collapse" aria-labelledby="heading{{ $room->id }}" data-bs-parent="accordionRoom">
                    <div class="card-body">
                        @foreach($param['lights'] as $light)
                            <ul class="list-group">
                                <li class="list-group-item">{{ $light->label }}</li>
                            </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-guest-layout>
