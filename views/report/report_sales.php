
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Relatório de Vendas</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>

 
  	<form method="GET" onsubmit="return openPopup(this)">
  		 <div class="box-body">
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">

			<label>Nome do Cliente:</label>
			<input type="text" name="client_name" class="form-control" />
		</div>
		</div>

			<div class="col-sm-2">
				<div class="form-group">
			<label>Período:</label>

				<input type="date" name="period1" class="form-control" />
			</div>
		</div>
		<div class="col-sm-2">
			<div class="form-group">
					<label>até:</label>
			<input type="date" name="period2" class="form-control" />
			</div>
				</div>

	<div class="col-sm-3">
			<div class="form-group">
				<label>Status da Venda:</label>
		<select name="status" class="form-control">

			<option value="">Todos os status</option>
			<?php foreach($statuses as $statusKey => $statusValue): ?>
				<option value="<?php echo $statusKey; ?>"><?php echo $statusValue;?></option>
			<?php endforeach; ?>
		</select>
	</div>
	</div>

		<div class="col-sm-2">
			<div class="form-group">
				<label>Ordenação:</label>
		<select name="order" class="form-control">
		
			<option value="date_desc">Mais Recente</option>
			<option value="date_asc">Mais Antigo</option>
			<option value="status">Status da Venda</option>
		</select>
	</div>
</div>

	
	</div>
		<input type="submit" value="Gerar Relatório" class="btn btn-default" />
		<a href="<?php echo BASE_URL;?>report" class="btn btn-danger">Cancelar</a>
</div>

</form>


</div>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/report_sales.js"></script>

