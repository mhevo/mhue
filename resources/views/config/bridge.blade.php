<x-config-layout>
    @isset($type)
    @include('config.imported')
    @endisset
        {{ __('configuration.add-new-bridge') }}<br />
    <form method="post" action="/configuration/bridges/new">
        @csrf
        <input class="mt-1" type="text" name="label" placeholder="{{ __('configuration.bridge-label') }}"><br />
        <input class="mt-1" type="text" name="ip" placeholder="{{ __('configuration.bridge-ip') }}"><br />
        <input class="mt-1" type="text" name="username" placeholder="{{ __('configuration.bridge-username') }}"><br />
        <input class="btn btn-outline-success mt-1" type="submit" name="submit" value="{{ __('configuration.bridge-submit') }}">
    </form>
    <br />
    <br />
        {{ __('configuration.bridge-active-bridges') }}<br />
    @foreach($bridges as $bridge)
        {{ $bridge->label }} - {{ $bridge->ip }} - {{ $bridge->username }}<br />
        <a class="btn btn-outline-success" href="/configuration/bridges/import/lights/{{ $bridge->id }}">{{ __('configuration.bridge-import-lights') }}</a>
        <a class="btn btn-outline-success" href="/configuration/bridges/import/rooms/{{ $bridge->id }}">{{ __('configuration.bridge-import-rooms') }}</a>
        <br />
        <br />
    @endforeach
</x-config-layout>
