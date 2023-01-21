$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

   $('.add-light-button').on('click', function() {
       $.ajax({
           url: '/configuration/rooms/addlights',
           type: 'post',
           data: $('#add-lights-to-room').serialize(),
           beforeSend: function () {
               $('.alert').addClass('alert-info').html('<i class="fa-solid fa-spinner fa-spin"></i>').show()
           },
           success: function (response) {
               $('.alert').removeClass('alert-success alert-danger alert-info');
               if (response !== '') {
                   let lights = JSON.parse(response);
                   for (let i = 0; i < lights.length; i++) {
                       $('.room-lights').append(lights[i]);
                   }

                   $('.alert').addClass('alert-success').html('Success').show().delay(5000).fadeOut();

                   $('.add-checkbox:checked').parent().remove();
               } else {
                   $('.alert').addClass('alert-danger').html('Error').show().delay(5000).fadeOut();
               }
           }
       });
   });

    $('.delete-light-button').on('click', this, function() {
        console.log($(this).data('room-id'));
        console.log($(this).data('light-id'));
        $.ajax({
            url: '/configuration/rooms/removelight',
            type: 'post',
            data: {
                room_id: $(this).data('room-id'),
                light_id: $(this).data('light-id'),
            },
            beforeSend: function () {
                $('.alert').addClass('alert-info').html('<i class="fa-solid fa-spinner fa-spin"></i>').show()
            },
            success: function (response) {
                $('.alert').removeClass('alert-success alert-danger alert-info');
                if (response !== '') {
                    $('.row-room-light-' + response).remove();

                    $('.alert').addClass('alert-success').html('Deleted light successfully').show().delay(5000).fadeOut();
                } else {
                    $('.alert').addClass('alert-danger').html('Error').show().delay(5000).fadeOut();
                }
            }
        });
    });
});
