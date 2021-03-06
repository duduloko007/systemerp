<?php
class notfoundController extends controller {
    private $user;
    public function __construct() {
        parent::__construct();


        $this->user = new Users();

        if($this->user->isLogged() == false){

            header("Location:".BASE_URL."login");


        }
        
    }

    public function index() {
        $data = array();
        $this->user->setLoggedUser();
        $company = new companies($this->user->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $this->user->getEmail();
        $data['user_name'] = $this->user->getNameUser();
        $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
        $this->loadTemplate('404', $data);
    }

}