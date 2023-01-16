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
                    <input class="btn btn-success" type="submit" name="submit" value="Save" />
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-12">Imported Values</div>
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
</x-config-layout>

{{--"id" => 1--}}
{{--"id_bridge" => 1--}}
{{--"label" => "Wohnzimmer 3"--}}
{{--"hue_id" => 1--}}
{{--"hue_type" => "Extended color light"--}}
{{--"hue_name" => "Wohnzimmer 3"--}}
{{--"hue_modelid" => "LCG002"--}}
{{--"hue_manufacturername" => "Signify Netherlands B.V."--}}
{{--"hue_productname" => "Hue color spot"--}}
{{--"hue_uniqueid" => "00:17:88:01:0b:bd:07:cd-0b"--}}
{{--"hue_swversion" => "1.101.7"--}}
{{--"hue_swconfigid" => "D779D146"--}}
{{--"hue_productid" => "Philips-LCG002-3-GU10ECLv2"--}}
{{--"created_at" => "2023-01-15 23:09:23"--}}
{{--"updated_at" => "2023-01-15 23:09:23"--}}
