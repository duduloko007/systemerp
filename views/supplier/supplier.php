

<!-- Exemplo -->
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Usuários</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>

  <div class="box-body">

	<?php if($edit_permission): ?>

	<a href="<?php echo BASE_URL;?>supplier/add" class="btn btn-primary">Adicionar Cliente</a>
	<?php endif; ?>

	<input type="text" id="busca" data-type="search_clients" />
	
<table class="table  table-responsive table-bordered table-striped">
	<thead>
	<tr>
		<th>Nome</th>
		<th>Telefone</th>
		<th>Cidade</th>
		<th>Estrelas</th>
		<th>Ações</th>
	</tr>
</thead>
<tbody>
	<?php foreach($clients_list as $c): ?>
		<tr>
			<td><?php echo utf8_decode($c['name']); ?></td>
			<td><?php echo $c['phone']; ?></td>
			<td><?php echo utf8_decode($c['address_city']); ?></td>
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


