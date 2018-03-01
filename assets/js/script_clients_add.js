$('input[name=address_zipcode]').on('blur', function(){
	var cep = $(this).val();
	$.ajax({
		url:'http://api.postmon.com.br/v1/cep/'+cep,
		type:'GET',
		dataType:'json',
		success:function(json){
			if (typeof json.logradouro != 'undefined') {
				$('input[name=address]').val(json.logradouro);
				$('input[name=address_neighb]').val(json.bairro);
				$('input[name=address_city]').val(json.cidade);
				$('input[name=address_state]').val(json.estado);
				$('input[name=address_country]').val("Brasil");
				$('input[name=address_number]').focus();
			}
		}
	});
});
$(function(){

	$('#address_zipcode').mask('00000-000');
	$('#address_zipcode2').mask('00000-000');
	$('#date_fund').mask('00/00/0000');
	$('#date_birth').mask('00/00/0000');
	$('#cpf').mask('000.000.000-00');
	$('#cnpj').mask('00.000.000/0000-00');
	$('input[name=phone_fix]').mask('(00) 0000-0000');


	$('input[name=phone]').mask('(00) 00000-0009');
	$('input[name=phone]').blur(function(event) {
   if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
   	$('input[name=phone]').mask('(00) 00000-0009');
   } else {
   	$('input[name=phone]').mask('(00) 0000-00009');
   }
});

});

$(function(){



});
