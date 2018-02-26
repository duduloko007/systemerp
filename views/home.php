

<!-- Exemplo -->
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Dashboard</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">

		<div class="row">
			<div class="col-sm-3 ">
				
				<div class="small-box bg-blue">
					<div class="inner">
						<h3>R$ <?php echo number_format($revenue, 2, ',','.') ;?></h3>

						<p>Vendas</p>
					</div>
					<div class="icon">
						<i class="fa fa-line-chart"></i>
					</div>
					<a href="<?php echo BASE_URL;?>sales" class="small-box-footer">Mais informação <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-sm-3 ">

				<div class="small-box bg-green">
					<div class="inner">
						<h3>R$ <?php echo number_format($total_receive, 2, ',','.') ;?></h3>

						<p>Contas a Receber</p>
					</div>
					<div class="icon">
						<i class="fa fa-dollar"></i>
					</div>
					<a href="<?php echo BASE_URL;?>receive" class="small-box-footer">Mais informação <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-sm-3 ">
				
				<div class="small-box bg-red">
					<div class="inner">
						<h3>R$ <?php echo number_format($total_pay_maturity, 2, ',','.') ;?></h3>

						<p>Contas a Pagar Vencidas</p>
					</div>
					<div class="icon">
						<i class="fa fa-calendar-times-o"></i>
					</div>
					<a href="<?php echo BASE_URL;?>#" class="small-box-footer">Mais informação <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>
			<div class="col-sm-3 ">
				
				<div class="small-box bg-teal">
					<div class="inner">
						<h3>R$ <?php echo number_format($expenses, 2, ',','.') ;?></h3>

						<p>Compras</p>
					</div>
					<div class="icon">
						<i class="ion ion-pie-graph"></i>
					</div>
					<a href="<?php echo BASE_URL;?>#" class="small-box-footer">Mais informação <i class="fa fa-arrow-circle-right"></i></a>
				</div>
			</div>


		</div>


		<div class="row">
			<!-- gráficos -->


			<div class="col-sm-6 col-xs-12">

				<h3>Vendas e Compras dos últimos 30 dias</h3>
				<canvas id="rel1" style="width: 100%; height:300px;border: 1px solid #EEE;"></canvas>


			</div>
			<div class="col-sm-6 col-xs-12" >
				<h3>Status de Pagamentos</h3>
				<div  style="border: 1px solid #EEE;"><canvas id="rel2" style="width: 100%; height:300px;"></canvas></div>

			</div>
			<div class="col-sm-6 col-xs-6">

				<?php if(isset($pay_maturity) && !empty($pay_maturity)):?>
					<h3>Contas a Pagar Vencidas</h3>
					<div  style=" height: 260px; overflow: auto;">
						<table class="table  table-responsive table-bordered table-striped">
							<thead>
								<tr>
									<th>Data</th>
									<th>Descrição</th>
									<th>Vencimento</th>
									<th>Valor</th>
								</tr>
							</thead>
							<tbody id="myTable">

								<?php foreach($pay_maturity as $pay_item): ?>
									<tr>

										<td><?php echo date('d/m/Y', strtotime($pay_item['date_document'])) ?></td>
										<td><?php echo utf8_decode($pay_item['description']); ?></td>
										<td class="text-red"><?php echo date('d/m/Y', strtotime($pay_item['date_maturity'])) ?></td>
										<td>R$ <?php echo number_format( $pay_item['price'], 2, ',','.'); ?></td>

									</tr>

								<?php  endforeach; ?>

							</tbody>
						</table>
						</div>
					<?php else:?>


					<?php endif;?>

				</div>
				<div class="col-sm-6 col-xs-6">

					<?php if(isset($products_sold_min) && !empty($products_sold_min)):?>
						<h3>Produtos com Estoque Baixo</h3>
						<div  style=" height: 260px; overflow: auto;">
							<table class="table  table-responsive table-bordered table-striped">
								<thead>
									<tr>

										<th>Produto</th>
										<th>Quantidade</th>
										<th>Quant. Min.</th>
									</tr>
								</thead>
								<tbody id="myTable">

									<?php foreach($products_sold_min as $product): ?>
										<tr>
											<td><?php echo utf8_decode($product['name']);?></td>
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
													if ($product['min_quant'] >= $product['quant']) {
														echo '<span class="btn btn-warning btn-sm" title="Estoque baixo.">'.($product['min_quant']).'</span>';
													}else{
														echo $product['min_quant'];
													}
													?></td>

												</tr>

											<?php  endforeach; ?>

										</tbody>
									</table>
								</div>
							<?php else:?>


							<?php endif;?>

						</div>
					</div>

				</div>
				<script type="text/javascript">
					var days_list = <?php echo json_encode($days_list);?>;
					var revenue_list = <?php echo json_encode(array_values($revenue_list));?> ;
					var expenses_list = <?php echo json_encode(array_values($expenses_list));?> ;
					var status_name_list = <?php echo json_encode( array_values($form_pay)); ?>;
					var status_list = <?php echo json_encode(array_values($status_list)); ?>;
				</script>
			</div>
			<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/Chart.min.js"></script>
			<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script_home.js"></script>