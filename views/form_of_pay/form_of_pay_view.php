

<div class="box box-default">
  <div class="box-header with-border">

    <h3 class="box-title">Forma de Pagamento</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <form method="POST">

      <div class="row">
        <div class="col-md-12">
         <div class="form-group">
          <label><strong>Código: </strong><?php   echo $form_pay_info['cod_pay'] ;?></label>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Nome:</label>
          <input type="text" name="name_pay" class="form-control" disabled value="<?php echo utf8_decode($form_pay_info['name_pay']);?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label class="text-justify">Nº máx. de Parcelas:</label>
          <input type="text" disabled name="number_of_installments" class="form-control"  value="<?php echo utf8_decode($form_pay_info['number_of_installments']);?>">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Intervalo das Parcelas<small class="text">(dias)</small>:</label>
          <input type="text" name="range_of_plots" class="form-control" value="<?php echo utf8_decode($form_pay_info['range_of_plots']);?>" disabled>
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Contas a Receber:</label>
          <select name="pay_receive" class="form-control" disabled>
            <?php foreach($pay_option as $statusKey =>$statusValue): ?>

             <option value="<?php echo $statusKey ;?>" <?php echo($statusKey == $form_pay_info['pay_receive'])?'selected="selected"':'' ;?>>

               <?php echo $statusValue; ?>
             </option>
           <?php endforeach ; ?>
         </select>
       </div>
     </div>
     <div class="col-md-6">
      <div class="form-group">
        <label>Permitir nº Documento:</label>
        <select name="pay_document" class="form-control" disabled>
          <?php foreach($pay_option as $statusKey =>$statusValue): ?>

           <option value="<?php echo $statusKey ;?>" <?php echo($statusKey == $form_pay_info['pay_document'])?'selected="selected"':'' ;?>>

             <?php echo $statusValue; ?>
           </option>
         <?php endforeach ; ?>
       </select>
     </div>
   </div>
   <div class="col-md-6">
    <div class="form-group">
      <label>Permitir Observação:</label>
      <select name="pay_obs" class="form-control" disabled>
       <?php foreach($pay_option as $statusKey =>$statusValue): ?>

         <option value="<?php echo $statusKey ;?>" <?php echo($statusKey == $form_pay_info['pay_obs'])?'selected="selected"':'' ;?>>

           <?php echo $statusValue; ?>
         </option>
       <?php endforeach ; ?>
     </select>
   </div>
 </div>
 <div class="col-md-12">

  <a href="<?php echo BASE_URL;?>form_of_pay" class="btn btn-danger btn-sm">Voltar</a>
</div>
</div>
</form>
</div>
</div>
</div>
<script type="text/javascript">
  $(function () {
    $('[data-toggle="popover"]').popover()
  });
  $('.popover-dismiss').popover({
    trigger: 'focus'
  });
</script>
<!--<script type="text/javascript" src=" <?php echo BASE_URL;?>assets/js/script_add_form_of_pay.js"></script>-->
