$(function() {
	// Teclado multi-mozo: delegación + data-key (el atributo HTML "data" choca con jQuery .data() / parseo)
	$(document).on('click', '.virtual-keyboard button[type="button"]', function (e) {
		e.preventDefault();
		var $btn = $(this);
		var key = $btn.attr('data-key');
		if (key === undefined || key === null || key === '') {
			key = $btn.attr('data');
		}
		if (key === 'DEL' || key === 'del') {
			var boardText = String($('#f-user').val() || '');
			boardText = boardText.substring(0, boardText.length - 1);
			$('#f-user').val(boardText);
			$('#f-pass').val(boardText);
		} else if (key !== undefined && key !== null && key !== '') {
			$('#f-user').val(String($('#f-user').val() || '') + key);
			$('#f-pass').val(String($('#f-pass').val() || '') + key);
		}
		var $form = $('#frm-login');
		var fv = $form.data('formValidation');
		if (fv && typeof fv.revalidateField === 'function') {
			try {
				fv.revalidateField('usuario');
			} catch (err) { /* sin reglas FV para usuario */ }
		}
	});

    $('#frm-login').formValidation({
        framework: 'bootstrap',
        excluded: ':disabled',
        fields: {
        }
    }).on('success.form.fv', function(e) {
    	e.preventDefault();
        var $form = $(e.target),
        fv = $form.data('formValidation');
        var form = $(this);

        var parametros = new FormData($('#frm-login')[0]);

        $.ajax({
            type: 'POST',
            dataType: 'JSON',
            data: parametros,
            url: $('#url').val()+'login/run',
            contentType: false,
            processData: false,
        })
        .done(function(response){
        	if(response == 1){
        		window.open('tablero','_self');
        	} else if (response == 2) {
        		window.open('produccion','_self');
        	} else if (response == 3) {
        		window.open('venta','_self');
        	} else {
	            $.toast({
	                heading: 'Acceso denegado!',
	                text: 'Datos erroneos.',
	                position: 'top-rigth',
	                loaderBg:'#696969',
	                icon: 'error',
	                hideAfter: 3000, 
	                stack: 20
	            });
	            $('#frm-login').formValidation('resetForm', true);
                $('#f-pass').val('');
                $('#f-user').val('');
        	}
        })
        .fail(function(){
            Swal.fire('Oops...', 'Problemas con la conexión a internet!', 'error');
        });
    });

})