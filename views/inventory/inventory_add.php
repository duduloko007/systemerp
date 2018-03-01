
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Adicionar Produto</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>

  <?php if(isset($error_msg) && !empty($error_msg)):?>
    <div class="alert alert-danger"><?php echo $error_msg;?></div>
  <?php endif;?>
  <form method="POST">
    <div class="box-body">

        <?php if(isset($cadastro_produto) && !empty($cadastro_produto)):?>
            <div class="alert alert-success alert-dismissible fade in text-center w3-animate-top" role="alert">
        <?php echo $cadastro_produto;?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php else : ?>
      <div class="alert alert-warning alert-dismissible fade in text-center w3-animate-top" role="alert">
        <strong>Atenção!</strong> todos os campos com  <strong class="text-red">*</strong>  são obrigatórios.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
          <?php endif;?>
      <div class="row">
        <div class="col-md-6"> 
          <div class="form-group">
            <label>Nome:<strong class="text-red">*</strong></label>
            <input type="text" name="name" class="form-control " required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Cód. Barras:</label>
            <input type="text" name="cod_bars" class="form-control " required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Preço Custo:<strong class="text-red">*</strong></label>
            <input type="text" name="price_cust" id="price_cust" class="form-control " required/>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Porcentagem de Venda (%):</label>
            <input type="text" name="price_percentage" id="price_percentage" class="form-control" value="0" onkeyup="pricePercentage(event)">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Preço Venda:<strong class="text-red">*</strong></label>
            <input type="text" name="price" id="price" class="form-control " required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Quantidade:<strong class="text-red">*</strong></label>
            <input type="number" name="quant" class="form-control " value="0" required>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label>Quantidade Mínima:</label>
            <input type="number" name="min_quant" class="form-control " value="0">
          </div>
        </div>
        
      </div>
      <input type="submit" value="Adicionar" class="btn btn-success btn-sm"/>
      <a href="<?php echo BASE_URL;?>inventory" class="btn btn-danger btn-sm">Cancelar</a>
    </div>
  </form>
</div>
<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/script_inventory_add.js"></script>
