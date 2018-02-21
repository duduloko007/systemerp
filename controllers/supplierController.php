<?php
class supplierController extends controller{
	private $user;
  public function __construct() {
    parent::__construct();
    $this->user = new Users();
    if($this->user->isLogged() == false){
      header("Location: ".BASE_URL."login");
    }
  }

        // Listar clientes

  public function index() {
    $data = array();
    $this->user->setLoggedUser();
    $company = new companies($this->user->getCompany());
    $data['company_name'] = $company->getName();
    $data['user_email'] = $this->user->getEmail();

    if ($this->user->hasPermission('supplier_view')) {
     $c = new supplier();
     $offset = 0;
     $data['p'] = 1;
     if (isset($_GET['p']) && !empty($_GET['p'])) {
      $data['p'] = intval($_GET['p']);
      if ($data['p'] == 0) {
       $data = 1;
     }
   }
   $offset = (10 * ($data['p']-1));
   $data['clients_list'] = $c->getList($offset, $this->user->getCompany());
   $data['clients_count'] = $c->getCount($this->user->getCompany());
   $data['p_count'] = ceil($data['clients_count'] / 10);
   $data['add_permission'] = $this->user->hasPermission('supplier_add');
   $data['edit_permission'] = $this->user->hasPermission('supplier_edit');
   $this->loadTemplate('supplier/supplier', $data);
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

 if ($this->user->hasPermission('supplier_add')) {
   $c = new supplier();
   if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $phone = addslashes($_POST['phone']);
    $stars = addslashes($_POST['stars']);
    $internal_obs = addslashes($_POST['internal_obs']);
    $address_zipcode = addslashes($_POST['address_zipcode']);
    $address = addslashes($_POST['address']);
    $address_number = addslashes($_POST['address_number']);
    $address2 = addslashes($_POST['address2']);
    $address_neighb = addslashes($_POST['address_neighb']);
    $address_city = addslashes($_POST['address_city']);
    $address_state = addslashes($_POST['address_state']);
    $address_country = addslashes($_POST['address_country']);
    $cpf_cnpj = addslashes($_POST['cpf_cnpj']);

    $inscri_estadual = addslashes($_POST['inscri_estadual']);


    $c->add($this->user->getCompany(), $name, $email, $phone, $stars,  $internal_obs, $address_zipcode, $address, $address_number,  $address2, $address_neighb,  $address_city, $address_state, $address_country, $cpf_cnpj, $inscri_estadual);
    header("Location: ".BASE_URL."supplier");
  }
  $this->loadTemplate('supplier/supplier_add', $data);
} else {
  header("Location: ".BASE_URL."supplier");
}
}
public function edit($id){
  $data = array();
  $this->user->setLoggedUser();
  $company = new companies($this->user->getCompany());
  $data['company_name'] = $company->getName();
  $data['user_email'] = $this->user->getEmail();
  if ($this->user->hasPermission('supplier_edit')) {
    $c = new supplier();
    if (isset($_POST['name']) && !empty($_POST['name'])) {
      $name = addslashes($_POST['name']);
      $email = addslashes($_POST['email']);
      $phone = addslashes($_POST['phone']);
      $stars = addslashes($_POST['stars']);
      $internal_obs = addslashes($_POST['internal_obs']);
      $address_zipcode = addslashes($_POST['address_zipcode']);
      $address = addslashes($_POST['address']);
      $address_number = addslashes($_POST['address_number']);
      $address2 = addslashes($_POST['address2']);
      $address_neighb = addslashes($_POST['address_neighb']);
      $address_city = addslashes($_POST['address_city']);
      $address_state = addslashes($_POST['address_state']);
      $address_country = addslashes($_POST['address_country']);
      $cpf_cnpj = addslashes($_POST['cpf_cnpj']);

      $inscri_estadual = addslashes($_POST['inscri_estadual']);
      $c->edit($id, $this->user->getCompany(), $name, $email, $phone, $stars,  $internal_obs, $address_zipcode, $address, $address_number,  $address2, $address_neighb,  $address_city, $address_state, $address_country, $cpf_cnpj, $inscri_estadual);
      header("Location: ".BASE_URL."supplier");
    }
    $data['client_info'] = $c->getInfo($id, $this->user->getCompany());
    $this->loadTemplate('supplier/supplier_edit', $data);
  } else {
   header("Location: ".BASE_URL."supplier");
 }
}

public function delete($id){

  $this->user->setLoggedUser();
  $company = new companies($this->user->getCompany());
  $data['company_name'] = $company->getName();
  $data['user_email'] = $this->user->getEmail();
  $p = new supplier();


  if($this->user->hasPermission('supplier_edit')) {

    $p->del($id, $this->user->getCompany());
    header("Location: ".BASE_URL."supplier");
  }




}
}
?>