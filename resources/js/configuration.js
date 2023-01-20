$(document).ready(function () {
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
   })
});
