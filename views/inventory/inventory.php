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
			<div class="text-center">
				<div class="col-sm-4">
					<div class="btn btn-success" data-toggle="tooltip" data-placement="left"  title="Estoque cheio."></div><span> Estoque cheio.</span>
				</div>
				<div class="col-sm-4">
					<div class="btn btn-warning" data-toggle="tooltip" data-placement="left" title="Estoque baixo."></div><span> Estoque baixo.</span>
				</div>
				<div class="col-sm-4">
					<div class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="Estoque vazio."></div><span> Estoque vazio.</span>
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
						<th class="text-center">Ações</th>
					</tr>
				</thead>
				<tbody id="myTable">
					<?php foreach($inventory_list as $product): ?>
						<tr>
							<td><?php echo utf8_decode($product['cod_inventory']);?></td>
							<td><?php echo utf8_decode($product['cod_bars']);?></td>
							<td><?php echo utf8_decode($product['name']);?></td>
							<td>R$ <?php echo number_format($product['price'], 2, ',','.');?></td>

							<td>	
								<?php 
								if ($product['quant'] > $product['min_quant']) {
									echo '<span class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="right" title="Estoque cheio.">'.($product['quant']).'</span>';
								}else if($product['quant'] == 0){
									echo '<span class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="right" title="Estoque vazio.">'.($product['quant']).'</span>';
								} 
								else if($product['quant'] < $product['min_quant']){
									echo '<span class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="rigth" title="Estoque baixo.">'.($product['quant']).'</span>';
								} else if($product['quant'] == $product['min_quant']){
									echo '<span class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="rigth" title="Estoque baixo.">'.($product['quant']).'</span>';
								}
								?></td>
								<td>

									<?php 
									if ($product['min_quant'] >= $product['quant']) {
										echo '<span class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="rigth" title="Estoque baixo.">'.($product['min_quant']).'</span>';
									}else{
										echo $product['min_quant'];
									}
									?></td>
									<td width="130" class="text-center">
										<?php if($add_permission): ?>

											<div class="dropdown">
												<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
													Ações <span class="caret"></span></button>
													<ul class="dropdown-menu dropdown-menu-left">
														<li>
															<a href="<?php echo BASE_URL; ?>inventory/edit/<?php echo $product['id'];?>"><i class="fa fa-edit"></i>Editar</a>
														</li>
														<li>
															<a data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i>Excluir</a>
														</li>
														<li>
															<a href="<?php echo BASE_URL; ?>inventory/view/<?php echo $product['id'];?>"><i class="fa fa-eye"></i>Visualizar</a>
														</li>

													</ul>
												</div>

											<?php else:?>
												<div class="dropdown">
													<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
														<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
															Ações <span class="caret"></span></button>
															<ul class="dropdown-menu" role="menu">
																<li>
																	<a href="<?php echo BASE_URL; ?>inventory/view/<?php echo $product['id'];?>"><i class="fa fa-eye"></i>Visualizar</a>

																</li>
															</ul>
														</div>

													<?php endif;?>
												</td>

											</tr>
										<?php endforeach; ?>
									</tbody>

								</table>
							</div>

							<div class="container">
								<!-- Modal -->
								<div class="modal fade" id="myModal" role="dialog">
									<div class="modal-dialog modal-sm">
										<div class="modal-content">
											<div class="modal-header alert-danger text-center">
												<button type="button" class="close" data-dismiss="modal">&times;</button>
												<h4 class="modal-title">Atenção!</h4>
											</div>
											<div class="modal-body">
												<p>Realmente quer excluir esse produto? </p>
											</div>
											<div class="modal-footer">
												<a class="btn btn-success" href="<?php echo BASE_URL; ?>inventory/delete/<?php echo $product['id'];?>">Sim</a>
												<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>