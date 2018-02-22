<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Relatório de Estoque</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>

  <div class="box-body">
<form method="GET" onsubmit="return openPopup(this)">
	
	
	<div class="text-center">
		<input type="submit" value="Gerar Relatório" class="btn btn-default btn-sm" />
		<a href="<?php echo BASE_URL;?>report" class="btn btn-danger btn-sm">Cancelar</a>
	</div>
</form>
</div>




</div>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/report_inventory.js"></script>
