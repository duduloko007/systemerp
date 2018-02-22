<?php
class payController extends controller {

  private $user;

  public function __construct() {

    parent::__construct();



    $this->user = new Users();

    if($this->user->isLogged() == false){

      header("Location: ".BASE_URL."login");

      exit;

    }

  }

  public function index() {
    $data = array();
    $pay = new pay();
    $this->user->setLoggedUser();
    $company = new companies($this->user->getCompany());
    $data['company_name'] = $company->getName();
    $data['user_email'] = $this->user->getEmail();
    $data['user_name'] = $this->user->getNameUser();
    $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
    $data['add_permission'] = $this->user->hasPermission('pay_add');

    $data['edit_permission'] = $this->user->hasPermission('pay_edit');



    if ($this->user->hasPermission('pay_view')) {


        // Alteração de status //
      $pay->changeStatusPay($this->user->getCompany());

      $data['total_pay_maturity'] = $pay->getTotalMaturity($this->user->getCompany());
      
      $data['total_pay_open'] = $pay->getTotalPayOpen($this->user->getCompany()); 
      $data['total_pay_check'] = $pay->getTotalPayCheck($this->user->getCompany());     
      $data['total_pay'] = $pay->getTotalPay($this->user->getCompany());

      
      $data['statuspay'] = array(
        '0'=>'Em aberto',
        '1'=>'Vencido',
        '2'=>'Pago'
      );

      if (isset($_GET['status']) && $_GET['status'] !='') {
       $status = $_GET['status'];
       
       $offset = 0;
       $data['p'] = 1;
       if (isset($_GET['p']) && !empty($_GET['p'])) {
        $data['p'] = intval($_GET['p']);
        if ($data['p'] == 0) {
         $data = 1;
       }
     }

     $offset = (10 * ($data['p']-1));
     $pay = new pay();
     $data['pay_count'] = $pay->getCount($status, $this->user->getCompany());
     $data['p_count'] = ceil($data['pay_count'] / 10);
     $data['pay_list'] = $pay->getPayFiltered($status, $offset, $this->user->getCompany());

   } else {

    $status = '';
    $offset = 0;
    $data['p'] = 1;
    if (isset($_GET['p']) && !empty($_GET['p'])) {
      $data['p'] = intval($_GET['p']);
      if ($data['p'] == 0) {
       $data = 1;
     }
   }

   $offset = (10 * ($data['p']-1));
   $pay = new pay();
   $data['pay_count'] = $pay->getCountAll($this->user->getCompany());
   $data['p_count'] = ceil($data['pay_count'] / 10);
   $data['pay_list'] = $pay->getListPay($offset, $this->user->getCompany());
   
 }
 
 $this->loadTemplate('pay/pay', $data);
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
  $data['user_name'] = $this->user->getNameUser();
  $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
  if ($this->user->hasPermission('pay_add')){

    if (isset($_POST['description']) && !empty($_POST['description'])) {
      $pay = new pay();


      $description = addslashes($_POST['description']);
      $document = addslashes($_POST['document']);
      $price = addslashes($_POST['price']);
      $date_document = addslashes($_POST['date_document']);
      $date_maturity = addslashes($_POST['date_maturity']);
      $obs = addslashes($_POST['obs']);

      $price = str_replace('.','', $price);

      $price = str_replace(',','.', $price);
      $status = 0;
      $pay->add($this->user->getCompany(), $document, $description, $date_document, $date_maturity, $obs, $price, $status);



      header("Location:".BASE_URL."pay/pay");
    }


    
    $this->loadTemplate('pay/pay_add', $data);
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

  $data['statuspay'] = array(
    '0'=>'Em aberto',
    '1'=>'Vencido',
    '2'=>'Pago'
  );


  if ($this->user->hasPermission('pay_view')){
    $pay = new pay();
    $data['permission_edit'] = $this->user->hasPermission('pay_edit');
    if (isset($_POST['description']) && $data['permission_edit']) {



      $description = addslashes($_POST['description']);
      $document = addslashes($_POST['document']);
      $price = addslashes($_POST['price']);
      $date_document = addslashes($_POST['date_document']);
      $date_maturity = addslashes($_POST['date_maturity']);
      $obs = addslashes($_POST['obs']);
      $status = addslashes($_POST['status']);

      $price = str_replace('.','', $price);

      $price = str_replace(',','.', $price);
      
      $date_maturity = implode("-", array_reverse(explode("/", trim($date_maturity))));
      $date_document = implode("-", array_reverse(explode("/", trim($date_document))));
      
      $pay->edit($document, $description, $date_document, $date_maturity, $obs, $price, $status,$id, $this->user->getCompany());


      header("Location:".BASE_URL."pay/pay");
    }


    $data['pay_info'] = $pay->getInfopay($id, $this->user->getCompany());





    
    $this->loadTemplate('pay/pay_edit', $data);
  }

}

public function delete($id){


  $u = new users();
  $this->user->setLoggedUser();
  $company = new companies($this->user->getCompany());
  $data['company_name'] = $company->getName();
  $data['user_email'] = $this->user->getEmail();
  $data['user_name'] = $this->user->getNameUser();
  $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
  if ($this->user->hasPermission('pay_edit')){
   $pay = new pay();
   $pay->delete($id, $this->user->getCompany(), $this->user->getId());

   header("Location:".BASE_URL."pay/pay");

 }
}
}
