<?php

class inventoryController extends controller {

  private $user;
  public function __construct() {

    parent::__construct();
    $this->user = new Users();

    if($this->user->isLogged() == false){

      header("Location: ".BASE_URL."login");
      exit;
    }

  }

        // Listar clientes

  public function index() {
    $data = array('cadastro_produto' => '');
    $u = new Users();
    $this->user->setLoggedUser();
    $company = new companies($this->user->getCompany());
    $data['company_name'] = $company->getName();
    $data['user_email'] = $this->user->getEmail();
    $data['user_name'] = $this->user->getNameUser();
    $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
    if ($this->user->hasPermission('inventory_view')) {

      $i = new inventory();

      $data['inventory_list'] = $i->getList($this->user->getCompany());
      $data['add_permission'] = $this->user->hasPermission('inventory_add');
      $data['edit_permission'] = $this->user->hasPermission('inventory_edit');
      $this->loadTemplate('inventory/inventory', $data);
    } else {
      header("Location: ".BASE_URL);
    }
  }

  public function add(){
   $data = array('cadastro_produto' => '');
   $this->user->setLoggedUser();
   $company = new companies($this->user->getCompany());
   $data['company_name'] = $company->getName();
   $data['user_email'] = $this->user->getEmail();
   $data['user_name'] = $this->user->getNameUser();
   $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
   if ($this->user->hasPermission('inventory_add')){

    if (isset($_POST['name']) && !empty($_POST['name'])) {

      $i = new inventory();
      $name = addslashes(utf8_encode($_POST['name']));
      $price = addslashes($_POST['price']);
      $price_cust = addslashes($_POST['price_cust']);
      $price_percentage = addslashes($_POST['price_percentage']);
      $quant = addslashes($_POST['quant']);
      $min_quant = addslashes($_POST['min_quant']);
      $cod_bars = addslashes($_POST['cod_bars']);

      //$price = str_replace('.','', $price);
      //$price = str_replace(',','.', $price);

      //$price_cust = str_replace('.','', $price_cust);
      //$price_cust = str_replace(',','.', $price_cust);

      //$price_percentage = str_replace('.','', $price_percentage);
      //$price_percentage = str_replace(',','.', $price_percentage);


      $a = $i->add($name, $price, $price_cust, $price_percentage, $quant, $min_quant, $cod_bars, $this->user->getCompany(), $this->user->getId());

      if($a == '1'){


      //$action = 'add';
      //$i->setLog($id_product, $this->user->getCompany(), $this->user->getId(), $action);
        header("Location:".BASE_URL."inventory/inventory_add");
        $data['cadastro_produto'] = "Produto cadastrado com sucesso!";
      }else {
         $data['cadastro_produto'] = "Ocorreu um erro no cadastro!";
      }
    }
    $this->loadTemplate('inventory/inventory_add', $data);
  } else{
    header("Location:".BASE_URL."inventory");
  }
}

public function edit($id){
  $data = array();
  $this->user->setLoggedUser();
  $company = new companies($this->user->getCompany());
  $data['company_name'] = $company->getName();
  $data['user_email'] = $this->user->getEmail();
  $data['user_name'] = $this->user->getNameUser();
  $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
  if ($this->user->hasPermission('inventory_edit')){

    $i = new inventory();
    if (isset($_POST['name']) && !empty($_POST['name'])) {
      $name = addslashes(utf8_encode($_POST['name']));
      $price = addslashes($_POST['price']);
      $price_cust = addslashes($_POST['price_cust']);
      $price_percentage = addslashes($_POST['price_percentage']);
      $quant = addslashes($_POST['quant']);
      $min_quant = addslashes($_POST['min_quant']);
      $cod_bars = addslashes($_POST['cod_bars']);
      //$price = str_replace('.','', $price);
      //$price = str_replace(',','.', $price);
      
      //$price_cust = str_replace('.','', $price_cust);
      //$price_cust = str_replace(',','.', $price_cust);


      //$price_percentage = str_replace('.','', $price_percentage);
     // $price_percentage = str_replace(',','.', $price_percentage);

      $i->edit($id, $name, $price, $price_cust, $price_percentage, $quant, $min_quant,$cod_bars, $this->user->getCompany(), $this->user->getId());
      //$action = 'edit';
      //$i->setLog($id_product, $this->user->getCompany(), $this->user->getId(), $action);
      header("Location:".BASE_URL."inventory");

    }
    $data['inventory_info'] = $i->getInfo($id, $this->user->getCompany());
    $this->loadTemplate('inventory/inventory_edit', $data);
  }else {
    header("Location:".BASE_URL."inventory");
  }

}

public function view($id){
  $data = array();
  $this->user->setLoggedUser();
  $company = new companies($this->user->getCompany());
  $data['company_name'] = $company->getName();
  $data['user_email'] = $this->user->getEmail();
  $data['user_name'] = $this->user->getNameUser();
  $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
  if ($this->user->hasPermission('inventory_view')){

    $i = new inventory();

    $data['inventory_info'] = $i->getInfo($id, $this->user->getCompany());
    $this->loadTemplate('inventory/inventory_view', $data);
  }else {
    header("Location:".BASE_URL."inventory");
  }

}

public function delete($id){
  $this->user->setLoggedUser();
  if ($this->user->hasPermission('inventory_edit')){
   $i = new inventory();
   $i->delete($id, $this->user->getCompany(), $this->user->getId());
   header("Location:".BASE_URL."inventory/inventory");
 }
}
}