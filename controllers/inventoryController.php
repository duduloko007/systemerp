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
    $data = array();
    $u = new Users();
    $this->user->setLoggedUser();
    $company = new companies($this->user->getCompany());
    $data['company_name'] = $company->getName();
    $data['user_email'] = $this->user->getEmail();
    if ($this->user->hasPermission('inventory_view')) {

      $i = new inventory();
      $offset = 0;
      $data['inventory_list'] = $i->getList($offset, $this->user->getCompany());
      $data['add_permission'] = $this->user->hasPermission('inventory_add');
      $data['edit_permission'] = $this->user->hasPermission('inventory_edit');
      $this->loadTemplate('inventory/inventory', $data);
    } else {
      header("Location: ".BASE_URL);
    }
  }

  public function add(){
   $data = array();
   $this->user->setLoggedUser();
   $company = new companies($this->user->getCompany());
   $data['company_name'] = $company->getName();
   $data['user_email'] = $this->user->getEmail();

   if ($this->user->hasPermission('inventory_add')){

    if (isset($_POST['name']) && !empty($_POST['name'])) {

      $i = new inventory();
      $name = addslashes($_POST['name']);
      $price = addslashes($_POST['price']);
      $quant = addslashes($_POST['quant']);
      $min_quant = addslashes($_POST['min_quant']);
      $cod_bars = addslashes($_POST['cod_bars']);
      $price = str_replace('.','', $price);
      $price = str_replace(',','.', $price);
      $i->add($name, $price, $quant, $min_quant, $cod_bars, $this->user->getCompany(), $this->user->getId());
      //$action = 'add';
      //$i->setLog($id_product, $this->user->getCompany(), $this->user->getId(), $action);
      header("Location:".BASE_URL."inventory");

    }
    $this->loadTemplate('inventory/inventory_add', $data);
  }
}

public function edit($id){
  $data = array();
  $this->user->setLoggedUser();
  $company = new companies($this->user->getCompany());
  $data['company_name'] = $company->getName();
  $data['user_email'] = $this->user->getEmail();
  if ($this->user->hasPermission('inventory_edit')){

    $i = new inventory();
    if (isset($_POST['name']) && !empty($_POST['name'])) {
      $name = addslashes($_POST['name']);
      $price = addslashes($_POST['price']);
      $quant = addslashes($_POST['quant']);
      $min_quant = addslashes($_POST['min_quant']);
       $cod_bars = addslashes($_POST['cod_bars']);
      $price = str_replace('.','', $price);
      $price = str_replace(',','.', $price);

      $i->edit($id, $name, $price, $quant, $min_quant,$cod_bars, $this->user->getCompany(), $this->user->getId());
      //$action = 'edit';
      //$i->setLog($id_product, $this->user->getCompany(), $this->user->getId(), $action);
      header("Location:".BASE_URL."inventory");

      header("Location:".BASE_URL."inventory");
    }
    $data['inventory_info'] = $i->getInfo($id, $this->user->getCompany());
    $this->loadTemplate('inventory/inventory_edit', $data);
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