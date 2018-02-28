

$(function(){
	$('#desconto').mask('000000000000000.00', {reverse:true, placeholder:"0.00"});
	$('#sub_total').mask('000000000000000.00', {reverse:true, placeholder:"0.00"});
	$('#preco_venda').mask('000000000000000.00', {reverse:true, placeholder:"0.00"});
	$('#valor_pago').mask('000000000000000.00', {reverse:true, placeholder:"0.00"});
	$('#date_sale').mask('00/00/0000', {reverse:false, placeholder:"00/00/0000"});
	$('#date_document').mask('00/00/0000', {reverse:false, placeholder:"00/00/0000"});
	$('#date_maturity').mask('00/00/0000', {reverse:false, placeholder:"00/00/0000"});
	$('#price_pay').mask('000.000.000.000.000,00', {reverse:true, placeholder:"0,00"});
	$('#date_birth_fund').mask('00/00/0000', {reverse:false, placeholder:"00/00/0000"});

});

// Calcular Desconto da Venda
function digitouValor(event){
	if(parseFloat(document.getElementById("desconto").value) >= 0){
		total = 0;
		var subtotal = parseFloat(document.getElementById("sub_total").value).toFixed(2);
		var desconto = parseFloat(document.getElementById("desconto").value).toFixed(2);
	//subtotal = subtotal.replace(',','.');
	//desconto = desconto.replace(',','.');
	var preco_venda = subtotal - desconto;
	//preco_venda = preco_venda.replace(',','.');
	total += preco_venda;
	$('input[name=total_price').val(parseFloat(total).toFixed(2));
	$('input[name=valor_pago').val(parseFloat(total).toFixed(2));
} else {
	// se não haver desconto passa o valor sub-total da venda
	var subtotal = parseFloat(document.getElementById("sub_total").value).toFixed(2);
	$('input[name=total_price').val(parseFloat(subtotal).toFixed(2));
}
}
// Calcular Troco da Venda ou restante
function digitouValorPago(event){

	if(parseFloat(document.getElementById("valor_pago").value) > parseFloat(document.getElementById("preco_venda").value)){
		total = 0;
		var valor_pago = parseFloat(document.getElementById("valor_pago").value).toFixed(2);
		var preco_venda = parseFloat(document.getElementById("preco_venda").value).toFixed(2);
		var troco = valor_pago - preco_venda;
		total += troco;
		if(parseFloat(document.getElementById("valor_pago").value) > parseFloat(document.getElementById("preco_venda").value)){
			$('input[name=troco').val(parseFloat(total).toFixed(2));
		}
	} else {
		var semTroco = 0;
		$('input[name=troco').val(parseFloat(semTroco).toFixed(2));
	}

// Se o valor pago for menor que o valor da venda, mostrara o restante, e fica sem troco.
if(parseFloat(document.getElementById("valor_pago").value) < parseFloat(document.getElementById("preco_venda").value)){
	
	total = 0;
	var valor_pago = parseFloat(document.getElementById("valor_pago").value).toFixed(2);
	var preco_venda = parseFloat(document.getElementById("preco_venda").value).toFixed(2);

	var restante = preco_venda - valor_pago;
	total += restante;
	$('input[name=pgto_restante').val(parseFloat(total).toFixed(2));
	var semTroco = 0;
	$('input[name=troco').val(parseFloat(semTroco).toFixed(2));

} else {

	var semRestante = 0;
	$('input[name=pgto_restante').val(parseFloat(semRestante).toFixed(2));

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



	$(obj).closest('tr').find('.subtotal').html('R$ '+parseFloat(subtotal).toFixed(2));



	var total = 0;
	for(var q=0;q<$('.quant').length;q++){
		
		var quant = $('.quant').eq(q);

		var price = quant.attr('data-price');
		var subtotal = price * parseInt(quant.val());

		total += subtotal;
		
	}


	$('input[name=sub_total]').val(parseFloat(total).toFixed(2));
}

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
			alert("Atenção! preenchar a quantidade do(s) produto(s).");
			$('#quant').focus();

		} else{
			$('#finalizar').removeClass("disabled");
		}


	}); 

});
$(document).ready(function(){

	
	$("#finalizar").mouseover(function(){
		if (document.getElementById("pgto_restante").value  > 0) {
			$('#finalizar').addClass("disabled");
			
			alert("Atenção! pagamento menor que a venda");
			$('#valor_pago').focus();


		}

		else{
			$('#finalizar').removeClass("disabled");
		}


	});

	$("#finalizar").mouseout(function(){
		if (document.getElementById("pgto_restante").value  > 0) {
			$('#finalizar').addClass("disabled");

			
		}		
		else{
			$('#finalizar').removeClass("disabled");
		}
	}); 
});


$(document).ready(function(){
	$("#myInput").on("keyup", function() {
		var value = $(this).val().toLowerCase();
		$("#myTable tr").filter(function() {
			$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		});
	});
});

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});