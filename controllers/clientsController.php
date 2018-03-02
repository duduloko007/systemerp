<?php

class clientsController extends controller {

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
    $data['user_name'] = $this->user->getNameUser();
    $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
    $data['user_email'] = $this->user->getEmail();

    $data['type_person_register'] = array(
      '1'=>'Pessoa física',
      '2'=>'Pessoa jurídica'
    );

    if ($this->user->hasPermission('clients_view')) {

     $c = new clients();

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

   $data['add_permission'] = $this->user->hasPermission('clients_add');

   $data['edit_permission'] = $this->user->hasPermission('clients_edit');

   $this->loadTemplate('clients/clients', $data);

 } else {

  header("Location: ".BASE_URL);

}

}

public function add(){

 $data = array();

 $this->user->setLoggedUser();

 $company = new companies($this->user->getCompany());

 $data['company_name'] = $company->getName();
 $data['user_name'] = $this->user->getNameUser();
 $data['user_email'] = $this->user->getEmail();
 $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());

 if ($this->user->hasPermission('clients_add')) {

  $c = new clients();


  if (isset($_POST['name']) && !empty($_POST['name'])) {

    $person_type =  addslashes(utf8_encode($_POST['person_type']));

    $name =  addslashes(utf8_encode($_POST['name']));

    $email = addslashes($_POST['email']);

    $phone = addslashes($_POST['phone']);

    $phone_fix = addslashes($_POST['phone_fix']);

    $stars = addslashes($_POST['stars']);

    $internal_obs = addslashes(utf8_encode($_POST['internal_obs']));

    $address_zipcode = addslashes($_POST['address_zipcode']);

    $address = addslashes($_POST['address']);

    $address_number = addslashes($_POST['address_number']);

    $address2 = addslashes(utf8_encode($_POST['address2']));

    $address_neighb = addslashes($_POST['address_neighb']);

    $address_city = addslashes($_POST['address_city']);

    $address_state = addslashes($_POST['address_state']);

    $address_country = addslashes($_POST['address_country']);

    $cpf_cnpj = addslashes($_POST['cpf_cnpj']);

    $date_birth_fund = addslashes($_POST['date_birth_fund']);

    $identidade = addslashes($_POST['identidade']);

    $name_fantasy =  addslashes(utf8_encode($_POST['name_fantasy']));

    $state_registration = addslashes($_POST['state_registration']);

    $municipal_registration = addslashes($_POST['municipal_registration']);

    $date_birth_fund = implode("-", array_reverse(explode("/", trim($date_birth_fund))));

    $c->add($this->user->getCompany(),$this->user->getId(),$person_type, $name, $email, $phone, $phone_fix, $stars,  $internal_obs, $address_zipcode, $address, $address_number,  $address2, $address_neighb,  $address_city, $address_state, $address_country, $cpf_cnpj, $identidade, $date_birth_fund,$name_fantasy, $state_registration, $municipal_registration);

    header("Location: ".BASE_URL."clients/clients");

  }

  $this->loadTemplate('clients/clients_add', $data);

} else {

 header("Location: ".BASE_URL."clients/clients");

}

}


public function edit($id){


  $data = array();

  $this->user->setLoggedUser();

  $company = new companies($this->user->getCompany());
  $data['user_name'] = $this->user->getNameUser();
  $data['company_name'] = $company->getName();
  $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
  $data['user_email'] = $this->user->getEmail();

  $data['type_person_register'] = array(
    '1'=>'Pessoa física',
    '2'=>'Pessoa jurídica'
  );

  if ($this->user->hasPermission('clients_edit')) {

    $c = new clients();



      if (isset($_POST['name']) && !empty($_POST['name'])) {

        $name =  addslashes(utf8_encode($_POST['name']));

        $email = addslashes($_POST['email']);

        $phone = addslashes($_POST['phone']);

        $phone_fix = addslashes($_POST['phone_fix']);

        $stars = addslashes($_POST['stars']);

        $internal_obs = addslashes(utf8_encode($_POST['internal_obs']));

        $address_zipcode = addslashes($_POST['address_zipcode']);

        $address = addslashes($_POST['address']);

        $address_number = addslashes($_POST['address_number']);

        $address2 = addslashes(utf8_encode($_POST['address2']));

        $address_neighb = addslashes($_POST['address_neighb']);

        $address_city = addslashes($_POST['address_city']);

        $address_state = addslashes($_POST['address_state']);

        $address_country = addslashes($_POST['address_country']);

        $cpf_cnpj = addslashes($_POST['cpf_cnpj']);

        $date_birth_fund = addslashes($_POST['date_birth_fund']);

        $name_fantasy =  addslashes(utf8_encode($_POST['name_fantasy']));

        $state_registration = addslashes($_POST['state_registration']);

        $municipal_registration = addslashes($_POST['municipal_registration']);

        $identidade = addslashes($_POST['identidade']);

        $date_birth_fund = implode("-", array_reverse(explode("/", trim($date_birth_fund))));

        $c->edit($id, $this->user->getCompany(), $name, $email, $phone, $phone_fix, $stars,  $internal_obs, $address_zipcode, $address, $address_number,  $address2, $address_neighb,  $address_city, $address_state, $address_country, $cpf_cnpj, $identidade, $date_birth_fund,$name_fantasy, $state_registration, $municipal_registration);

        header("Location: ".BASE_URL."clients/clients");
      }


    $data['client_info'] = $c->getInfo($id, $this->user->getCompany());

    $this->loadTemplate('clients/clients_edit', $data);

  } else {

   header("Location: ".BASE_URL."clients/clients");

 }

}


public function view($id){


  $data = array();

  $this->user->setLoggedUser();

  $company = new companies($this->user->getCompany());
  $data['user_name'] = $this->user->getNameUser();
  $data['company_name'] = $company->getName();

  $data['user_email'] = $this->user->getEmail();
  $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());

  $data['type_person_register'] = array(
    '1'=>'Pessoa física',
    '2'=>'Pessoa jurídica'
  );

  if ($this->user->hasPermission('clients_view')) {

    $c = new clients();

    $data['client_info'] = $c->getInfo($id, $this->user->getCompany());

    $this->loadTemplate('clients/clients_view', $data);

  } else {

   header("Location: ".BASE_URL."clients/clients");

 }

}

public function delete($id){
  

  header("Location: ".BASE_URL."clients/clients");

}

}

