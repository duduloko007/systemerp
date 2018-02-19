<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Adicionar Compra</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
        <?php
          if(!empty($msg)){
            ?>
              <div class="alert alert-danger"><?php echo $msg; ?></div>
          <?php
          }
        ?>
  <form method="POST">
    <div class="box-body">
      <div class="row">
          <div class="col-md-6">
          <div class="form-group">

            <label>Nome do fornecedor:</label>
            <select name="stars" class="form-control">
              <option></option>
               <?php foreach($suppliers_list as $lista):?>
                  <option value="<?php echo $lista['name'];?>"><?php echo $lista['name'];?></option>
          <?php endforeach;?>
    </select>
          </div>
        </div>
          <div class="col-md-6">
          <div class="form-group">
            <label>data da compra:</label>
            <input type="date" name="data" class="form-control ">
          </div>
        </div>
         <div class="col-md-6">
          <div class="form-group">

            <label>Produto:</label>
            <select name="produto" class="form-control" id="produto">
                 <option></option>
               <?php foreach($inventory_list as $lista):?>
                  <option value="<?php echo $lista['id'];?>"><?php echo $lista['name'];?></option>
          <?php endforeach;?>
             </select>
          </div>
        </div>
         <div class="col-md-6">
          <div class="form-group">
            <label>Quantidade:</label>
            <input type="text" name="quant" class="form-control " id="quant">
          </div>
        </div>
         <div class="col-md-6">
          <div class="form-group">
            <label>Preço:</label>
            <input type="text" name="preco" class="form-control money" id="preco">
          </div>
        </div>
        
            <div class="col-md-12">
    	 <hr>
    </div>
</div>
	      <input type="submit" value="Adicionar" class="btn btn-success"/>
      <a href="<?php echo BASE_URL;?>purchases" class="btn btn-danger">Cancelar</a>
  </div>
</form>
</div>
<script type="text/javascript">
  $('.money').mask('000.000.000.000.000,00', {reverse: true});
</script>