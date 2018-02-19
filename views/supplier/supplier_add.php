<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Adicionar Fornecedor</h3>

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
            <label>Nome:</label>
            <input type="text" name="name" class="form-control ">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" class="form-control ">
          </div>
        </div>
         <div class="col-md-6">
          <div class="form-group">
            <label>Contato:</label>
            <input type="text" name="phone" class="form-control ">
          </div>
        </div>


        <div class="col-md-6">
          <div class="form-group">
            <label>Estrelas:</label>
           	<select name="stars" class="form-control">
			<option value="1">1 Estrela</option>
			<option value="2">2 Estrelas</option>
			<option value="3" selected="selected">3 Estrelas</option>
			<option value="4">4 Estrelas</option>
			<option value="5">5 Estrelas</option>
		</select>
          </div>
        </div>
    <div class="col-md-12">
    	 <hr>
    </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Cep:</label>
            <input type="text" name="address_zipcode" class="form-control ">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Rua:</label>
            <input type="text" name="address" class="form-control ">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Número:</label>
            <input type="text" name="address_number" class="form-control ">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Complemento:</label>
            <input type="text" name="address2" class="form-control ">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Bairro:</label>
            <input type="text" name="address_neighb" class="form-control ">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Cidade:</label>
            <input type="text" name="address_city" class="form-control ">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Estado:</label>
            <input type="text" name="address_state" class="form-control ">
          </div>
        </div>
	     <div class="col-md-6">
          <div class="form-group">
            <label>País:</label>
            <input type="text" name="address_country" class="form-control ">
          </div>
        </div>
            <div class="col-md-12">
    	 <hr>
    </div>
                <div class="col-md-12">
          <div class="form-group">
            <label>Observações Internas:</label>
         <textarea name="internal_obs" class="form-control"></textarea>
          </div>
        </div>
</div>
	      <input type="submit" value="Adicionar" class="btn btn-success"/>
      <a href="<?php echo BASE_URL;?>clients" class="btn btn-danger">Cancelar</a>
  </div>
</form>
</div>

<script type="text/javascript" src=" <?php echo BASE_URL;?>assets/js/script_clients_add.js"></script>
