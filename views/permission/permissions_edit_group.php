
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Editar Grupo de Permissões</h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
	<form method="POST">
	   <div class="box-body">
	   		<div class="form-group">	
				<label>Nome do Grupo</label>
				<input type="text" name="name" value="<?php echo $group_info['name']; ?>" class="form-control" />
			</div>

		<div class="form-group">	
		<h3>Permissões</h3>
		
		<?php  foreach($permissions_list as $p): ?>
			<div class="checkbox">
				<label for="p_<?php echo $p['id']; ?>">
			<input type="checkbox" name="permissions[]" value="<?php echo $p['id'];?>" id="p_<?php echo $p['id']; ?>" <?php  echo (in_array($p['id'], $group_info['params']))?'checked="checked"':'';?>/>
			<?php echo $p['name']; ?>
			</label>
			</div>
		<?php endforeach; ?>
	</div>
		<input type="submit" value="Salvar" class="btn btn-success" />
		<a href="<?php echo BASE_URL;?>permissions" class="btn btn-danger">Cancelar</a>
	</div>
	</form>

</div>
