<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Estoque</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">
		<?php if($add_permission): ?>
			<div class="button">
				<a href="<?php echo BASE_URL;?>inventory/add" class="btn btn-primary btn-sm">Adicionar Produto</a>
			</div>
		<?php endif; ?>
		<br/>
		<div class="row" style="margin-bottom: 10px;">
			<div style="float: right;">
				<div class="col-sm-12">
					<div class="btn btn-success" title="Estoque Cheio."></div><span> Estoque cheio.</span>
				</div>
				<div class="col-sm-12">
					<div class="btn btn-warning" title="Estoque Baixo."></div><span> Estoque Baixo.</span>
				</div>
			</div>

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
						<th>Cód. Barras</th>
						<th>Nome</th>
						<th>Preço Venda</th>
						<th>Quantidade</th>
						<th>Quant. Mín.</th>
						<th>Ações</th>
					</tr>
				</thead>
				<tbody id="myTable">
					<?php foreach($inventory_list as $product): ?>
						<tr>
							<td><?php echo utf8_decode($product['id']);?></td>
							<td><?php echo utf8_decode($product['cod_bars']);?></td>
							<td><?php echo utf8_decode($product['name']);?></td>
							<td>R$ <?php echo number_format($product['price'], 2, ',','.');?></td>

							<td>	
								<?php 
								if ($product['quant'] > $product['min_quant']) {
									echo '<span class="btn btn-success btn-sm" title="Estoque cheio.">'.($product['quant']).'</span>';
								}else{
									echo $product['quant'];
								}
								?></td>
								<td>

									<?php 
									if ($product['min_quant'] > $product['quant']) {
										echo '<span class="btn btn-warning btn-sm" title="Estoque baixo.">'.($product['min_quant']).'</span>';
									}else{
										echo $product['min_quant'];
									}
									?></td>
									<td>
										<?php if($add_permission): ?>
											<a style="margin-top: 5px;" class="btn btn-info btn-sm" href="<?php echo BASE_URL; ?>inventory/edit/<?php echo $product['id'];?>">Editar</a>

											<a style="margin-top: 5px;" class="btn btn-danger btn-sm" href="<?php echo BASE_URL; ?>inventory/delete/<?php echo $product['id'];?>" onclick="return confirm('Cofirmar a Exclusão')">Excluir</a>
											<a style="margin-top: 5px;" class="btn btn-default btn-sm" href="<?php echo BASE_URL; ?>inventory/view/<?php echo $product['id'];?>">Vizualizar</a>
										<?php else:?>
											<a style="margin-top: 5px;" class="btn btn-info btn-sm" href="<?php echo BASE_URL; ?>inventory/view/<?php echo $product['id'];?>">Vizualizar</a>

										<?php endif;?>
									</td>

								</tr>
							<?php endforeach; ?>
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