

<!-- Exemplo -->
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Clientes</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">

		<div class="row" style="margin-bottom: 20px;">

			<div class="col-sm-12">
				<?php if($edit_permission): ?>

					<a href="<?php echo BASE_URL;?>clients/add" class="btn btn-primary">Adicionar Cliente</a>
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
					<td>Cod.</td>
					<th>Nome</th>
					<th>Telefone</th>
					<th>CPF/CNPJ</th>
					<th>Estrelas</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php foreach($clients_list as $c): ?>
					<tr>	
						<td><?php echo $c['id']; ?></td>
						<td><?php echo utf8_decode($c['name']); ?></td>
						<td><?php echo $c['phone']; ?></td>
						<td><?php echo utf8_decode($c['cpf_cnpj']); ?></td>
						<td><?php echo $c['stars']; ?></td>

						<td width="150">
							<?php if($edit_permission): ?>
								<a style="margin-top: 5px;" class="btn btn-info btn-sm" href="<?php echo BASE_URL; ?>clients/edit/<?php echo $c['id'];?>">Editar</a>

								<a style="margin-top: 5px;" class="btn btn-danger btn-sm" href="<?php echo BASE_URL; ?>clients/delete/<?php echo $c['id'];?>" onclick="return confirm('Cofirmar a Exclusão')">Excluir</a>
							<?php else: ?>
								<a style="margin-top: 5px;" class="btn btn-default btn-sm" href="<?php echo BASE_URL; ?>clients/view/<?php echo $c['id'];?>">Visualizar</a>
							<?php endif; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<nav aria-label="Page navigation">
			<ul class="pagination">

				<?php for($q=1;$q<=$p_count;$q++):?>

					<li class=" <?php echo ($q==$p)?'active':''?>"><a href="<?php echo BASE_URL;?>clients?p=<?php echo $q;?>"><?php echo $q;?></a></li>
				<?php endfor;?>
			</ul>
		</nav>


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