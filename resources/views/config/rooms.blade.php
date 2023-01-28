<x-config-layout>
    <ul class="list-group">
        <li class="list-group-item">
            <a href="/configuration/rooms/new" class="btn btn-outline-info">
                {{ __('configuration.new-room') }}
            </a>
        </li>
        @foreach($rooms as $room)
            <li class="list-group-item">
                {{ $room->label }} <a href="/configuration/rooms/edit/{{ $room->id }}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </li>
        @endforeach
    </ul>
</x-config-layout>
