	<form method="POST" >
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Venda</h3>

				<div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
				</div>
			</div>

			<div class="box-body">
				<strong>Código: </strong><?php echo $sales_info['info']['cod_sales']; ?><br/><br/>
				<strong>Cliente:</strong>
				<?php echo $sales_info['info']['client_name']; ?><br/><br/>
				<strong>Data:</strong>
				<?php echo date('d/m/Y', strtotime($sales_info['info']['date_sale'])); ?><br/><br/>
				<strong>Desconto:</strong>
				R$ <?php echo number_format( $sales_info['info']['discount'], 2, ',','.'); ?><br/><br/>
				<strong>Total:</strong>
				R$ <?php echo number_format( $sales_info['info']['total_price'], 2, ',','.'); ?><br/><br/>

				<strong>Status da Venda:</strong>
				<?php if($permission_edit):?>

					<div class="row">
						<div class="col-sm-12 col-lg-3 col-xs-6">
							<div class="form-group">
								<select name="status" class="form-control">


									<?php foreach($form_pay as $statusKey =>$statusValue): ?>

										<option    <?php echo($sales_info['info']['form_pay'] == 7)?'disabled':'' ;?>   value="<?php echo $statusKey ;?>" <?php echo($statusKey == $sales_info['info']['form_pay'])?'selected="selected"':'' ;?>>
											<?php echo $statusValue; ?>
										</option>
									<?php endforeach ; ?>
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">

								<label>Observação</label>
								<textarea name="obs" class="form-control"><?php echo $sales_info['info']['obs']; ?></textarea>

							</div>
						</div>

					</div>



				<?php else: ?>

					<?php echo $form_pay[$sales_info['info']['form_pay']] ;?>

					<div class="form-group">
						<br/>
						<label>Observação</label>
						<textarea name="obs" class="form-control" disabled=""><?php echo $sales_info['info']['obs']; ?></textarea>


					</div>
					<a href="<?php echo BASE_URL;?>sales" class="btn btn-danger btn-sm">Voltar</a>
				<?php endif;?>

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
								<td>
									<?php echo $productitem['quant'];?>

									<input type="hidden" name="quant[<?php echo $productitem['id_product'];?>]" value="<?php echo $productitem['quant']; ?>"/>

								</td>
								<td>R$ <?php echo number_format($productitem['sale_price'],2,',','.'); ?></td>
								<td>R$ <?php echo number_format($productitem['sale_price'] * $productitem['quant'],2,',','.'); ?></td>
							</tr>
						<?php endforeach ; ?>
					</tbody>
				</table>
				<div class="row">
					<div class="col-sm-12">
						<input type="submit" value="Salvar" class="btn btn-success btn-sm" />
						<a href="<?php echo BASE_URL;?>sales" class="btn btn-danger btn-sm">Cancelar</a>

					</div>
				</div>
			</div>
		</div>
	</form>