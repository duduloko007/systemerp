$(function(){
	$('input[name=price]').mask('000000000000000.00', {reverse:true, placeholder:"0.00"});
	$('input[name=price_cust]').mask('000000000000000.00', {reverse:true, placeholder:"0.00"});
	$('input[name=price_percentage]').mask('000000000000000.00', {reverse:true, placeholder:"0.00"});
});
// Calcular Preço do Produto com porcentagem


function pricePercentage(event){
	if(parseFloat(document.getElementById("price_percentage").value) != ''){

		total = 0;

		var price_percentage = parseFloat(document.getElementById("price_percentage").value);
		var price_cust = parseFloat(document.getElementById("price_cust").value);

		var porcentagem = price_percentage / 100;
		var price = price_cust + (porcentagem * price_cust);

		total += price;

	
		$('input[name=price').val(parseFloat(price).toFixed(2));

	} else {
	// se não haver porcentagem passa o valor preço custo
	total = 0;

	var price_percentage = parseFloat(document.getElementById("price_percentage").value);
	var price_cust = parseFloat(document.getElementById("price_cust").value);

	var porcentagem = price_percentage / 100;
	var price = price_cust + (porcentagem * price_cust);

	total += price;

	$('input[name=price').val(parseFloat(price).toFixed(2));
	var price = parseFloat(document.getElementById("price_cust").value).toFixed(2);
	$('input[name=price').val(parseFloat(price).toFixed(2));

	}
}
