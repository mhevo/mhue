<x-config-layout>
    <ul class="list-group">
        @foreach($rooms as $room)
            <li class="list-group-item">
                {{ $room->label }} <a href="/configuration/rooms/edit/{{ $room->id }}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </li>
        @endforeach
    </ul>
</x-config-layout>
