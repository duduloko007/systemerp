
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Cliente <?php echo $type_person_register[$client_info['person_type']];?></h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>

  <div class="box-body">
    <?php if($client_info['person_type'] == '1'):?>
      <form method="POST">
        <div class="row">
          <div class="col-md-12">
           <div class="form-group">
            <label><strong>Código: </strong><?php   echo $client_info['cod_client'] ;?></label>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Nome:</label>
            <input type="text" name="name" class="form-control " disabled value="<?php echo utf8_decode($client_info['name']); ?>">
          </div>
        </div>

        <div class="col-md-4" >
          <div class="form-group">
            <label>Data Nascimento:</label>
            <input type="text" name="date_birth_fund" id="date_birth" class="form-control" disabled value="<?php echo date('d/m/Y', strtotime($client_info['date_birth_fund'])); ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>identidade:</label>
            <input type="text" name="identidade" id="identidade" class="form-control " disabled value="<?php echo $client_info['identidade']; ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>CPF:</label>
            <input type="text" name="cpf_cnpj" id="cpf" class="form-control" disabled value="<?php echo $client_info['cpf_cnpj']; ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" class="form-control" disabled value="<?php echo $client_info['email']; ?>"> 
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Telefone:</label>
            <input type="text" name="phone_fix" class="form-control" disabled value="<?php echo $client_info['phone_fix']; ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Celular:</label>
            <input type="text" name="phone" class="form-control" disabled value="<?php echo $client_info['phone']; ?>">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Estrelas:</label>
            <select name="stars" class="form-control" disabled>
             <option value="1" <?php echo ($client_info['stars'] =='1')?'selected="selected"':''; ?>>1 Estrela</option>
             <option value="2" <?php echo ($client_info['stars'] =='2')?'selected="selected"':''; ?>>2 Estrelas</option>
             <option value="3" <?php echo ($client_info['stars'] =='3')?'selected="selected"':''; ?>>3 Estrelas</option>
             <option value="4" <?php echo ($client_info['stars'] =='4')?'selected="selected"':''; ?>>4 Estrelas</option>
             <option value="5" <?php echo ($client_info['stars'] =='5')?'selected="selected"':''; ?>>5 Estrelas</option>
           </select>
         </div>
       </div>
       <div class="col-md-4">
        <div class="form-group">
          <label>Data Cadastro:</label>
          <input type="text"  class="form-control " id="date_register"  disabled value="<?php echo date('d/m/Y', strtotime($client_info['date_register'])); ?>" required>
        </div>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Cep:</label>
          <input type="text" name="address_zipcode" class="form-control " disabled value="<?php echo $client_info['address_zipcode']; ?>">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Logradouro:</label>
          <input type="text" name="address" class="form-control " disabled value="<?php echo utf8_decode($client_info['address']); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Número:</label>
          <input type="text" name="address_number" class="form-control " disabled value="<?php echo $client_info['address_number']; ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Complemento:</label>
          <input type="text" name="address2" class="form-control " disabled value="<?php echo utf8_decode($client_info['address2']); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Bairro:</label>
          <input type="text" name="address_neighb" class="form-control " disabled value="<?php echo utf8_decode($client_info['address_neighb']); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Cidade:</label>
          <input type="text" name="address_city" class="form-control " disabled value="<?php echo utf8_decode($client_info['address_city']); ?>"> 
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Estado:</label>
          <input type="text" name="address_state" class="form-control " disabled value="<?php echo utf8_decode($client_info['address_state']); ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>País:</label>
          <input type="text" name="address_country" class="form-control " disabled value="<?php echo utf8_decode($client_info['address_country']); ?>">
        </div>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Observações Internas:</label>
          <textarea name="internal_obs" class="form-control" disabled><?php echo utf8_decode($client_info['internal_obs']); ?></textarea>
        </div>
      </div>
    </div>
    <a href="<?php echo BASE_URL;?>clients" class="btn btn-danger btn-sm">Voltar</a>
  </form>

<?php else:?>

  <form method="POST">
   <div class="row">
    <div class="col-md-4">
      <div class="form-group">
        <label>Nome/Razão social:</label>
        <input type="text" name="name" class="form-control " disabled value="<?php echo utf8_decode($client_info['name']); ?>">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Nome/Fantasia:</label>
        <input type="text" name="name_fantasy" class="form-control " disabled value="<?php echo utf8_decode($client_info['name_fantasy']); ?>">
      </div>
    </div>
    <div class="col-md-4" >
      <div class="form-group">
        <label>Data Fundação:</label>
        <input type="text" name="date_birth_fund" id="date_fund" class="form-control" disabled value="<?php echo date('d/m/Y', strtotime($client_info['date_birth_fund'])); ?>">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>CNPJ:</label>
        <input type="text" name="cpf_cnpj" id="cnpj" class="form-control" disabled value="<?php echo $client_info['cpf_cnpj']; ?>">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Inscrição estadual:</label>
        <input type="text" name="state_registration" id="state_registration " class="form-control" disabled value="<?php echo $client_info['state_registration']; ?>">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Inscrição municipal:</label>
        <input type="text" name="municipal_registration" id="municipal_registration" class="form-control" disabled value="<?php echo $client_info['municipal_registration']; ?>">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>E-mail:</label>
        <input type="email" name="email" class="form-control " disabled value="<?php echo $client_info['email']; ?>">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Telefone:</label>
        <input type="text" name="phone_fix" class="form-control" disabled value="<?php echo $client_info['phone_fix']; ?>">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Celular:</label>
        <input type="text" name="phone" class="form-control " disabled value="<?php echo $client_info['phone']; ?>">
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label>Estrelas:</label>
        <select name="stars" class="form-control" disabled>
         <option value="1" <?php echo ($client_info['stars'] =='1')?'selected="selected"':''; ?>>1 Estrela</option>
         <option value="2" <?php echo ($client_info['stars'] =='2')?'selected="selected"':''; ?>>2 Estrelas</option>
         <option value="3" <?php echo ($client_info['stars'] =='3')?'selected="selected"':''; ?>>3 Estrelas</option>
         <option value="4" <?php echo ($client_info['stars'] =='4')?'selected="selected"':''; ?>>4 Estrelas</option>
         <option value="5" <?php echo ($client_info['stars'] =='5')?'selected="selected"':''; ?>>5 Estrelas</option>
       </select>
     </div>
   </div>
   <div class="col-md-4">
    <div class="form-group">
      <label>Data Cadastro:</label>
      <input type="text"  class="form-control " id="date_register"  disabled value="<?php echo date('d/m/Y', strtotime($client_info['date_register'])); ?>" required>
    </div>
  </div>
  <div class="col-md-12">
    <hr>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Cep:</label>
      <input type="text" name="address_zipcode" class="form-control" disabled value="<?php echo $client_info['address_zipcode']; ?>">
    </div>
  </div>

  <div class="col-md-6">
    <div class="form-group">
      <label>Logradouro:</label>
      <input type="text" name="address" class="form-control" disabled value="<?php echo utf8_decode($client_info['address']); ?>">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Número:</label>
      <input type="text" name="address_number" class="form-control" disabled value="<?php echo $client_info['address_number']; ?>">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Complemento:</label>
      <input type="text" name="address2" class="form-control " disabled value="<?php echo utf8_decode($client_info['address2']); ?>">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Bairro:</label>
      <input type="text" name="address_neighb" class="form-control " disabled value="<?php echo utf8_decode($client_info['address_neighb']); ?>">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Cidade:</label>
      <input type="text" name="address_city" class="form-control " disabled value="<?php echo utf8_decode($client_info['address_city']); ?>">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>Estado:</label>
      <input type="text" name="address_state" class="form-control " disabled value="<?php echo utf8_decode($client_info['address_state']); ?>">
    </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
      <label>País:</label>
      <input type="text" name="address_country" class="form-control " disabled value="<?php echo utf8_decode($client_info['address_country']); ?>">
    </div>
  </div>
  <div class="col-md-12">
    <hr>
  </div>
  <div class="col-md-12">
    <div class="form-group">
      <label>Observações Internas:</label>
      <textarea name="internal_obs" class="form-control" disabled><?php echo utf8_decode($client_info['internal_obs']); ?></textarea>
    </div>
  </div>
</div>
<a href="<?php echo BASE_URL;?>clients" class="btn btn-danger btn-sm">Voltar</a>
</form>



<?php endif;?>
</div>
</div>

<script type="text/javascript" src=" <?php echo BASE_URL;?>assets/js/script_clients_add.js"></script>
