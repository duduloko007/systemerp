
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Compras</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">      
		<div class="row" style="margin-bottom: 20px;">

					<?php if($add_permission): ?>

			<div class="col-sm-12">

				<a class="btn btn-primary btn-sm"  href="<?php echo BASE_URL;?>purchases/add">Adicionar Compra</a>
			</div>

		<?php endif;?>
		</div>
		<div class="row">
			<div class="col-sm-6 ">

				<div class="form-group">
					<label>Buscar</label>
					<input class="form-control" id="myInput" type="text" placeholder="Buscar.."/>
				</div>
			</div>
		</div>

		<div  style=" height: 600px; overflow: auto;">
			<table class="table  table-responsive table-bordered table-striped">
				<thead>
					<tr>
						<th>Cod.</th>
						<th>Fornecedor</th>
						<th>Data</th>
						<th>Valor</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody id="myTable">

					<?php foreach($purchases_list as $purchases): ?>

						<tr>
							<td><?php echo $purchases['id']; ?></td>
							<td><?php echo $purchases['name']; ?></td>

							<td><?php echo date('d/m/Y', strtotime($purchases['date_sale'])) ?></td>

							<td>R$ <?php echo number_format( $purchases['total_price'], 2, ',','.'); ?></td>
							<td>
								
								<a class="btn btn-info btn-sm" href="<?php echo BASE_URL; ?>purchases/edit/<?php echo $purchases['id']; ?>">Visualizar</a>
							</td>
						</tr>
					<?php  endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>