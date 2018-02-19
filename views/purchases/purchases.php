<meta charset="utf-8">
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Compras</h3>

    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
  </div>

  <div class="box-body">


	<a class="btn btn-primary"  href="<?php echo BASE_URL;?>purchases/add">Adicionar Compra</a>

<table class="table  table-responsive table-bordered table-striped">
	<thead>
	<tr>
		<th>Data</th>
		<th>Nome do Fornecedor</th>
		<th>Produto</th>
		<th>Quantidade</th>
		<th>Valor</th>
		<th>Ações</th>
	</tr>
</thead>
<tbody>
	<?php foreach($purchases as $compra):?>
	<tr>
		<td><?php echo date('d/m/Y', strtotime($compra['date_pucharses']));?></td>
		<td><?php echo $compra['fornecedor'];?></td>
		<td><?php echo $compra['name'];?></td>
		<td><?php echo $compra['quant'];?></td>
		<td>R$ <?php echo $compra['purchasses_price'];?></td>
	
			
			<td>
			
				<a  class="btn btn-info btn-sm" href="<?php echo BASE_URL; ?>purchases">Editar</a>
			
			<a  class="btn btn-danger btn-sm" href="<?php echo BASE_URL; ?>purchases" onclick="return confirm('Cofirmar a Exclusão')">Excluir</a>
			
					<a  class="btn btn-default btn-sm" href="<?php echo BASE_URL; ?>purchases">Visualizar</a>
		
			</td>
	
	</tr>
<?php endforeach;?>

</tbody>
</table>
</div>
</div>