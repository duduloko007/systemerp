<!-- 
############################################
# Programador: Eduardo Gonçalves Filho.    # 
# E-mail: Eduardo_2012_@hotmail.com.       #
# Data: 15/01/2018.                        #
############################################ 
-->

<div class="box box-default">
  <div class="box-header with-border">

    <h3 class="box-title">Editar Forma de Pagamento</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="alert alert-warning alert-dismissible fade in text-center w3-animate-top" role="alert">
      <strong>Atenção!</strong> todos os campos com  <strong class="text-red">*</strong>  são obrigatórios.
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form method="POST">

      <div class="row">

        <div class="col-md-6">
          <div class="form-group">
            <label>Nome:<strong class="text-red">*</strong> <a tabindex="0"  role="button" data-toggle="popover" data-trigger="focus" title="Nome da forma de pagamento" data-content="Informe um nome como, Dinheiro, Cartão de Débito ou Cartão de Crédito e etc..."> <span class="fa fa-question-circle"></span></a></label>
            <input type="text" name="name_pay" class="form-control" required value="<?php echo utf8_decode($form_pay_info['name_pay']);?>">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="text-justify">Nº máx. de Parcelas:<strong class="text-red">*</strong> <a tabindex="0"   role="button" data-toggle="popover" data-trigger="focus" title="Número máximo de parcelas" data-content="Número de parcelas que deve conter na forma de pagamento exemplo: 6 é igual a 6 parcelas, 12 é igual a 12 parcelas... Lembre-se o número informado vai ser a quantidade de parcelas permitidas na forma de pagamento."> <span class="fa fa-question-circle"></span></a></label>
            <input type="text" name="number_of_installments" class="form-control"  value="<?php echo utf8_decode($form_pay_info['number_of_installments']);?>" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Intervalo das Parcelas<small class="text">(dias)</small>:<strong class="text-red">*</strong> <a tabindex="0"  role="button" data-toggle="popover" data-trigger="focus"  title="Intervalo das parcelas" data-content="30 igual a um intervalo de 30 dias, exemplo: 1º parcela é no dia 01/04/2018 a 2º parcela vai ser no dia 01/05/2018."> <span class="fa fa-question-circle"></span></a></label>
            <input type="text" name="range_of_plots" class="form-control" value="<?php echo utf8_decode($form_pay_info['range_of_plots']);?>" required>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Contas a Receber:<strong class="text-red">*</strong> <a tabindex="0"  role="button" data-toggle="popover" data-trigger="focus"  title="Contas a Receber" data-content="Adicionar a forma de pagamento no opção de contas a receber."> <span class="fa fa-question-circle"></span></a></label>
            <select name="pay_receive" class="form-control">
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
          <label>Permitir nº Documento:<strong class="text-red">*</strong> <a tabindex="0"  role="button" data-toggle="popover" data-trigger="focus"  title="Permitir número do Documento" data-content="Adicionar opção para informa número do documento no ato do pagamento. Ideal para formas de pagamento como Dépositos, Cheques, Cartões."> <span class="fa fa-question-circle"></span></a></label>
          <select name="pay_document" class="form-control">
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
        <label>Permitir Observação:<strong class="text-red">*</strong> <a tabindex="0"  role="button" data-toggle="popover" data-trigger="focus"  title="Permitir Observação" data-content="Adicionar opção para informa uma observação no ato do pagamento. Ideal para formas de pagamento como Dépositos, Cheques, Cartões."> <span class="fa fa-question-circle"></span></a></label>
        <select name="pay_obs" class="form-control">
         <?php foreach($pay_option as $statusKey =>$statusValue): ?>

           <option value="<?php echo $statusKey ;?>" <?php echo($statusKey == $form_pay_info['pay_obs'])?'selected="selected"':'' ;?>>

             <?php echo $statusValue; ?>
           </option>
         <?php endforeach ; ?>
       </select>
     </div>
   </div>
   <div class="col-md-12">

    <input type="submit" value="Salvar" class="btn btn-success btn-sm"/>
    <a href="<?php echo BASE_URL;?>form_of_pay" class="btn btn-danger btn-sm">Cancelar</a>
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
