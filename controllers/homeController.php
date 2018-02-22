<?php
class homeController extends controller {

    public function __construct() {
        parent::__construct();


        $u = new Users();

        if($u->isLogged() == false){
            header("Location:".BASE_URL."login");
        }
        
    }

    public function index() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();
        $data['group_permissions'] = $u->getPer($u->getCompany(), $u->getId());
        $data['user_name'] = $u->getNameUser();
        $s = new sales();
        $r = new receive();
        $pay = new pay();
        $i = new inventory();
        $data['form_pay']= array(
            '1' => 'Dinheiro',
            '2'=>'Nota a prazo',
            '3'=>'Cartão de debito',
            '4'=>'Cartão de crédito',
            '5'=>'Cheque',
            '6'=>'Depósito bancário',
            '7'=>'Cancelado'
        );

        $data['statuspay'] = array(
            '0'=>'Em aberto',
            '1'=>'Vencido',
            '2'=>'Pago'
        );
        $data['total_pay_maturity'] = $pay->getTotalMaturity($u->getCompany());
        //$data['products_sold'] = $s->getSoldProducts(date('Y-m-d', strtotime('-30 days')), date('Y-m-d'), $u->getCompany());

        $data['products_sold_min'] = $i->getListHome($u->getCompany());

        $data['revenue'] = $s->getTotalRevenue(date('Y-m-d', strtotime('-30 days')), date('Y-m-d'), $u->getCompany());
        $data['expenses'] = $s->getTotalExpenses(date('Y-m-d', strtotime('-30 days')), date('Y-m-d'), $u->getCompany());;

        $data['days_list'] = array();
        for($q=30;$q>0;$q--){
            $data['days_list'][] = date('d/m', strtotime('-'.$q.' days'));
        }
        $data['total_receive'] = $r->getTotalReceive($u->getCompany());

        $data['revenue_list'] = $s->getRevenueList(date('Y-m-d', strtotime('-30 days')), date('Y-m-d'), $u->getCompany());

        $data['expenses_list'] = $s->getExpensesList(date('Y-m-d', strtotime('-30 days')), date('Y-m-d'), $u->getCompany());

        $data['status_list'] = $s->getQuantStatusList(date('Y-m-d', strtotime('-30 days')), date('Y-m-d'), $u->getCompany());

        $data['pay_maturity'] = $pay->getMaturity($u->getCompany());

        $this->loadTemplate('home', $data);
    }

}