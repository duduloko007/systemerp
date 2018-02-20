
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Cadastrar Cliente</h3>

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
        <div class="col-md-4">
          <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="name" class="form-control" value="<?php echo utf8_decode($client_info['name']); ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>CPF/CNPJ:</label>
            <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control" value="<?php echo utf8_decode($client_info['cpf_cnpj']); ?>">
          </div>
        </div>
                <div class="col-md-4">
          <div class="form-group">
            <label>Inscrição estadual:</label>
            <input type="text" name="inscri_estadual" id="inscri_estadual" class="form-control" value="<?php echo utf8_decode($client_info['inscri_estadual']); ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" class="form-control" value="<?php echo $client_info['email']; ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Contato:</label>
            <input type="text" name="phone" class="form-control" value="<?php echo $client_info['phone']; ?>">
          </div>
        </div>


        <div class="col-md-4">
          <div class="form-group">
            <label>Estrelas:</label>
            <select name="stars" class="form-control">
             <option value="1" <?php echo ($client_info['stars'] =='1')?'selected="selected"':''; ?>>1 Estrela</option>
             <option value="2" <?php echo ($client_info['stars'] =='2')?'selected="selected"':''; ?>>2 Estrelas</option>
             <option value="3" <?php echo ($client_info['stars'] =='3')?'selected="selected"':''; ?>>3 Estrelas</option>
             <option value="4" <?php echo ($client_info['stars'] =='4')?'selected="selected"':''; ?>>4 Estrelas</option>
             <option value="5" <?php echo ($client_info['stars'] =='5')?'selected="selected"':''; ?>>5 Estrelas</option>
           </select>
         </div>
       </div>
       <div class="col-md-12">
        <hr>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Cep:</label>
          <input type="text" name="address_zipcode" class="form-control" value="<?php echo $client_info['address_zipcode']; ?>">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Rua:</label>
          <input type="text" name="address" class="form-control" value="<?php echo utf8_decode($client_info['address']); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Número:</label>
          <input type="text" name="address_number" class="form-control" value="<?php echo $client_info['address_number']; ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Complemento:</label>
          <input type="text" name="address2" class="form-control " value="<?php echo utf8_decode($client_info['address2']); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Bairro:</label>
          <input type="text" name="address_neighb" class="form-control " value="<?php echo utf8_decode($client_info['address_neighb']); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Cidade:</label>
          <input type="text" name="address_city" class="form-control " value="<?php echo utf8_decode($client_info['address_city']); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Estado:</label>
          <input type="text" name="address_state" class="form-control " value="<?php echo $client_info['address_state']; ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>País:</label>
          <input type="text" name="address_country" class="form-control " value="<?php echo utf8_decode($client_info['address_country']); ?>">
        </div>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Observações Internas:</label>
          <textarea name="internal_obs" class="form-control"><?php echo utf8_decode($client_info['internal_obs']); ?></textarea>
        </div>
      </div>
    </div>
    <input type="submit" value="Salvar" class="btn btn-success"/>
    <a href="<?php echo BASE_URL;?>clients" class="btn btn-danger">Cancelar</a>
  </div>
</form>
</div>

<script type="text/javascript" src=" <?php echo BASE_URL;?>assets/js/script_clients_add.js"></script>
