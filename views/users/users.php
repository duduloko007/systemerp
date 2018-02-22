<!-- 
############################################
# Programador: Eduardo Gonçalves Filho.    # 
# E-mail: Eduardo_2012_@hotmail.com.       #
# Data: 21/02/2018.                        #
############################################ 
-->
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Usuários</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">
		<div class="row" style="margin-bottom: 20px;">
			<?php if($add_permission):?>
				<div class="col-md-12">
					<a href="<?php echo BASE_URL;?>users/add" class="btn btn-primary btn-sm">Adicionar Usuário</a>
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
		<table class="table  table-responsive table-bordered table-striped">
			<thead>
				<tr>
					<th>Cód</th>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Status</th>
					<th>Grupo</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody id="myTable">

				<?php foreach($users_list as $us): ?>
					<tr>
						<td><?php echo $us['id']; ?></td>
						<td><?php echo utf8_decode($us['name_user']); ?></td>
						<td><?php echo $us['email']; ?></td>
						<td><?php echo  $status_user[$us['status']]; ?></td>
						<td><?php echo utf8_decode($us['name']); ?></td>
						<td>
							<?php if($edit_permission):?>
								<a class="btn btn-info btn-sm" href="<?php echo BASE_URL; ?>users/edit/<?php echo $us['id'];?>">Editar</a>

								<a class="btn btn-danger btn-sm" href="<?php echo BASE_URL; ?>users/delete/<?php echo $us['id'];?>" onclick="return confirm('Cofirmar a Exclusão')">Excluir</a>

								<a class="btn btn-default btn-sm" href="<?php echo BASE_URL; ?>users/view/<?php echo $us['id'];?>">Visualizar</a>
							<?php else:?>
								<div>Sem permissões</div>
							<?php endif;?>

						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>