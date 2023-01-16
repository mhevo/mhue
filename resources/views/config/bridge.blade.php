<x-config-layout>
    @isset($type)
    @include('config.imported')
    @endisset
    Add a new bridge:<br />
    <form method="post" action="/configuration/bridges/new">
        @csrf
        <input type="text" name="label" placeholder="Label"><br />
        <input type="text" name="ip" placeholder="IP-Address"><br />
        <input type="text" name="username" placeholder="username"><br />
        <input class="btn btn-" type="submit" name="submit" value="add new bridge">
    </form>
    <br />
    <br />
    Active bridges:<br />
    @foreach($bridges as $bridge)
        {{ $bridge->label }} - {{ $bridge->ip }} - {{ $bridge->username }}<br />
        <a href="/configuration/bridges/import/lights/{{ $bridge->id }}">Import Lights</a>
        <a href="/configuration/bridges/import/rooms/{{ $bridge->id }}">Import Rooms</a>
{{--        <a href="/configuration/bridges/import/zones/{{ $bridge->id }}">Import Zones</a>--}}
        <br />
    @endforeach
</x-config-layout>
