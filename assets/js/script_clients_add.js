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
	$('input[name=phone]').mask('(00) 00000-0009');
	$('input[name=phone]').blur(function(event) {
   if($(this).val().length == 15){ // Celular com 9 dígitos + 2 dígitos DDD e 4 da máscara
      $('input[name=phone]').mask('(00) 00000-0009');
   } else {
      $('input[name=phone]').mask('(00) 0000-00009');
   }
});

});