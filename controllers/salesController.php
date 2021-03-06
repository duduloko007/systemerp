<?php
class salesController extends controller {

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
    $data['user_name'] = $u->getNameUser();
    $data['user_email'] = $u->getEmail();
    $data['group_permissions'] = $u->getPer($u->getCompany(), $u->getId());
    $data['form_pay']= array(
      '1' => 'Dinheiro',
      '2'=>'Nota a prazo',
      '3'=>'Cartão de debito',
      '4'=>'Cartão de crédito',
      '5'=>'Cheque',
      '6'=>'Depósito bancário',
      '7'=>'Cancelado'
    );
    $data['sales_add'] = $u->hasPermission('sales_add');
    if ($u->hasPermission('sales_view')) {
      $s = new sales();
      
      $data['sales_list'] = $s->getList($u->getCompany());

      $this->loadTemplate('sales/sales', $data);

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
  $data['user_name'] = $u->getNameUser();
  $data['group_permissions'] = $u->getPer($u->getCompany(), $u->getId());
  if ($u->hasPermission('sales_add')) {
    $s = new sales();
    $i = new inventory();
    $client = new clients();


    $data['form_pay']= array(
      '1' => 'Dinheiro',
      '2'=>'Nota a prazo',
      '3'=>'Cartão de debito',
      '4'=>'Cartão de crédito',
      '5'=>'Cheque',
      '6'=>'Depósito bancário'
    );


    $data['client_list'] = $client->getInfoSales($u->getCompany());
    $data['listSalesVenda'] = $s->getlistSales1($u->getCompany());
    if(isset($_GET['cod_bars']) && !empty($_GET['cod_bars'])){
      $cod_bars = addslashes($_GET['cod_bars']);
      $data['inventory_list'] = $i->getProductFiltered($cod_bars, $u->getCompany());
    } else{
      $data['inventory_list'] = $i->getListProduct($u->getCompany());

    }

    if (isset($_POST['quant']) && !empty($_POST['quant'])) {
      $quant = $_POST['quant'];
      $client_id = addslashes($_POST['client_id']);
      $discount = addslashes($_POST['desconto']);
      $form_pay = addslashes($_POST['form_pay_view']);
      $obs = addslashes($_POST['obs']);

      $s->addSale($u->getCompany(), $client_id, $u->getId(), $quant, $form_pay, $discount, $obs);

      $s->status_product($quant);

      header("Location: ".BASE_URL."sales/sales/add");
      
    } 

    $this->loadTemplate('sales/sales_add', $data);
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
  $data['user_name'] = $u->getNameUser();
  $data['group_permissions'] = $u->getPer($u->getCompany(), $u->getId());
  $data['user_email'] = $u->getEmail();

  $data['user_email'] = $u->getEmail();

  $data['form_pay']= array(
    '1' => 'Dinheiro',
    '2'=>'Nota a prazo',
    '3'=>'Cartão de debito',
    '4'=>'Cartão de crédito',
    '5'=>'Cheque',
    '6'=>'Depósito bancário',
    '7'=>'Cancelado'
  );


  if ($u->hasPermission('sales_view')) {
    $s = new sales();
    $data['permission_edit'] = $u->hasPermission('sales_edit');

    if (isset($_POST['status']) && !empty($_POST['status'])) {

      $status = addslashes($_POST['status']);

      $obs = addslashes($_POST['obs']);

      $quant = $_POST['quant'];

      


      $s->changeStatus($status, $obs, $id,  $u->getCompany());


      $s->changeProduct($quant,  $u->getCompany(),$status);

      header("Location: ".BASE_URL."sales");
    }    
    $data['sales_info'] = $s->getInfo($id, $u->getCompany());
    $this->loadTemplate('sales/sales_edit', $data);
  }else {
   header("Location: ".BASE_URL);
 }  
}

public function add_product($id){
  $s = new sales();
  $i = new inventory();
  $i->updateInvetorySales($id);
  header("Location:".BASE_URL."sales/add");
}

public function remove_product($id){
  $i = new inventory();
  $i->updateInvetorySalesRemove($id);
  header("Location:".BASE_URL."sales/add");
}

}
