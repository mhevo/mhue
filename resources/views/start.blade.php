<x-guest-layout>
    <div id="accordionRoom">
        @foreach ($params as $param)
            @php
            $room = $param['room'];
            $state = $param['states'];
            @endphp
            <div class="card mb-2">
                @include('dashboard.card-header')
                @include('dashboard.card-body')
            </div>
        @endforeach
    </div>
</x-guest-layout>
