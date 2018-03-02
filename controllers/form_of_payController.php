<?php

class form_of_payController extends controller {

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
    $data['user_name'] = $this->user->getNameUser();
    $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());

    $data['pay_option'] = array('0' => 'Não', '1' => 'Sim');


    if ($this->user->hasPermission('form_of_pay_view')) {

      $form_of_pay = new form_of_pay();

      $data['form_pay_list'] = $form_of_pay->getList($this->user->getCompany());
      $data['add_permission'] = $this->user->hasPermission('form_of_pay_add');
      $data['edit_permission'] = $this->user->hasPermission('form_of_pay_edit');

      $this->loadTemplate('form_of_pay/form_of_pay', $data);

    } else {
      header("Location: ".BASE_URL);
    }
  }

  public function add(){
   $data = array();
   $this->user->setLoggedUser();
   $company = new companies($this->user->getCompany());
   $form_of_pay = new form_of_pay();
   $data['company_name'] = $company->getName();
   $data['user_email'] = $this->user->getEmail();
   $data['user_name'] = $this->user->getNameUser();

   $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
   if ($this->user->hasPermission('form_of_pay_add')){

    if (isset($_POST['name_pay']) && !empty($_POST['name_pay'])) {

      $name_pay = addslashes(utf8_encode($_POST['name_pay']));
      $number_of_installments = addslashes($_POST['number_of_installments']);
      $range_of_plots = addslashes($_POST['range_of_plots']);
      $pay_receive = addslashes($_POST['pay_receive']);
      $pay_document = addslashes(utf8_encode($_POST['pay_document']));
      $pay_obs = addslashes(utf8_encode($_POST['pay_obs']));

      $a = $form_of_pay->add($name_pay, $number_of_installments, $range_of_plots, $pay_receive,$pay_document,$pay_obs, $this->user->getCompany());
      header("Location: ".BASE_URL."form_of_pay/form_of_pay");

      
    }
    $this->loadTemplate('form_of_pay/form_of_pay_add', $data);
  } else{
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

  $data['pay_option'] = array('0' => 'Não', '1' => 'Sim');

  if ($this->user->hasPermission('form_of_pay_edit')){
    $form_of_pay = new form_of_pay();
    if (isset($_POST['name_pay']) && !empty($_POST['name_pay'])) {

      $name_pay = addslashes(utf8_encode($_POST['name_pay']));
      $number_of_installments = addslashes($_POST['number_of_installments']);
      $range_of_plots = addslashes($_POST['range_of_plots']);
      $pay_receive = addslashes($_POST['pay_receive']);
        $pay_document = addslashes(utf8_encode($_POST['pay_document']));
      $pay_obs = addslashes(utf8_encode($_POST['pay_obs']));

      $form_of_pay->edit($id,$name_pay, $number_of_installments, $range_of_plots, $pay_receive,$pay_document,$pay_obs, $this->user->getCompany());

      header("Location: ".BASE_URL."form_of_pay/form_of_pay");
    }

    $data['form_pay_info'] = $form_of_pay->getInfo($id, $this->user->getCompany());
    $this->loadTemplate('form_of_pay/form_of_pay_edit', $data);
  }else {
    header("Location:".BASE_URL."form_of_pay");
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

  $data['pay_option'] = array('0' => 'Não', '1' => 'Sim');


  if ($this->user->hasPermission('form_of_pay_view')){
    $form_of_pay = new form_of_pay();
    

    $data['form_pay_info'] = $form_of_pay->getInfo($id, $this->user->getCompany());

    $this->loadTemplate('form_of_pay/form_of_pay_view', $data);
  }else {
    header("Location:".BASE_URL."form_of_pay");
  }

}

public function delete($id){
  $this->user->setLoggedUser();
  if ($this->user->hasPermission('form_of_pay_edit')){
   $form_of_pay = new form_of_pay();
   $form_of_pay->delete($id, $this->user->getCompany(), $this->user->getId());
   header("Location: ".BASE_URL."form_of_pay/form_of_pay");
 }
}
}