<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('configuration.room-add-modal-headline') }}</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-lights-to-room" action="#" method="POST">
                    @csrf
                    <input type="hidden" name="room-id" value="{{ $room->id }}">
                    <ul class="list-group">
                        @foreach($unAssignedLights as $uAL)
                            <li class="list-group-item">
                                <input id="add-{{ $uAL->id }}" class="add-checkbox" type="checkbox" name="light-ids[]" value="{{ $uAL->id }}" />
                                <label for="add-{{ $uAL->id }}">
                                    {{ $uAL->label }}
                                    @if(isset($usedRoom[$uAL->id]) === true && strlen($usedRoom[$uAL->id]) > 0)
                                        ({{ $usedRoom[$uAL->id] }})
                                    @endif
                                </label>
                            </li>
                        @endforeach
                    </ul>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('configuration.close') }}</button>
                <button type="button" class="add-light-button btn btn-primary" data-bs-dismiss="modal">{{ __('configuration.add') }}</button>
            </div>
        </div>
    </div>
</div>
