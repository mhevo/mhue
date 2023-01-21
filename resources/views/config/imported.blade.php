<div class="alert @if($lines === 0) alert-warning @else alert-success @endif">
    {{ __('configuration.bridge-imported-lines', ['lines' => $lines, 'type' => $type]) }}
</div>
<br />
<br />
