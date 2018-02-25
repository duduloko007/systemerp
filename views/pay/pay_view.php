
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Conta a Pagar</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <form method="POST">
  	<div class="box-body">

  		<div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label><strong>Código: </strong><?php echo utf8_decode($pay_info['cod_pay']); ?></label>
          </div>

        </div>
        <div class="col-sm-12">
          <div class="form-group">
            <label>Status:</label>
            <select name="status" class="form-control" disabled>
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
          <input type="text" name="description" class="form-control" value="<?php echo utf8_decode($pay_info['description']); ?>" disabled/>
        </div>
      </div>
      <div class="col-sm-6">
       <div class="form-group">
        <label>Documento:</label>
        <input type="text" name="document" class="form-control" value="<?php echo $pay_info['document']; ?>" disabled/>
      </div>
    </div>
    <div class="col-sm-4">
     <div class="form-group">
      <label>Data do Documento:</label>
      <input type="text" name="date_document" class="form-control" value="<?php echo date('d/m/Y', strtotime($pay_info['date_document'])); ?>" disabled/>
    </div>
  </div>
  <div class="col-sm-4">
   <div class="form-group">
    <label>Data do Vencimento:</label>
    <input type="text" name="date_maturity" class="form-control" value="<?php echo date('d/m/Y', strtotime($pay_info['date_maturity'])); ?>" disabled/>
  </div>
</div>
<div class="col-sm-4">
  <div class="form-group">
    <label>Valor:</label>
    <input type="text" name="price" class="form-control" id="price_pay" value="<?php echo number_format( $pay_info['price'], 2, ',','.'); ?>" disabled/>
  </div>
</div>
<div class="col-sm-12">
 <div class="form-group">
  <label>Observação:</label>
  <textarea class="form-control" name="obs" disabled><?php echo utf8_decode($pay_info['obs']);?></textarea>
  
</div>
</div>


</div>

<a href="<?php echo BASE_URL;?>pay" class="btn btn-danger btn-sm">Voltar</a>




</div>
</form>
</div>