/*Chamando o Modal Bootstrap*/
function openModal(idModal){
	$('#'+idModal).on('shown.bs.modal', function () {
		$('#myInput').focus()
	});
}

/*Atribuindo o calendario para os text*/
$("input[id*='txtDt']").datepicker({
	format: 'dd/mm/yyyy',
	language: 'pt-BR',
	startDate: new Date()
});

/*Função para postar dados SYNC para o CONTROLLER*/
function postData(_url, _data, callbackSuccess, callbackError){
	$.ajax({
		type: "post",
		url: _url,
		dataType: 'json',			
		data: _data,
		success: function(){
			callbackSuccess();
		},
		error: function(){						
			callbackError();
		}
	});
}

/*Configuração da exibição de mensagem*/
toastr.options = { "closeButton": true, "progressBar": true, "positionClass": "toast-bottom-right","extendedTimeOut": "2000"};