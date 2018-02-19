<?php
class usersController extends controller {
private $user;
        public function __construct() {
            parent::__construct();

            $this->user = new Users();
            if($this->user->isLogged() == false){
                header("Location: ".BASE_URL."login");
            }
        }
        // Listar usuarios
        public function index() {
            $data = array();

            $this->user->setLoggedUser();

            $company = new companies($this->user->getCompany());

            $data['company_name'] = $company->getName();
            $data['user_email'] = $this->user->getEmail();
           
            if ($this->user->hasPermission('users_view')) {

                $data['users_list'] = $this->user->getList($this->user->getCompany());
                
                $this->loadTemplate('users/users', $data);
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
           
            if ($this->user->hasPermission('users_view')) {
                $p = new permissions();
                if (isset($_POST['email']) && !empty($_POST['email'])) {
                    $email = addslashes($_POST['email']);
                    $pass = addslashes($_POST['password']);
                    $group = addslashes($_POST['group']);

                   $a =  $this->user->add($email, $pass, $group, $this->user->getCompany());
                   
                    if ($a == '1') {
                        header("Location:".BASE_URL."users");
                    } else {
                        $data['error_msg'] = "Usuário já existe!";
                    }
                }
                $data['group_list'] = $p->getGroupList($this->user->getCompany());
                

                $this->loadTemplate('users/users_add', $data);
        } else {
            header("Location: ".BASE_URL);
        }
    }

     public function edit($id){
            $data = array();

            $this->user->setLoggedUser();

            $company = new companies($this->user->getCompany());

            $data['company_name'] = $company->getName();
            $data['user_email'] = $this->user->getEmail();
           
            if ($this->user->hasPermission('users_view')) {
                $p = new permissions();
                if (isset($_POST['group']) && !empty($_POST['group'])) {
                    $pass = addslashes($_POST['password']);
                    $group = addslashes($_POST['group']);
                   $a =  $this->user->edit($pass, $group, $id, $this->user->getCompany());
                        header("Location:".BASE_URL."/users");
                }
                $data['user_info'] = $this->user->getInfo($id, $this->user->getCompany());
                $data['group_list'] = $p->getGroupList($this->user->getCompany());
                

                $this->loadTemplate('users/users_edit', $data);
        } else {
            header("Location: ".BASE_URL);
        }
    }

    public function delete($id){

        $data = array();

            $this->user->setLoggedUser();

            $company = new companies($this->user->getCompany());

            $data['company_name'] = $company->getName();
            $data['user_email'] = $this->user->getEmail();
           
            if ($this->user->hasPermission('users_view')) {
                $p = new permissions();
        
                $this->user->delete($id, $this->user->getCompany());
                 header("Location: ".BASE_URL."users");
        } else {
            header("Location: ".BASE_URL);
        }

    }

}