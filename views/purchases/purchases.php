
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Compras</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">      

	<a class="btn btn-primary"  href="<?php echo BASE_URL;?>purchases/add">Adicionar Compra</a>

	<table class="table  table-responsive table-bordered table-striped">
		<thead>
			<tr>
				<th>Nome do Cliente</th>
				<th>Data</th>
				<th>Status</th>
				<th>Valor</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($sales_list as $sale_item): ?>

				<tr>
					<td><?php echo $sale_item['name']; ?></td>

					<td><?php echo date('d/m/Y', strtotime($sale_item['date_sale'])) ?></td>

					<td><?php echo $form_pay[$sale_item['form_pay']]; ?></td>

					<td>R$ <?php echo number_format( $sale_item['total_price'], 2, ',','.'); ?></td>
					<td>
						<a class="btn btn-info" href="<?php echo BASE_URL; ?>purchases/edit/<?php echo $sale_item['id']; ?>">Visualizar</a>
					</td>
				</tr>
			<?php  endforeach; ?>
		</tbody>
	</table>
</div>
</div>