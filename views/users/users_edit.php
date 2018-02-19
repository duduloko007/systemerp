<!-- 
############################################
# Programador: Eduardo Gonçalves Filho.    # 
# E-mail: Eduardo_2012_@hotmail.com.       #
# Data: 15/01/2018.                        #
############################################ 
-->
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Editar Usuário</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>

            <?php if(isset($error_msg) && !empty($error_msg)):?>
				<div class="alert alert-danger"><?php echo $error_msg;?></div>
			<?php endif;?>
  <form method="POST">
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>E-mail:</label>
            <input disabled type="text" name="name" class="form-control" value="<?php echo $user_info['email']; ?>" />
          </div>
        </div>
           <div class="col-md-6">
            <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password" class="form-control ">
          </div>
           </div>
              <div class="col-md-6">
            <div class="form-group">
            <label >Grupo de Permissões</label><br/>
		<select name="group" id="group" class="form-control">
			<?php foreach($group_list as $g): ?>
				<option value="<?php echo $g['id']; ?>" <?php echo ($g['id']==$user_info['id_group'])? 'selected="selected"':''; ?>><?php echo $g['name'] ;?></option>
				
			<?php endforeach ; ?>
			
		</select>
          </div>
           </div>
      </div>
      <input type="submit" value="Salvar" class="btn btn-success"/>
      <a href="<?php echo BASE_URL;?>users" class="btn btn-danger">Cancelar</a>
      
    </div>
  </form>
</div>