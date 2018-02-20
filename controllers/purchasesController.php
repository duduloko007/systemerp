<?php

class purchasesController extends controller {
  public function __construct() {
    parent::__construct();

    $u = new Users();
    if($u->isLogged() == false){
      header("Location: ".BASE_URL."login");
      exit;
    }
  }
        // Listar vendas
  public function index(){
    $data = array();
    $u = new Users();
    $u->setLoggedUser();

    $company = new companies($u->getCompany());
    $data['company_name'] = $company->getName();

    $data['user_email'] = $u->getEmail();
    

    if ($u->hasPermission('sales_view')) {
      $p = new purchases();
      $offset = 0;
      $data['purchases_list'] = $p->getList($offset, $u->getCompany());

      $this->loadTemplate('purchases/purchases', $data);

    }else {
     header("Location: ".BASE_URL);
   }

 }
 public function add(){
  $data = array();
  $u = new Users();
  $u->setLoggedUser();
  $company = new companies($u->getCompany());
  $data['company_name'] = $company->getName();
  $data['user_email'] = $u->getEmail();
  if ($u->hasPermission('sales_view')) {
    $p = new purchases();
    $i = new inventory();
    $c = new supplier();




    $data['client_list'] = $c->getInfoSales($u->getCompany());
    $data['listSalesVenda'] = $p->getlistPurchases1($u->getCompany());
    if(isset($_GET['cod_bars']) && !empty($_GET['cod_bars'])){
      $cod_bars = addslashes($_GET['cod_bars']);
      $data['inventory_list'] = $i->getProductFiltered($cod_bars, $u->getCompany());
    } else{
      $data['inventory_list'] = $i->getListProduct($u->getCompany());

    }

    if (isset($_POST['quant']) && !empty($_POST['quant'])) {
      $quant = $_POST['quant'];
      $client_id = addslashes($_POST['client_id']);
      $date_sale = addslashes($_POST['date_sale']);
      $discount = addslashes($_POST['desconto']);

      $obs = addslashes($_POST['obs']);

     // $date_sale = implode("-", array_reverse(explode("/", trim($date_sale))));

      $p->addPurchases($u->getCompany(), $client_id, $u->getId(), $quant, $date_sale, $discount, $obs);

      $p->status_product($quant);

      header("Location: ".BASE_URL."purchases/purchases/add");

    } 

    $this->loadTemplate('purchases/purchases_add', $data);
  }else {
   header("Location: ".BASE_URL);
 }
}

public function edit($id){
  $data = array();
  $u = new Users();
  $u->setLoggedUser();
  $company = new companies($u->getCompany());
  $data['company_name'] = $company->getName();
  $data['user_email'] = $u->getEmail();

  $data['user_email'] = $u->getEmail();



  if ($u->hasPermission('sales_view')) {
   $p = new purchases();
   $data['permission_edit'] = $u->hasPermission('sales_edit');
   if (isset($_POST['status']) && $data['permission_edit']) {
    $status = addslashes($_POST['status']);
    $obs = addslashes($_POST['obs']);
    $s->changeStatus($status, $obs, $id, $u->getCompany());
    header("Location: ".BASE_URL."purchases");
  }    
  $data['sales_info'] = $p->getInfo($id, $u->getCompany());
  $this->loadTemplate('purchases/purchases_edit', $data);
}else {
 header("Location: ".BASE_URL);
}  
}

public function add_product($id){
  $s = new sales();
  $i = new inventory();
  $i->updateInvetorySales($id);
  header("Location:".BASE_URL."purchases/add");
}

public function remove_product($id){
  $i = new inventory();
  $i->updateInvetorySalesRemove($id);
  header("Location:".BASE_URL."purchases/add");
}

}
