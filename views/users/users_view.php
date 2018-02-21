
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Editar Usuário</h3>

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
            <input type="text" name="name" class="form-control" disabled value="<?php echo $user_info['name_user']; ?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" class="form-control" disabled value="<?php echo $user_info['email']; ?>">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Usúario:</label>
            <input type="text" name="user" id="user" class="form-control" disabled value="<?php echo $user_info['user']; ?>">
            <div class="userSuccess" id="userSuccess"></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label >Grupo de Permissões</label><br/>
            <select name="group" id="group" class="form-control">
             <?php foreach($group_list as $g): ?>
              <option value="<?php echo $g['id']; ?>" <?php echo ($g['id']==$user_info['id_group'])? 'selected="selected"':''; ?>><?php echo $g['name'] ;?></option>

            <?php endforeach ; ?>

          </select>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label>Status:</label>
          <select name="status" class="form-control" disabled>
            <?php foreach($status_user as $statusKey => $statusValue): ?>

             <option value="<?php echo $statusKey ;?>" <?php echo($statusKey == $user_info['status'])?'selected="selected"':'' ;?>>

               <?php echo $statusValue; ?>
             </option>
           <?php endforeach ; ?>
         </select>
       </div>
     </div>
   </div>
   <a href="<?php echo BASE_URL;?>users" class="btn btn-danger btn-sm">Voltar</a>
 </div>
</form>

</div>
<script type="text/javascript" src=" <?php echo BASE_URL;?>assets/js/script_add_users.js"></script>
