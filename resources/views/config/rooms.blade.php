<x-config-layout>
    <ul>
        @foreach($rooms as $room)
            <li>
                {{ $room->label }} <a href="/configuration/rooms/edit/{{ $room->id }}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </li>
        @endforeach
    </ul>
</x-config-layout>
