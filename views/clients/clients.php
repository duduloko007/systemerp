

<!-- Exemplo -->
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Clientes</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">
		<?php if(isset($cliente_cadastrado)):?>
			<div class="alert alert-warning alert-dismissible fade in text-center w3-animate-top" role="alert">
				<?php echo $cliente_cadastrado?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif;?>
		<?php if(isset($cliente_erro)):?>
			<div class="alert alert-warning alert-dismissible fade in text-center w3-animate-top" role="alert">
				<?php echo $cliente_erro?>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		<?php endif;?>
		<div class="row" style="margin-bottom: 20px;">

			<div class="col-sm-12">
				<?php if($edit_permission): ?>

					<a href="<?php echo BASE_URL;?>clients/add" class="btn btn-primary btn-sm">Adicionar Cliente</a>
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
					<th>Tipo</th>
					<th>Telefone</th>
					<th>CPF/CNPJ</th>
					<th>Estrelas</th>
					<th class="text-center">Ações</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php foreach($clients_list as $c): ?>
					<tr>	
						<td><?php echo $c['cod_client']; ?></td>
						<td><?php echo utf8_decode($c['name']); ?></td>
						<td><?php echo $type_person_register[$c['person_type']];?></td>
						<td><?php echo $c['phone']; ?></td>
						<td><?php echo utf8_decode($c['cpf_cnpj']); ?></td>
						<td><?php echo $c['stars']; ?></td>

						<td width="130" class="text-center">
							<?php if($edit_permission): ?>

								<div class="dropdown">
									<button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
										Ações <span class="caret"></span></button>
										<ul class="dropdown-menu dropdown-menu-left">
										<li>
											<a href="<?php echo BASE_URL; ?>clients/edit/<?php echo $c['id'];?>"><i class="fa fa-edit"></i>Editar</a>
										</li>
										<li>
											<a href="<?php echo BASE_URL; ?>clients/delete/<?php echo $c['id'];?>" onclick="return confirm('Cofirmar a Exclusão')"><i class="fa fa-trash-o"></i>Excluir</a>
										</li>
										<li>
											<a href="<?php echo BASE_URL; ?>clients/view/<?php echo $c['id'];?>"><i class="fa fa-eye"></i>Visualizar</a>
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
													<a href="<?php echo BASE_URL; ?>clients/view/<?php echo $c['id'];?>">Visualizar</a>
												</li>
											</ul>
									</div>

									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

				<nav aria-label="page navigation">
					<ul class="pagination">

						<?php for($q=1;$q<=$p_count;$q++):?>

							<li class=" <?php echo ($q==$p)?'active':''?>"><a href="<?php echo BASE_URL;?>clients?p=<?php echo $q;?>"><?php echo $q;?></a></li>
						<?php endfor;?>
					</ul>
				</nav>


			</div>
		</div>