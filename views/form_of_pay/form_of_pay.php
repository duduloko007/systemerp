

<!-- Exemplo -->
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Formas de Pagamentos</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">
		<div class="row" style="margin-bottom: 20px;">

			<div class="col-sm-12">
				<?php if($add_permission): ?>

					<a href="<?php echo BASE_URL;?>form_of_pay/add" class="btn btn-primary btn-sm">Adicionar Forma de Pagamento</a>
				<?php endif; ?>
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

		<table class="table  table-responsive table-bordered table-striped">
			<thead>
				<tr>
					<th>Cód.</th>
					<th>Nome</th>
					<th>Contas a Receber</th>
					<th class="text-center">Ações</th>
				</tr>
			</thead>
			<tbody id="myTable">

				<?php foreach($form_pay_list as $form_pay): ?>
					<tr>	
						<td><?php echo $form_pay['cod_pay']; ?></td>
						<td><?php echo utf8_decode($form_pay['name_pay']); ?></td>
						<td><?php echo $pay_option[$form_pay['pay_receive']]; ?></td>

						<td width="130" class="text-center">
							<?php if($edit_permission): ?>

								<div class="dropdown">
									<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
										Ações <span class="caret"></span></button>
										<ul class="dropdown-menu dropdown-menu-left">
											<li>
												<a href="<?php echo BASE_URL; ?>form_of_pay/edit/<?php echo $form_pay['id'];?>"><i class="fa fa-edit"></i>Editar</a>
											</li>
											<li>
												<a   data-toggle="modal" data-target="#myModal"><i class="fa fa-trash-o"></i>Excluir</a>
												
											</li>
											<li>
												<a href="<?php echo BASE_URL; ?>form_of_pay/view/<?php echo $form_pay['id'];?>"><i class="fa fa-eye"></i>Visualizar</a>
											</li>

										</ul>
									</div>
								<?php else: ?>
									<div class="dropdown">
										<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
											<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
												Ações <span class="caret"></span></button>
												<ul class="dropdown-menu" role="menu">
													<li>
														<a href="<?php echo BASE_URL; ?>form_of_pay/view/<?php echo $form_pay['id'];?>">Visualizar</a>
													</li>
												</ul>
											</div>

										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

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
										<p>Realmente quer excluir essa forma de pagamento? </p>
									</div>
									<div class="modal-footer">
										<a class="btn btn-success" href="<?php echo BASE_URL; ?>form_of_pay/delete/<?php echo $form_pay['id'];?>">Sim</a>
										<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					


				</div>


			</div>