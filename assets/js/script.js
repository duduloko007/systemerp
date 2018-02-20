$(function(){

	$('.tabitem').on('click', function(){
		$('.activetab').removeClass('activetab');
		$(this).addClass('activetab');

		var item = $('.activetab').index();
		$('.tabbody').hide();
		$('.tabbody').eq(item).show();
	});
	$('#busca').on('focus', function(){
		$(this).animate({
			width:'250px'
		}, 'fast');
	});
	$('#busca').on('blur', function(){
		if($(this).val() == ''){
			$(this).animate({
				width:'100px'
			}, 'fast');
		}


		setTimeout(function(){
			$('.searchresults_clients').hide();
		}, 500);
		

	});

	$('#busca').on('keyup', function(){
		var datatype = $(this).attr('data-type');
		var q = $(this).val();
		

		if (datatype != '') {
			$.ajax({
				url:BASE_URL+'ajax/'+datatype,
				type:'GET',
				data:{q:q},
				dataType:'json',
				success:function(json){
					if($('.searchresults_clients').length == 0){
						$('#busca').after('<div class="searchresults_clients"></div>');

					}

					$('.searchresults_clients').css('left', $('#busca').offset().left+'px');
					$('.searchresults_clients').css('top', $('#busca').offset().top+$('#busca').height()+3+'px');

					var html = '';
					

					for(var i in json){
						html += '<div class="si"><a href="'+json[i].link+'">'+json[i].name+'</a></div>';
					}
					$('.searchresults_clients').html(html);
					$('.searchresults_clients').show();



				}
			});
		}


	});


});
/*

function updateSubTotal(obj){
	var quant = $(obj).val();
	if(quant <= 0) {
		$(obj).val(1);
		quant = 1;
	} 
	var price = $(obj).attr('data-price');
	var subtotal = price * quant;


	$(obj).closest('tr').find('.subtotal').html('R$ '+subtotal);

	updateTotal();
}

function updateTotal(){

		
		var subtotal = $('#sub_total');


		var price = quant.attr('data-price');
		var subtotal = price * parseInt(quant.val());

		total += subtotal;
	}

	$('input[name=total_price]').val(total);
}*/

$(function(){
	$('#desconto').mask('000000000000000.00', {reverse:true, placeholder:"0.00"});
	$('#sub_total').mask('000000000000000.00', {reverse:true, placeholder:"0.00"});
	$('#preco_venda').mask('000000000000000.00', {reverse:true, placeholder:"0.00"});
	$('#valor_pago').mask('000000000000000.00', {reverse:true, placeholder:"0.00"});
	$('#date_sale').mask('00/00/0000', {reverse:false, placeholder:"00/00/0000"});

});

// Calcular Desconto da Venda
function digitouValor(event){
	if(parseFloat(document.getElementById("desconto").value) >= 0){
		total = 0;
		var subtotal = parseFloat(document.getElementById("sub_total").value);
		var desconto = parseFloat(document.getElementById("desconto").value);
	//subtotal = subtotal.replace(',','.');
	//desconto = desconto.replace(',','.');
	var preco_venda = subtotal - desconto;
	//preco_venda = preco_venda.replace(',','.');
	total += preco_venda;
	$('input[name=total_price').val(parseFloat(total));
	$('input[name=valor_pago').val(parseFloat(total));
} else {
	// se não haver desconto passa o valor sub-total da venda
	var subtotal = parseFloat(document.getElementById("sub_total").value);
	$('input[name=total_price').val(parseFloat(subtotal));
	
}
}
// Calcular Troco da Venda ou restante
function digitouValorPago(event){

	if(parseFloat(document.getElementById("valor_pago").value) > parseFloat(document.getElementById("preco_venda").value)){
		total = 0;
		var valor_pago = parseFloat(document.getElementById("valor_pago").value);
		var preco_venda = parseFloat(document.getElementById("preco_venda").value);
		var troco = valor_pago - preco_venda;
		total += troco;
		if(parseFloat(document.getElementById("valor_pago").value) > parseFloat(document.getElementById("preco_venda").value)){
			$('input[name=troco').val(parseFloat(total));
		}
	} else {
		var semTroco = 0;
		$('input[name=troco').val(parseFloat(semTroco));
	}

// Se o valor pago for menor que o valor da venda, mostrara o restante, e fica sem troco.
if(parseFloat(document.getElementById("valor_pago").value) < parseFloat(document.getElementById("preco_venda").value)){
	
	total = 0;
	var valor_pago = parseFloat(document.getElementById("valor_pago").value);
	var preco_venda = parseFloat(document.getElementById("preco_venda").value);

	var restante = preco_venda - valor_pago;
	total += restante;
	$('input[name=pgto_restante').val(parseFloat(total));
	var semTroco = 0;
	$('input[name=troco').val(parseFloat(semTroco));

} else {

	var semRestante = 0;
	$('input[name=pgto_restante').val(parseFloat(semRestante));

}

}


function updateSubTotalProduct(obj){
	var quant = $(obj).val();
	if(quant <= 0) {
		$(obj).val(1);
		quant = 1;
	} 
	var price = $(obj).attr('data-price');
	var subtotal = price * quant;



	$(obj).closest('tr').find('.subtotal').html('R$ '+subtotal);



	var total = 0;
	for(var q=0;q<$('.quant').length;q++){
		
		var quant = $('.quant').eq(q);

		var price = quant.attr('data-price');
		var subtotal = price * parseInt(quant.val());

		total += subtotal;
		
	}


	$('input[name=sub_total]').val(total);
}
/*
function updateTotal(){
	var total = 0;
	for(var q=0;q<$('.quant').length;q++){
		
		var quant = $('.quant').eq(q);

		var price = quant.attr('data-price');
		var subtotal = price * parseInt(quant.val());

		total += subtotal;
		
	}


	$('input[name=sub_total]').val(total);
}*/
function teclando(event){

	if (document.getElementById("nome_client").value   != '') {


		var nome = document.getElementById("nome_client").value;

		var nomepego = nome;

		$('input[name=client_selecionado').val(nomepego);

	} else {
		var semClient = 'Nenhum cliente selecionado';
		$('input[name=client_selecionado').val(semClient);
	}


}

function paySelecionado(event){

	if (document.getElementById("form_pay_view").value   != '') {


		var form_select = document.getElementById("form_pay_view").value;

		switch(form_select){
			case '1': 
			form_select = 'Dinheiro';
			break;
			case '2': 
			form_select = 'Nota a prazo';
			break;
			case '3': 
			form_select = 'Cartão de debito';
			break;
			case '4': 
			form_select = 'Cartão de crédito';
			break;
			case '5': 
			form_select = 'Cheque';
			break;
			case '5': 
			form_select = 'Depósito bancário';
			break;
			default:
			form_select = 'Forma de pagamento não existe';
		}

		var resultForm = form_select;

		$('input[name=paySelect').val(resultForm);
		

	}else {


		var semPay = 'Selecione a forma de pagamento';
		$('input[name=paySelect').val(semPay);
	}


}
$(document).ready(function(){

	


	$(".finalPay").mouseover(function(){
		if (document.getElementById("quant").value  == '') {
			$('#finalizar').addClass("disabled");
			$('.productSelect').addClass("btn btn-danger");
			alert("Atenção! preenchar a quantidade do(s) produto(s).");
			window.location.href= "http://localhost/systemerp/purchases/add";

		} else{
			$('#finalizar').removeClass("disabled");
		}


	}); 

});
$(document).ready(function(){

	
	$("#finalizar").mouseover(function(){
		if (document.getElementById("pgto_restante").value  > 0) {
			$('#finalizar').addClass("disabled");
			$('.finalPay').addClass("btn btn-danger");
			alert("Atenção! pagamento menor que a venda");


		}

		else{
			$('#finalizar').removeClass("disabled");
		}


	});

	$("#finalizar").mouseout(function(){
		if (document.getElementById("pgto_restante").value  > 0) {
			$('#finalizar').addClass("disabled");
			$('.finalPay').addClass("btn btn-danger");
		}		
		else{
			$('#finalizar').removeClass("disabled");
		}
	}); 
});
