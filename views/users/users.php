<!-- 
############################################
# Programador: Eduardo Gonçalves Filho.    # 
# E-mail: Eduardo_2012_@hotmail.com.       #
# Data: 15/01/2018.                        #
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

	<a href="<?php echo BASE_URL;?>users/add" class="btn btn-primary">Adicionar Usuário</a>

<table class="table  table-responsive table-bordered table-striped">
	<thead>
	<tr>
		<th>E-mail</th>
		<th>Grupo</th>
		<th>Ações</th>
	</tr>
</thead>
<tbody>

	<?php foreach($users_list as $us): ?>
		<tr>
			<td><?php echo $us['email']; ?></td>
			<td><?php echo utf8_decode($us['name']); ?></td>
			<td width="150">
				<a class="btn btn-info btn-sm" href="<?php echo BASE_URL; ?>users/edit/<?php echo $us['id'];?>">Editar</a>

			<a class="btn btn-danger btn-sm" href="<?php echo BASE_URL; ?>users/delete/<?php echo $us['id'];?>" onclick="return confirm('Cofirmar a Exclusão')">Excluir</a>

			</td>
		</tr>
	<?php endforeach; ?>
</tbody>
</table>
</div>
</div>