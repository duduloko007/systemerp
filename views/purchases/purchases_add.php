<form method="POST">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Venda</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>

    <div class="box-body">
      <div class="col-md-12">

        <?php if(!isset($erro_na_venda) && !empty($erro_na_venda)):?>
          <div class="alert alert-danger"><?php echo $erro_na_venda;?></div>
        <?php else:?>
          <div></div>
        <?php endif;?>
      </div>

      <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#listProduct" role="tab">Produtos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link productSelect" data-toggle="tab" href="#productSelect" role="tab">Produtos adicionados</a>
        </li>
        <li class="nav-item">
          <a class="nav-link finalPay" data-toggle="tab" href="#finalPay" role="tab">Pagamento</a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content">

        <div class="tab-pane active" id="listProduct" role="tabpanel">
          <div class="row">
            <div class="col-md-12">
              <h3>Adicionar produtos à venda</h3>
              <hr/>
            </div>

            <div class="col-sm-6">

              <div class="form-group">
                <label>Buscar</label>
                <input class="form-control" id="myInput" type="text" placeholder="Buscar.."/>
              </div>
            </div>
          </div>

          <div  style=" height: 300px; overflow: auto;">
            <table class="table  table-responsive table-bordered table-striped" >
              <thead>

                <tr>
                  <th>Cod. Produto</th>
                  <th>Cod. Barras</th>
                  <th>Descrição</th>
                  <th>Estoque</th>
                  <th>Preço</th>
                  <th>Adicionar</th>
                </tr>
              </thead>
              <tbody id="myTable">
               <?php foreach($inventory_list as $product):?>
                <tr>
                  <td><?php echo $product['id'];?></td>
                  <td><?php echo $product['cod_bars'];?></td>
                  <td><?php echo utf8_encode($product['name']);?></td>
                  <td><?php echo $product['quant'];?></td>
                  <td>R$ <?php echo number_format($product['price'],2,',','.');?></td>
                  <td>

                    <a href="<?php echo BASE_URL;?>sales/add_product/<?php echo $product['id'];?>" class="btn btn-success">Adicionar</a>
                  </td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
        <hr/>
      </div>
      <div class="tab-pane" id="productSelect" role="tabpanel">
        <div style="float: right;">
          <strong style="font-size: 23px;">Sub-total Venda</strong><input type="text" class="form-control" id="sub_total"  disabled name="sub_total" style="font-size: 20px;" />      
        </div>
        <div class="row">
          <div class="col-md-12">
            <h3>Produtos para à venda</h3>
            <hr/>
          </div>
        </div>

        <div  style=" height: 400px; overflow: auto;">
          <table class="table  table-responsive table-bordered table-striped" >
            <thead>
              <tr>
                <th>Cod. Produto</th>
                <th>Cod. Barras</th>
                <th>Descrição</th>
                <th>Quant.</th>
                <th>Preço</th>
                <th>Preço total</th>
                <th>Adicionar</th>
              </tr>
            </thead>
            <tbody id="myTable">
             <?php foreach($listSalesVenda as $product):?>
              <tr>
                <td id="id"><?php echo $product['id'];?></td>
                <td><?php echo $product['cod_bars'];?></td>
                <td><?php echo utf8_encode($product['name']);?></td>
                <td><input type="number" required class="quant" id="quant" value="" onchange="updateSubTotalProduct(this)" name="quant[<?php echo $product['id'];?>]" style="width: 60px;" data-price="<?php echo $product['price'];?>"></td>
                <td>R$ <?php echo $product['price'];?></td>
                <td class="subtotal"> </td>
                <td>

                  <a href="<?php echo BASE_URL;?>sales/remove_product/<?php echo $product['id'];?>" class="btn btn-danger">Remover</a>

                </td>
              </tr>
            <?php endforeach;?>

          </tbody>

        </table>

      </div>

    </div>
    <div class="tab-pane" id="finalPay" role="tabpanel">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">

            <label>Cliente</label>
            <input list="cliente" class="form-control" id="nome_client" name="client_id" onkeydown="teclando(event)"/>
            <datalist id="cliente">
              <?php foreach($client_list as $client):?>
                <option class="nome"  value="<?php echo $client['id'];?>">
                  <?php echo $client['name'];?>
                </option>
              <?php endforeach;?>
            </datalist>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">

            <label>Cliente selecionado</label>
            <input type="text" id="client_selecionado" name="client_selecionado" class="form-control" disabled />

          </div>
        </div>
        <div class="col-md-12">
         <hr/>
       </div>
       <div class="col-md-3">
        <div class="form-group">

          <label>Sub-total Venda</label>
          <input type="text" class="form-control" id="sub_total"  disabled name="sub_total" />

        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">

          <label>Desconto</label>
          <input type="text" class="form-control" id="desconto" onkeyup="digitouValor(event)" name="desconto" required/>


        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">

          <label>Valor da venda</label>
          <input type="text" class="form-control" disabled id="preco_venda"  name="total_price" />


        </div>
      </div>
      <div class="col-md-3">
        <div class="form-group">

          <label>Restante</label>
          <input type="text" class="form-control"  disabled id="pgto_restante" name="pgto_restante" />


        </div>
      </div>

      <div class="col-md-12">
       <hr/>
     </div>


     <div class="col-md-3">
      <div class="form-group">

        <label>Forma de pgto.</label>
        <input list="pgto" class="form-control" name="form_pay_view" id="form_pay_view" onkeyup="paySelecionado(event)" size="1" maxlength="1" required/>

        <datalist id="pgto">
          <?php foreach($form_pay as $pay_form => $payValue):?>
            <option   value="<?php echo $pay_form;?>"><?php echo $payValue;?></option>

          <?php endforeach;?>

        </datalist>

      </div>
    </div>


    <div class="col-md-3">
      <div class="form-group">

        <label>Forma de pgto. escolhida</label>
        <input type="text" class="form-control" name="paySelect" id="paySelect" disabled />

      </div>

    </div>
    <div class="col-md-3">
      <div class="form-group">

        <label>Valor Pago</label>
        <input type="text" class="form-control"  onkeyup="digitouValorPago(event)"  id="valor_pago" name="valor_pago" required/>

      </div>
    </div>

    <div class="col-md-3">
      <div class="form-group">

        <label>Troco</label>
        <input type="text" class="form-control" name="troco" disabled id="troco" />


      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group">

        <label>Observação</label>
        <textarea name="obs" class="form-control"></textarea>

      </div>
    </div>

    <div class="col-md-12">
      <input type="submit" value="Finalizar" id="finalizar" class="btn btn-success">
    </div>


  </div>
</div>

</div>
</div>
</div>
</form>
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

<script type="text/javascript" src="<?php echo BASE_URL;?>assets/js/script.js"></script>