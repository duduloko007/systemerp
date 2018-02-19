<?php

class purchasesController extends controller {

private $user;

        public function __construct() {

            parent::__construct();
            $this->user = new Users();
            if($this->user->isLogged() == false){
                header("Location: ".BASE_URL."login");
                exit;
            }
        }

        // Listar vendas

        public function index(){
        $data = array(
            'purchases' => array()
        );
        $this->user->setLoggedUser();
        $company = new companies($this->user->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $this->user->getEmail();
        if ($this->user->hasPermission('purchases_view')) {

        $purchase = new purchases();
        $data['purchases'] = $purchase->getlist($this->user->getCompany());

            $this->loadTemplate('purchases/purchases', $data);
        }else {
           header("Location: ".BASE_URL);
        }
    }
    public function add(){
        $data = array(
            'msg' => array()
        );

            $this->user->setLoggedUser();
            $company = new companies($this->user->getCompany());
            $data['company_name'] = $company->getName();
            $data['user_email'] = $this->user->getEmail();

        if ($this->user->hasPermission('clients_edit')) {

            $c = new supplier();
            $data['suppliers_list'] = $c->getList($this->user->getCompany());
             $i = new Inventory();
            $data['inventory_list'] = $i->getLists($this->user->getCompany());

           if(isset($_POST['stars']) AND !empty($_POST['stars'])){
                $fornecedor = addslashes($_POST['stars']);
                $data = addslashes($_POST['data']);
                $produto = addslashes($_POST['produto']);
                $quant = addslashes($_POST['quant']);
                $preco = addslashes($_POST['preco']);

                $purchases = new purchases();
                $purchases->add($produto,$quant,$fornecedor,$preco,$data, $this->user->getCompany());
                $data['msg'] = "Cadastrado com sucesso";
                header("Location:".BASE_URL."/purchases/add");

           }   
             $this->loadTemplate('purchases/purchases_add', $data);
        }

        
    }

}

