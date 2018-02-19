
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Contas a Pagar</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">
		<div class="row" style="margin-bottom: 20px;">
			<div class="col-sm-12">
				<a class="btn btn-primary"  href="<?php echo BASE_URL;?>pay/add">Adicionar Conta</a>
			</div>

		</div>
		<div class="text-right">
			<div class="row">

				<div class="col-sm-4">
					<strong>Total Vencidas: </strong><span class="btn btn-danger" title="Total de Contas Vencidas!">R$ <?php echo number_format( $total_pay_maturity, 2, ',','.'); ?></span>
				</div>
				<div class="col-sm-4">
					<strong>Total à Vencer: </strong><span class="btn btn-info " title="Total de Contas à Vencer!">R$ <?php echo number_format( $total_pay_open, 2, ',','.'); ?></span>
				</div>
				<div class="col-sm-4">
					<strong>Total Pago: </strong><span class="btn btn-success " title="Total de Contas Pagas!">R$ <?php echo number_format( $total_pay_check, 2, ',','.'); ?></span>
				</div>
			</div><br/>
		</div>
		<hr/>	
		<div class="row">

			<form method="GET">
				
				<div class="col-sm-6">
					<div class="form-group">
						<label>Status</label>
						<div class="input-group">
							
							<select name="status" class="form-control" style="border-radius:5px;">
								<option value="">Status</option>
								<option value="0" <?php echo ($statuspay ==  '0')?'selected="selected"':''; ?>>Em aberto</option>
								<option value="1" <?php echo ($statuspay == '1')?'selected="selected"':''; ?>>Vencido</option>
								<option value="2" <?php echo ($statuspay == '2')?'selected="selected"':''; ?>>Pago</option>
							</select><span class="input-group-addon" style="padding: 0px; border:0px;"><input type="submit" value="Filtrar" class="btn btn-success btn-sm"/></span>
						</div>
					</div>
				</div>


			</form>
			<div class="col-sm-6">

				<div class="form-group">
					<label>Buscar</label>
					<input class="form-control" id="myInput" type="text" placeholder="Buscar.."/>
				</div>
			</div>
		</div>


		

		<table class="table  table-responsive table-bordered table-striped">
			<thead>
				<tr>
					<th>Data</th>
					<th>Descrição</th>
					<th>Documento</th>
					<th>Vencimento</th>
					<th>Status</th>
					<th>Valor</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody id="myTable">
				<?php foreach($pay_list as $pay_item): ?>

					<tr class="<?php echo ($statuspay[$pay_item['status']] == $statuspay[$pay_item['0']] )?'danger text-red':'';?>">
						
						<td><?php echo date('d/m/Y', strtotime($pay_item['date_document'])) ?></td>
						<td><?php echo $pay_item['description']; ?></td>
						<td><?php echo $pay_item['document']; ?></td>
						<td><?php echo date('d/m/Y', strtotime($pay_item['date_maturity'])) ?></td>


						<td>
							<?php if($statuspay[$pay_item['status']] == $statuspay[$pay_item['0']] ){
								echo '<div class="btn btn-danger" title="Conta Vencida!">'.$statuspay[$pay_item['status']].'</div>';
								
							} else{
								echo $statuspay[$pay_item['status']];
							}
							?>					

						</td>

						<td>R$ <?php echo number_format( $pay_item['price'], 2, ',','.'); ?></td>
						<td>
							<?php if($edit_permission): ?>
								<a  class="btn btn-info" href="<?php echo BASE_URL; ?>pay/edit/<?php echo $pay_item['id'];?>">Editar</a>
								
								<a  class="btn btn-danger" href="<?php echo BASE_URL; ?>pay/delete/<?php echo $pay_item['id'];?>" onclick="return confirm('Cofirmar a Exclusão')">Excluir</a>
								
							<?php else: ?>
								<a  class="btn btn-info" href="<?php echo BASE_URL; ?>pay/edit/<?php echo $pay_item['id'];?>">Editar</a>
							<?php endif; ?>
						</td>
					</tr>
				<?php  endforeach; ?>

			</tbody>
		</table>
		<div class="text-right">
			<strong>Total: </strong><span class="btn btn-warning " title="Total de Contas!">R$ <?php echo number_format( $total_pay, 2, ',','.'); ?></span>
		</div>
		<nav aria-label="Page navigation">
			<ul class="pagination">

				<?php for($q=1;$q<=$p_count;$q++):?>
					
					<li class=" <?php echo ($q==$p)?'active':''?>"><a href="<?php echo BASE_URL;?>pay?p=<?php echo $q;?>"><?php echo $q;?></a></li>
				<?php endfor;?>
			</ul>
		</nav>

	</div>
</div>
<script>
	$(document).ready(function(){
		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myTable tr").filter(function() {
				$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			});
		});
	});
</script>