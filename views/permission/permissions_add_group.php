
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Adicionar Grupo de Permissões</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
	<form method="POST">
	   <div class="box-body">
	   		<div class="form-group">	
				<label>Nome do Grupo</label>
				<input type="text" name="name" class="form-control" />
			</div>

		<div class="form-group">	
		<h3>Permissões</h3>

		<?php  foreach($permissions_list as $p): ?>
			<div class="checkbox">
				<label for="p_<?php echo $p['id']; ?>">
			<input type="checkbox" name="permissions[]" value="<?php echo $p['id']; ?>" id="p_<?php echo $p['id']; ?>"/>
			<?php echo $p['name']; ?>
			</label>
			</div>
		<?php endforeach; ?>
	</div>
		<input type="submit" value="Adicionar" class="btn btn-success btn-sm" />
		<a href="<?php echo BASE_URL;?>permissions" class="btn btn-danger btn-sm">Cancelar</a>
	</div>
	</form>

</div>

