
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Compra</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">
		<strong>Código: </strong><?php echo $sales_info['info']['id']; ?><br/><br/>
		<strong>Fornecedor:</strong>
		<?php echo $sales_info['info']['client_name']; ?><br/><br/>
		<strong>Data:</strong>
		<?php echo date('d/m/Y', strtotime($sales_info['info']['date_sale'])); ?><br/><br/>
		<strong>Desconto:</strong>
		R$ <?php echo number_format( $sales_info['info']['discount'], 2, ',','.'); ?><br/><br/>
		<strong>Total:</strong>
		R$ <?php echo number_format( $sales_info['info']['total_price'], 2, ',','.'); ?><br/><br/>
		<form method="POST">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">

						<label>Observação</label>
						<textarea name="obs" class="form-control" disabled=""><?php echo $sales_info['info']['obs']; ?></textarea>

					</div>
				</div>
			</div>

		</form>

		<hr/>
		<h3>Produtos</h3>
		<table class="table  table-responsive table-bordered table-striped">
			<thead>
				<tr>
					<th>Nome do Produto</th>
					<th>Quantidade</th>
					<th>Preço Unitário</th>
					<th>Preço Total</th>
				</tr>
			</thead>
			<tbody>

				<?php foreach($sales_info['products'] as $productitem): ?>
					<tr>
						<td><?php echo utf8_decode($productitem['name']); ?></td>
						<td><?php echo $productitem['quant'];?></td>
						<td>R$ <?php echo number_format($productitem['sale_price'],2,',','.'); ?></td>
						<td>R$ <?php echo number_format($productitem['sale_price'] * $productitem['quant'],2,',','.'); ?></td>
					</tr>
				<?php endforeach ; ?>
			</tbody>
		</table>
		<br/>
		<div class="row">
			<div class="col-sm-12">
				<!--<input type="submit" value="Salvar" class="btn btn-success" />-->
				<a href="<?php echo BASE_URL;?>purchases" class="btn btn-danger">Voltar</a>

			</div>
		</div>
	</div>
</div>