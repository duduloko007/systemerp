
<div class="box box-default">
	<div class="box-header with-border">
		<h3 class="box-title">Contas a Receber</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
		</div>
	</div>

	<div class="box-body">

		<!--<a class="btn btn-primary"  href="<?php echo BASE_URL;?>sales/add">Adicionar Venda</a>-->

		<strong>Total a Receber: </strong><span class="btn btn-danger btn-sm" title="Total de Contas!">R$ <?php echo number_format( $total_receive, 2, ',','.'); ?></span>
		<br/><br/>
		<hr/>	
		<div class="row">

			<form method="GET">

				<div class="col-sm-6">
					<div class="form-group">
						<label>Código da Venda</label>
						<div class="input-group">

							<input type="text" name="cod_venda" class="form-control" placeholder="Pesquisa venda pelo código.." /><span class="input-group-addon" style="padding: 0px; border:0px;"><input type="submit" value="Pesquisar" class="btn btn-success btn-sm"/></span>
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
					<th>Cod. Venda</th>
					<th>Data</th>
					<th>Nome do Cliente</th>
					<th>Valor</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody id="myTable">

				<?php foreach($sales_list as $sale_item): ?>

					<tr>
						<td><?php echo $sale_item['cod_sales']; ?></td>
						<td><?php echo date('d/m/Y', strtotime($sale_item['date_sale'])) ?></td>
						<td><?php echo $sale_item['name']; ?></td>
						<td>R$ <?php echo number_format( $sale_item['total_price'], 2, ',','.'); ?>
							
						</td>
						<td>
							<a class="btn btn-info btn-sm" href="<?php echo BASE_URL; ?>receive/edit/<?php echo $sale_item['id']; ?>">Visualizar</a>
						</td>
					</tr>
				<?php  endforeach; ?>
			</tbody>
		</table>
		<div class="text-right">
			<strong>Total: </strong><span class="btn btn-warning btn-sm" title="Total de Contas!">R$ <?php echo number_format( $total_receive, 2, ',','.'); ?></span>
		</div>
		<nav aria-label="Page navigation">
			<ul class="pagination">

				<?php for($q=1;$q<=$p_count;$q++):?>

					<li class=" <?php echo ($q==$p)?'active':''?>"><a href="<?php echo BASE_URL;?>receive?p=<?php echo $q;?>"><?php echo $q;?></a></li>
				<?php endfor;?>
			</ul>
		</nav>

	</div>

</div>
