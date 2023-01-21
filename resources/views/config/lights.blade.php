<x-config-layout>
    <ul>
        @foreach($lights as $light)
            <li>
                {{ $light->label }} <a href="/configuration/lights/edit/{{ $light->id }}">
                    <i class="fa-solid fa-pen-to-square"></i>
                </a>
            </li>
        @endforeach
    </ul>
</x-config-layout>
