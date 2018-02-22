<?php
class receiveController extends controller {

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
    $this->user->setLoggedUser();
    $company = new companies($this->user->getCompany());
    $data['company_name'] = $company->getName();
    $data['user_email'] = $this->user->getEmail();
    $data['user_name'] = $this->user->getNameUser();
    $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
    $data['form_pay']= array(
      '1' => 'Dinheiro',
      '2'=>'Nota a prazo',
      '3'=>'Cartão de debito',
      '4'=>'Cartão de crédito',
      '5'=>'Cheque',
      '6'=>'Depósito bancário',
      '7'=>'Cancelado'
    );
    
    if ($this->user->hasPermission('receive_view')) {
      $r = new receive();
      if (isset($_GET['cod_venda']) && !empty($_GET['cod_venda'])) {
       $cod_venda = $_GET['cod_venda'];

       $offset = 0;
       $data['p'] = 1;
       if (isset($_GET['p']) && !empty($_GET['p'])) {
        $data['p'] = intval($_GET['p']);
        if ($data['p'] == 0) {
         $data = 1;
       }
     }

     $offset = (10 * ($data['p']-1));
     $data['sales_list'] = $r->getReceiveFiltered($cod_venda, $this->user->getCompany());
     $data['receive_count'] = $r->getCount($this->user->getCompany());
     $data['p_count'] = '0';
     $data['total_receive'] = $r->getTotalReceive($this->user->getCompany());  
   }
   else{
    $offset = 0;
    $data['p'] = 1;
    if (isset($_GET['p']) && !empty($_GET['p'])) {
      $data['p'] = intval($_GET['p']);
      if ($data['p'] == 0) {
       $data = 1;
     }
   }

   $offset = (10 * ($data['p']-1));
   $data['sales_list'] = $r->getList($offset, $this->user->getCompany());
   $data['receive_count'] = $r->getCount($this->user->getCompany());
   $data['p_count'] = ceil($data['receive_count'] / 10);
   $data['total_receive'] = $r->getTotalReceive($this->user->getCompany()); 
 } 
 $this->loadTemplate('receive/receive', $data);

}else {
 header("Location: ".BASE_URL);
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
  $data['form_pay']= array(
    '1' => 'Dinheiro',
    '2'=>'Nota a prazo',
    '3'=>'Cartão de debito',
    '4'=>'Cartão de crédito',
    '5'=>'Cheque',
    '6'=>'Depósito bancário',
    '7'=>'Cancelado'
  );
  
  if ($this->user->hasPermission('receive_edit')) {
    $r = new receive();
    
    $data['permission_edit'] = $this->user->hasPermission('receive_edit');
    if (isset($_POST['status']) && $data['permission_edit']) {
      $status = addslashes($_POST['status']);
      
      $r->changeStatus($status, $id, $this->user->getCompany());

      header("Location: ".BASE_URL."receive");
    }    

    $data['sales_info'] = $r->getInfo($id, $this->user->getCompany());


    $this->loadTemplate('receive/receive_edit', $data);

  }else {
   header("Location: ".BASE_URL);
 }  
}




}
