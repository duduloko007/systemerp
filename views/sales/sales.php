
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Vendas</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">      
		<div class="col-md-12">

			<?php if(isset($venda_concluida) && !empty($venda_concluida)):?>
				<div class="alert alert-success"><?php echo $venda_concluida;?></div>
			<?php endif;?>
		</div>
		<div class="row" style="margin-bottom: 20px;">
				<?php if($sales_add):?>
			<div class="col-sm-12">

				<a class="btn btn-primary btn-sm"  href="<?php echo BASE_URL;?>sales/add">Adicionar Venda</a>

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
						<th>Cód.</th>
						<th>Nome do Cliente</th>
						<th>Data</th>
						<th>Status</th>
						<th>Valor</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody id="myTable">

					<?php foreach($sales_list as $sale_item): ?>

						<tr>
							<td><?php echo $sale_item['cod_sales']; ?></td>
							<td><?php echo $sale_item['name']; ?></td>

							<td><?php echo date('d/m/Y', strtotime($sale_item['date_sale'])) ?></td>

							<td><?php echo $form_pay[$sale_item['form_pay']]; ?></td>

							<td>R$ <?php echo number_format( $sale_item['total_price'], 2, ',','.'); ?></td>
							<td>
								<a class="btn btn-info btn-sm" href="<?php echo BASE_URL; ?>sales/edit/<?php echo $sale_item['id']; ?>">Visualizar</a>
							</td>
						</tr>
					<?php  endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
