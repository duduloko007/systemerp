var rel1 = new Chart(document.getElementById("rel1"), {
	type:'line',
	data:{
		labels:days_list,
		datasets:[{
			label:'Vendas',
			data:revenue_list,
			fill:false,
			backgroundColor:'#0000FF',
			borderColor:'#0000FF'
		},{
			label:'Despesas',
			data:expenses_list,
			fill:false,
			backgroundColor:'#FF0000',
			borderColor:'#FF0000'
		}]
	}
});
var rel2 = new Chart(document.getElementById("rel2"),{
	type:'pie',
	data:{
		labels:status_name_list,
		datasets:[{
			data:status_list,
			backgroundColor:['#00ff87', '#36A2EB', '#FF6384', '#ea1717', '#1dc3e0', '#7c7712', '#1c1a03']
		}]
	}
})