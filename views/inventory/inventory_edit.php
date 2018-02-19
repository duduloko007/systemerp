
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Editar Produto</h3>

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
            <input type="text" name="name" class="form-control "  value="<?php   echo $inventory_info['name'] ;?>"  required />
          </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
            <label>Preço:</label>
            <input type="text" name="price" class="form-control "  value="<?php   echo number_format($inventory_info['price'], 2) ;?>" required>
          </div>
           </div>
           <div class="col-md-6">
            <div class="form-group">
           	 	<label>Quantidade:</label>
           	 	<input type="number" name="quant" class="form-control " value="<?php   echo $inventory_info['quant'] ;?>"/>
          </div>
      		</div>
                     <div class="col-md-6">
            <div class="form-group">
            <label>Quantidade Mínima:</label>
            <input type="number" name="min_quant" class="form-control " value="<?php   echo $inventory_info['min_quant'] ;?>"/>
          </div>
          </div>
          
      </div>
      <input type="submit" value="Salvar" class="btn btn-success"/>
      <a href="<?php echo BASE_URL;?>inventory" class="btn btn-danger">Cancelar</a>
    </div>
  </form>
</div>
<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/script_inventory_add.js"></script>
