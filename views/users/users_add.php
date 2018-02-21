<!-- 
############################################
# Programador: Eduardo Gonçalves Filho.    # 
# E-mail: Eduardo_2012_@hotmail.com.       #
# Data: 15/01/2018.                        #
############################################ 
-->

<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Adicionar Usuário</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>


  <form method="POST">
    <div class="box-body">
      <div class="row">
        <div class="col-md-12">
          <?php if(isset($error_msg) && !empty($error_msg)):?>
            <div class="alert alert-danger"><?php echo $error_msg;?></div>
          <?php endif;?>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="name" class="form-control" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" class="form-control" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Usúario:</label>
            <input type="text" name="user" id="user" class="form-control" required>
            <div class="userSuccess" id="userSuccess"></div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Confirmer o Usúario:</label>
            <input type="text"  id="user_confirme" onchange="confirmeUser(event)" class="form-control user_confirme" required>
            <div class="userError" id="userError"></div>
            <div class="userSuccess" id="userSuccess"></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Senha:</label>
            <input type="password" name="password" id="password" class="form-control " required>
            <div class="userPassSuccess" id="userPassSuccess"></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Confirme a Senha:</label>
            <input type="password" id="password_confirme" onchange="confirmePassord(event)" class="form-control password_confirme" required>
            <div class="userPassError" id="userPassError"></div>
            <div class="userPassSuccess" id="userPassSuccess"></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label >Grupo de Permissões</label><br/>
            <select name="group" id="group" class="form-control" required>
              <option value="">Selecione</option>
              <?php foreach($group_list as $g): ?>
                <option value="<?php echo $g['id']; ?>"><?php echo $g['name']; ?></option>
              <?php endforeach ; ?>

            </select>
          </div>
        </div>
      </div>
      <input type="submit" value="Adicionar" class="btn btn-success btn-sm"/>
      <a href="<?php echo BASE_URL;?>users" class="btn btn-danger btn-sm">Cancelar</a>
    </div>
  </form>

</div>
<script type="text/javascript" src=" <?php echo BASE_URL;?>assets/js/script_add_users.js"></script>
