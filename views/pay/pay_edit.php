
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Editar Conta a Pagar</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
<form method="POST">
  	<div class="box-body">

  		<div class="row">
               <div class="col-sm-12">
        <div class="form-group">
          <label>Status:</label>
      <select name="status" class="form-control">
          <?php foreach($statuspay as $statusKey =>$statusValue): ?>

             <option value="<?php echo $statusKey ;?>" <?php echo($statusKey == $pay_info['status'])?'selected="selected"':'' ;?>>

             <?php echo $statusValue; ?>
         </option>
      <?php endforeach ; ?>
</select>
        </div>
        </div>
  			 <div class="col-sm-6">
  			<div class="form-group">
  				<label>Descrição:</label>
  				<input type="text" name="description" class="form-control" value="<?php echo $pay_info['description']; ?>">
  			</div>
  			</div>
  			 <div class="col-sm-6">
  			<div class="form-group">
  				<label>Documento:</label>
  				<input type="text" name="document" class="form-control" value="<?php echo $pay_info['document']; ?>"/>
  			</div>
  			</div>
  			<div class="col-sm-4">
  			<div class="form-group">
  				<label>Data do Documento:</label>
  				<input type="text" name="date_document" class="form-control" value="<?php echo date('d/m/Y', strtotime($pay_info['date_document'])); ?>"/>
  			</div>
  			</div>
  			 <div class="col-sm-4">
  			<div class="form-group">
  				<label>Data do Vencimento:</label>
  				<input type="text" name="date_maturity" class="form-control" value="<?php echo date('d/m/Y', strtotime($pay_info['date_maturity'])); ?>"/>
  			</div>
  			</div>
         <div class="col-sm-4">
        <div class="form-group">
          <label>Valor:</label>
          <input type="text" name="price" class="form-control" value="<?php echo number_format( $pay_info['price'], 2, ',','.'); ?>" />
        </div>
        </div>
  			 <div class="col-sm-12">
  			<div class="form-group">
  				<label>Observação:</label>
  				<textarea class="form-control" name="obs"><?php echo $pay_info['obs'];?></textarea>
  		
  			</div>
  			</div>


  		</div>
  		<input type="submit" value="Salvar" class="btn btn-success btn-sm"/>
  		<a href="<?php echo BASE_URL;?>pay" class="btn btn-danger btn-sm">Cancelar</a>


      

	</div>
</form>
</div>