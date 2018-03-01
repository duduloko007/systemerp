
<div class="box box-default">
  <div class="box-header with-border">
    <h3 class="box-title">Adicionar Cliente</h3>
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
    <ul class="nav nav-tabs">
      <li class="active">
        <a href="#physical_person" class="" data-toggle="tab">Pessoa física</a>
      </li>
      <li>
        <a href="#legal_person" class="" data-toggle="tab">Pessoa jurídica</a>
      </li>

    </ul>

    <div class="tab-content">
      <div id="physical_person" class="tab-pane active in fade  w3-animate-left">
        <form method="POST">

          <input type="hidden" name="person_type" value="1">
          <input type="hidden" name="name_fantasy" value="">
          <input type="hidden" name="state_registration" value="">
          <input type="hidden" name="municipal_registration" value="">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Nome:<strong class="text-red">*</strong></label>
                <input type="text" name="name" class="form-control " required>
              </div>
            </div>

            <div class="col-md-4" >
              <div class="form-group">
                <label>Data Nascimento:<strong class="text-red">*</strong></label>
                <input type="text" name="date_birth_fund" id="date_birth" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>RG:</label>
                <input type="text" name="identidade" id="identidade" class="form-control ">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>CPF:<strong class="text-red">*</strong></label>
                <input type="text" name="cpf_cnpj" id="cpf" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>E-mail:</label>
                <input type="email" name="email" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Telefone:</label>
                <input type="text" name="phone_fix" class="form-control">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Celular:<strong class="text-red">*</strong></label>
                <input type="text" name="phone" class="form-control" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Estrelas:</label>
                <select name="stars" class="form-control">
                 <option value="1">1 Estrela</option>
                 <option value="2">2 Estrelas</option>
                 <option value="3" selected="selected">3 Estrelas</option>
                 <option value="4">4 Estrelas</option>
                 <option value="5">5 Estrelas</option>
               </select>
             </div>
           </div>
           <div class="col-md-12">
            <hr>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Cep:<strong class="text-red">*</strong></label>
              <input type="text" name="address_zipcode" id="address_zipcode" class="form-control ">
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group">
              <label>Logradouro:<strong class="text-red">*</strong></label>
              <input type="text" name="address" class="form-control " required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Número:<strong class="text-red">*</strong></label>
              <input type="text" name="address_number" class="form-control " required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Complemento:</label>
              <input type="text" name="address2" class="form-control ">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Bairro:<strong class="text-red">*</strong></label>
              <input type="text" name="address_neighb" class="form-control " required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Cidade:<strong class="text-red">*</strong></label>
              <input type="text" name="address_city" class="form-control " required> 
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Estado:<strong class="text-red">*</strong></label>
              <input type="text" name="address_state" class="form-control " required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>País:</label>
              <input type="text" name="address_country" class="form-control ">
            </div>
          </div>
          <div class="col-md-12">
            <hr>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label>Observações Internas:</label>
              <textarea name="internal_obs" class="form-control"></textarea>
            </div>
          </div>
        </div>
        <input type="submit" value="Adicionar" class="btn btn-success btn-sm"/>
        <a href="<?php echo BASE_URL;?>clients" class="btn btn-danger btn-sm">Cancelar</a>
      </form>
    </div>


    <div id="legal_person" class="tab-pane fade w3-animate-right">
     <form method="POST">
       <input type="hidden" name="person_type" value="2">
       <input type="hidden" name="identidade" value="">
       <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Nome/Razão social:<strong class="text-red">*</strong></label>
            <input type="text" name="name" class="form-control " required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Nome/Fantasia:</label>
            <input type="text" name="name_fantasy" class="form-control ">
          </div>
        </div>
        <div class="col-md-4" >
          <div class="form-group">
            <label>Data Fundação:<strong class="text-red">*</strong></label>
            <input type="text" name="date_birth_fund" id="date_fund" class="form-control" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>CNPJ:<strong class="text-red">*</strong></label>
            <input type="text" name="cpf_cnpj" id="cnpj" class="form-control" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Inscrição estadual:<strong class="text-red">*</strong></label>
            <input type="text" name="state_registration" id="state_registration " class="form-control" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Inscrição municipal:</label>
            <input type="text" name="municipal_registration" id="municipal_registration" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>E-mail:</label>
            <input type="email" name="email" class="form-control ">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Telefone:<strong class="text-red">*</strong></label>
            <input type="text" name="phone_fix" class="form-control" required>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Celular:</label>
            <input type="text" name="phone" class="form-control ">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label>Estrelas:</label>
            <select name="stars" class="form-control">
             <option value="1">1 Estrela</option>
             <option value="2">2 Estrelas</option>
             <option value="3" selected="selected">3 Estrelas</option>
             <option value="4">4 Estrelas</option>
             <option value="5">5 Estrelas</option>
           </select>
         </div>
       </div>
       <div class="col-md-12">
        <hr>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Cep:<strong class="text-red">*</strong></label>
          <input type="text" name="address_zipcode" id="address_zipcode2" class="form-control">
        </div>
      </div>

      <div class="col-md-6">
        <div class="form-group">
          <label>Logradouro:<strong class="text-red">*</strong></label>
          <input type="text" name="address" class="form-control" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Número:<strong class="text-red">*</strong></label>
          <input type="text" name="address_number" class="form-control" required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Complemento:</label>
          <input type="text" name="address2" class="form-control " >
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Bairro:<strong class="text-red">*</strong></label>
          <input type="text" name="address_neighb" class="form-control " required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Cidade:<strong class="text-red">*</strong></label>
          <input type="text" name="address_city" class="form-control " required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>Estado:<strong class="text-red">*</strong></label>
          <input type="text" name="address_state" class="form-control " required>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label>País:</label>
          <input type="text" name="address_country" class="form-control ">
        </div>
      </div>
      <div class="col-md-12">
        <hr>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label>Observações Internas:</label>
          <textarea name="internal_obs" class="form-control"></textarea>
        </div>
      </div>
    </div>
    <input type="submit" value="Adicionar" class="btn btn-success btn-sm"/>
    <a href="<?php echo BASE_URL;?>clients" class="btn btn-danger btn-sm">Cancelar</a>
  </form>


</div>  

</div>
</div>
</div>



<script type="text/javascript" src=" <?php echo BASE_URL;?>assets/js/script_clients_add.js"></script>
