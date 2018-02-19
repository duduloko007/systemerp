
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Adicionar Conta a Pagar</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
<form method="POST">
  	<div class="box-body">

  		<div class="row">
  			 <div class="col-sm-6">
  			<div class="form-group">
  				<label>Descrição:</label>
  				<input type="text" name="description" class="form-control">
  			</div>
  			</div>
  			 <div class="col-sm-6">
  			<div class="form-group">
  				<label>Documento:</label>
  				<input type="text" name="document" class="form-control">
  			</div>
  			</div>
  			<div class="col-sm-4">
  			<div class="form-group">
  				<label>Data do Documento:</label>
  				<input type="date" name="date_document" class="form-control">
  			</div>
  			</div>
  			 <div class="col-sm-4">
  			<div class="form-group">
  				<label>Data do Vencimento:</label>
  				<input type="date" name="date_maturity" class="form-control">
  			</div>
  			</div>
         <div class="col-sm-4">
        <div class="form-group">
          <label>Valor:</label>
          <input type="text" name="price" class="form-control">
        </div>
        </div>
  			 <div class="col-sm-12">
  			<div class="form-group">
  				<label>Observação:</label>
  				<textarea class="form-control" name="obs"></textarea>
  		
  			</div>
  			</div>

  		</div>
  		<input type="submit" value="Adicionar" class="btn btn-success"/>
  		<a href="<?php echo BASE_URL;?>pay" class="btn btn-danger">Cancelar</a>




	</div>
</form>
</div>