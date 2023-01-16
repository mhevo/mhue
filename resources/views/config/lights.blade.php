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
