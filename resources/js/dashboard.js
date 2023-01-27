$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.light-switch').on('click', function () {
        $.ajax({
            url: '/switch/light',
            type: 'post',
            data: {
                state: $(this).data('state'),
                light_id: $(this).data('light-id'),
            },
            success: function (response) {
                let json = JSON.parse(response);
                if (json.state === 'on') {
                    $('.light-switch-on-' + json.light_id).show();
                    $('.light-switch-off-' + json.light_id).hide();
                    for (let i = 0; i < json.room_ids.length; i++) {
                        $('.room-switch-on-' + json.room_ids[i]).show();
                        $('.room-switch-off-' + json.room_ids[i]).hide();
                    }
                } else {
                    $('.light-switch-on-' + json.light_id).hide();
                    $('.light-switch-off-' + json.light_id).show();

                    for (let i = 0; i < json.room_ids.length; i++) {
                        let lightswitches = $('a.room-id-' + json.room_ids[i] + '[class*="light-switch-on-"]:visible');
                        if (lightswitches.length <= 0) {
                            $('.room-switch-on-' + json.room_ids[i]).hide();
                            $('.room-switch-off-' + json.room_ids[i]).show();
                        }
                    }
                }
            }
        });
    });

    $('.room-switch').on('click', function () {
        $.ajax({
            url: '/switch/room',
            type: 'post',
            data: {
                state: $(this).data('state'),
                room_id: $(this).data('room-id'),
            },
            success: function (response) {
                let json = JSON.parse(response);

                console.log(json);
                if (json.state === 'on') {
                    $('.room-switch-on-' + json.room_id).show();
                    $('.room-switch-off-' + json.room_id).hide();
                    for (let i = 0; i < json.light_ids.length; i++) {
                        $('.light-switch-on-' + json.light_ids[i]).show();
                        $('.light-switch-off-' + json.light_ids[i]).hide();
                    }
                } else {

                    $('.room-switch-on-' + json.room_id).hide();
                    $('.room-switch-off-' + json.room_id).show();
                    for (let i = 0; i < json.light_ids.length; i++) {
                        $('.light-switch-on-' + json.light_ids[i]).hide();
                        $('.light-switch-off-' + json.light_ids[i]).show();
                    }
                }
            }
        });
    });

    $('.set-room-color').on('click', function () {
        $.ajax({
            url: '/room/set/color',
            type: 'post',
            data: {
                state: 'on',
                room_id: $(this).data('room-id'),
                color: $('#set-room-color-' + $(this).data('room-id')).val()
            },
            success: function (response) {
                console.log(response);
            }
        });
    });
});
