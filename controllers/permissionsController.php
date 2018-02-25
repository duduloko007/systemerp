<?php
class permissionsController extends controller {
    private $user;
    public function __construct() {
        parent::__construct();

        $this->user = new Users();
        if($this->user->isLogged() == false){
        	header("Location: ".BASE_URL."login");
        }
    }
    // Listar os dados de Grupos e Permissões
    public function index() {
        $data = array();
        $this->user->setLoggedUser();

        $company = new companies($this->user->getCompany());
        $data['user_name'] = $this->user->getNameUser();
        $data['company_name'] = $company->getName();
        $data['user_email'] = $this->user->getEmail();
        
        $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());

        $data['add_permission'] = $this->user->hasPermission('permissions_add');
        $data['edit_permission'] = $this->user->hasPermission('permissions_edit');
        $data['view_permission'] = $this->user->hasPermission('permissions_view');
        $data['permissions_developer'] = $this->user->hasPermission('permissions_developer');
        if ($this->user->hasPermission('permissions_view')) {

            $permissions = new permissions();
            $data['permissions_list'] = $permissions->getList();
            $data['permissions_groups_list'] = $permissions->getGroupList($this->user->getCompany());

            $this->loadTemplate('permission/permissions', $data);
        } else {
            header("Location: ".BASE_URL);
        }

    }
    //Adicionar Permissão
    public function add(){

        $data = array();
        $this->user->setLoggedUser();

        $company = new companies($this->user->getCompany());
        $data['user_name'] = $this->user->getNameUser();
        $data['company_name'] = $company->getName();
        $data['user_email'] = $this->user->getEmail();
        $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
        if ($this->user->hasPermission('permissions_add')) {
            $permissions = new permissions();

            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $pname = addslashes(utf8_encode($_POST['name']));
                $permissions->add($pname);
                header("Location: ".BASE_URL."permissions");
            }
            $this->loadTemplate('permission/permissions_add', $data);
        } else {
            header("Location: ".BASE_URL);
        }
    }

    // Adicionar um novo Grupo de Permissões
    public function add_group(){

        $data = array();
        $this->user->setLoggedUser();

        $company = new companies($this->user->getCompany());
        $data['user_name'] = $this->user->getNameUser();
        $data['company_name'] = $company->getName();
        $data['user_email'] = $this->user->getEmail();
        $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
        if ($this->user->hasPermission('permissions_add')) {
            $permissions = new permissions();

            if (isset($_POST['name']) && !empty($_POST['name'])) {
                 $pname = addslashes(utf8_encode($_POST['name']));
                $plist = $_POST['permissions'];
                $permissions->addGroup($pname, $plist, $this->user->getCompany());
                header("Location: ".BASE_URL."permissions");
            }

            $data['permissions_list'] = $permissions->getList($this->user->getCompany());

            $this->loadTemplate('permission/permissions_add_group', $data);
        } else {
            header("Location: ".BASE_URL);
        }


    }

    // Deletar uma Permissão
    public function delete($id){

        $data = array();
        $this->user->setLoggedUser();

        $company = new companies($this->user->getCompany());
        $data['user_name'] = $this->user->getNameUser();
        $data['company_name'] = $company->getName();
        $data['user_email'] = $this->user->getEmail();
        $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
        if ($this->user->hasPermission('permissions_edit')) {
            $permissions = new permissions();
            $permissions->delete($id);
            header("Location: ".BASE_URL."permissions");
        } else {
            header("Location: ".BASE_URL);
        }
    }


    // Deletar um grupo de Permissões
    public function delete_group($id){
        $data = array();
        $u = new users();
        $this->user->setLoggedUser();

        $company = new companies($this->user->getCompany());
        $data['user_name'] = $this->user->getNameUser();
        $data['company_name'] = $company->getName();
        $data['user_email'] = $this->user->getEmail();
        $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
        if ($this->user->hasPermission('permissions_edit')) {
            $permissions = new permissions();
            $permissions->deleteGroup($id);
            header("Location: ".BASE_URL."permissions");
        } else {
            header("Location: ".BASE_URL);
        }
    }

    // Editar grupo de Permissão
    public function edit_group($id){
        $data = array();
        $this->user->setLoggedUser();
        $data['user_name'] = $this->user->getNameUser();
        $company = new companies($this->user->getCompany());

        $data['company_name'] = $company->getName();
        $data['user_email'] = $this->user->getEmail();
        $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
        if ($this->user->hasPermission('permissions_edit')) {
            $permissions = new permissions();

            if (isset($_POST['name']) && !empty($_POST['name'])) {
                  $pname = addslashes(utf8_encode($_POST['name']));
                $plist = $_POST['permissions'];

                $permissions->editGroup($pname, $plist, $id, $this->user->getCompany());
                header("Location: ".BASE_URL."permissions");
            }

            $data['permissions_list'] = $permissions->getList($this->user->getCompany());
            $data['group_info'] = $permissions->getGroup($id, $this->user->getCompany());

            $this->loadTemplate('permission/permissions_edit_group', $data);
        } else {
            header("Location: ".BASE_URL);
        }

    }

}