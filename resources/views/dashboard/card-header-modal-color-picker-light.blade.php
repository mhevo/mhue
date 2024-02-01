<div class="modal fade" id="modal-add-color-picker-{{ $light->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('msg.set-color-header') }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="set-light-color-{{ $light->id }}" data-jscolor="{format:'rgba', required:false, uppercase:false, hash:false, previewPosition:'right', alphaChannel:true, shadow:false}">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('msg.close') }}</button>
                <button type="button" class="set-light-color btn btn-primary" data-light-id="{{ $light->id }}" data-bs-dismiss="modal">{{ __('msg.set-color') }}</button>
            </div>
        </div>
    </div>
</div>
