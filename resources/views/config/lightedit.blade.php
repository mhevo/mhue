<x-config-layout>
    <form method="POST" action="/configuration/lights/edit/{{ $light->id }}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-2">Label</div>
                <div class="col-4">
                    <input type="text" name="label" value="{{ $light->label }}" />
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-2"></div>
                <div class="col-4">
                    <input class="btn btn-outline-success" type="submit" name="submit" value="{{ __('configuration.save') }}" />
                </div>
                <div class="col-4">
                    <button class="btn btn-outline-danger" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">{{ __('configuration.delete') }}</button>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">{{ __('configuration.imported-values') }}</div>
            </div>
            <div class="row">
                <div class="col-5">ID</div>
                <div class="col-7">{{ $light->hue_id }}</div>
            </div>
            <div class="row">
                <div class="col-5">Type</div>
                <div class="col-7">{{ $light->hue_type }}</div>
            </div>
            <div class="row">
                <div class="col-5">Name</div>
                <div class="col-7">{{ $light->hue_name }}</div>
            </div>
            <div class="row">
                <div class="col-5">ModelId</div>
                <div class="col-7">{{ $light->hue_modelid }}</div>
            </div>
            <div class="row">
                <div class="col-5">ManufacturerName</div>
                <div class="col-7">{{ $light->hue_manufacturername }}</div>
            </div>
            <div class="row">
                <div class="col-5">Productname</div>
                <div class="col-7">{{ $light->hue_productname }}</div>
            </div>
            <div class="row">
                <div class="col-5">UniqueId</div>
                <div class="col-7">{{ $light->hue_uniqueid }}</div>
            </div>
            <div class="row">
                <div class="col-5">SoftwareVersion</div>
                <div class="col-7">{{ $light->hue_swversion }}</div>
            </div>
            <div class="row">
                <div class="col-5">ProductId</div>
                <div class="col-7">{{ $light->hue_productid }}</div>
            </div>
            <div class="row">
                <div class="col-5">Created</div>
                <div class="col-7">{{ $light->created_at }}</div>
            </div>
            <div class="row">
                <div class="col-5">Modified</div>
                <div class="col-7">{{ $light->updated_at }}</div>
            </div>
        </div>

    </form>
    @include('config.lightedit-delete-modal')
</x-config-layout>
