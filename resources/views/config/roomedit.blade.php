<x-config-layout>
    <div class="alert"></div>
    <form method="POST" action="/configuration/rooms/edit/{{ $room->id ?? 0 }}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-2">Label</div>
                <div class="col-4">
                    <input type="text" name="label" value="{{ $room->label }}" />
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2"></div>
                <div class="col-4">
                    <input class="btn btn-outline-success" type="submit" name="submit" value="{{ __('configuration.save') }}" />
                </div>
                @if(Route::currentRouteAction() !== 'App\Http\Controllers\RoomController@newRoom')
                    <div class="col-4">
                        <button class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">{{ __('configuration.delete') }}</button>
                    </div>
                @endif
            </div>
            @if(Route::currentRouteAction() !== 'App\Http\Controllers\RoomController@newRoom')
                <div class="row mt-3">
                    <div class="col-12">{{ __('configuration.imported-values') }}</div>
                </div>
                <div class="row">
                    <div class="col-5">ID</div>
                    <div class="col-7">{{ $room->hue_id }}</div>
                </div>
                <div class="row">
                    <div class="col-5">Type</div>
                    <div class="col-7">{{ $room->hue_type }}</div>
                </div>
                <div class="row">
                    <div class="col-5">Name</div>
                    <div class="col-7">{{ $room->hue_name }}</div>
                </div>
                <div class="row">
                    <div class="col-5">Class</div>
                    <div class="col-7">{{ $room->hue_class }}</div>
                </div>
                <div class="row">
                    <div class="col-5">Created</div>
                    <div class="col-7">{{ $room->created_at }}</div>
                </div>
                <div class="row">
                    <div class="col-5">Modified</div>
                    <div class="col-7">{{ $room->updated_at }}</div>
                </div>
            @endif
        </div>

    </form>

    @if(Route::currentRouteAction() !== 'App\Http\Controllers\RoomController@newRoom')
        @include('config.roomedit-delete-modal')

        <div class="container mt-3">
            <button class="btn btn-outline-success" type="button" data-bs-toggle="modal" data-bs-target="#addModal">{{ __('configuration.lights-add') }}</button>
            <br />
            <h3>{{ __('configuration.assigned-lights') }}</h3>
            @if (isset($assignedLights) === true && is_null($assignedLights) === false)
                <div class="container room-lights">
                @foreach($assignedLights as $assignedLight)
                    @include('config.roomlight')
                @endforeach
                </div>
            @endif
        </div>
        @include('config.roomedit-add-modal')
    @endif
</x-config-layout>
