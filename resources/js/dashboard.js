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
            // beforeSend: function () {
            //     $('.alert').addClass('alert-info').html('<i class="fa-solid fa-spinner fa-spin"></i>').show()
            // },
            success: function (response) {
                let json = JSON.parse(response);
                console.log(json.state);
                console.log(json.light_id);
                if (json.state === 'on') {
                    $('.light-switch-on-' + json.light_id).show();
                    $('.light-switch-off-' + json.light_id).hide();
                } else {
                    $('.light-switch-on-' + json.light_id).hide();
                    $('.light-switch-off-' + json.light_id).show();
                }
            }
        });
    });
});
