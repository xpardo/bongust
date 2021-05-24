$(document).ready(function() {
    $('#btnSend').click(function() {
        var errors = '';
        /** 
        Estic dient que en donar - li clic al btnSend
        el buto d 'enviar, crearà una variable errors,
        però en donar - li clic en el nom, no hi ha cap valor o no hi ha res o l 'usuari
        no a escrit res, llavors erorrs ja no ser igual a res sinó que va ser igual
        al paràgraf que diu escrigui un nom
            */

        //*validador nom ====

        if ($('#names').val() == '') {
            errors += '<p><i class="fas fa-times"></i>Escriu un nom</p>';
            $('#names').css("border-bottom-color", "#f14b4b");
        } else {
            $('#names').css("border-bottom-color", "#d1d1d1");
        }
        //*validador email =====
        if ($('#email').val() == '') {
            errors += '<p><i class="fas fa-times"></i>Escriu un email</p>';
            $('#email').css("border-bottom-color", "#f14b4b");
        } else {
            $('#email').css("border-bottom-color", "#d1d1d1");
        }
        //*validador missatge =====
        if ($('#missatge').val() == '') {
            errors += '<p><i class="fas fa-times"></i>Escriu un missatge</p>';
            $('#missatge').css("border-bottom-color", "#f14b4b");
        } else {
            $('#missatge').css("border-bottom-color", "#d1d1d1");
        }
        // ENVIANT MISSATGE =================================

        /** Mirem si hi ha errors
        si errors és igual a res, però és fals dir que si hi ha errors,
        creés l 'estructura html dels errors i els va mostrar. 
        */

        if (errors == '' == false) {
            var misatgeModal = '<div class="modal_wrap">' +
                '<div class="misatge_modal">' +
                '<h3>Errors Trobats</h3>' +
                errors +
                '<span id="btnClose">Tancar</span>' +
                '</div>' +
                '</div>'
            $('body').append(misatgeModal);
        }

        //TANCA MODAL =====
        $('#btnClose').click(function() {
            $('.modal_wrap').remove();
        });



    });


});