<?php

class reportController extends controller {

    private $user;

    public function __construct() {

        parent::__construct();



        $this->user = new Users();

        if($this->user->isLogged() == false){

            header("Location: ".BASE_URL."login");

            exit;

        }

    }

    

    public function index(){

        $data = array();

        

        $this->user->setLoggedUser();



        $company = new companies($this->user->getCompany());



        $data['company_name'] = $company->getName();
        $data['user_name'] = $this->user->getNameUser();
        $data['user_email'] = $this->user->getEmail();
        $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
        

        

        if ($this->user->hasPermission('report_view')) {

         

            $this->loadTemplate('report/report', $data);



        }else {

           header("Location: ".BASE_URL);

       }



   }



   public function sales(){

    $data = array();

    

    $this->user->setLoggedUser();

    $data['user_name'] = $this->user->getNameUser();
    $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
    $company = new companies($this->user->getCompany());



    $data['company_name'] = $company->getName();



    $data['user_email'] = $this->user->getEmail();

    $data['statuses'] = array(

        '0'=>'Aguardando Pgto.',

        '1'=>'Pago',

        '2'=>'Cancelado'

    );

    

    if ($this->user->hasPermission('report_view')) {

        

        $this->loadTemplate('report/report_sales', $data);



    }else {

       header("Location: ".BASE_URL);

   }



}

public function sales_pdf(){

    $data = array();

    $data['user_name'] = $this->user->getNameUser();
    $data['group_permissions'] = $this->user->getPer($this->user->getCompany(), $this->user->getId());
    $this->user->setLoggedUser();

    $company = new companies($this->user->getCompany());

    

    $data['statuses'] = array(

        '0'=>'Aguardando Pgto.',

        '1'=>'Pago',

        '2'=>'Cancelado'

    );

    

    if($this->user->hasPermission('report_view')) {

        $client_name = addslashes($_GET['client_name']);

        $period1 = addslashes($_GET['period1']);

        $period2 = addslashes($_GET['period2']);

        $status = addslashes($_GET['status']);

        $order = addslashes($_GET['order']);

        

        $s = new sales();

        $data['sales_list'] = $s->getsalesFiltered($client_name, $period1, $period2, $status, $order, $this->user->getCompany());



        $data['filters'] = $_GET;



        $this->loadLibrary('mpdf60/mpdf');



        ob_start();

        $this->loadView("report/report_sales_pdf", $data);

        $html = ob_get_contents();

        ob_end_clean();



        $mpdf = new mPDF();

        $mpdf->WriteHTML($html);

        $mpdf->Output();



    }else {

       header("Location: ".BASE_URL);

   }

}



public function inventory(){

 $data = array();

 

 $this->user->setLoggedUser();



 $company = new companies($this->user->getCompany());


 $data['user_name'] = $this->user->getNameUser();
 $data['company_name'] = $company->getName();



 $data['user_email'] = $this->user->getEmail();

 

 if ($this->user->hasPermission('report_view')) {

    

    $this->loadTemplate('report/report_inventory', $data);



}else {

   header("Location: ".BASE_URL);

}



}



public function inventory_pdf(){

    $data = array();

    
    $data['user_name'] = $this->user->getNameUser();
    $this->user->setLoggedUser();

    $company = new companies($this->user->getCompany());

    

    

    

    if($this->user->hasPermission('report_view')) {

        $i = new inventory();

        

        $data['inventory_list'] = $i->getinventoryFiltered($this->user->getCompany());



        $data['filters'] = $_GET;



        $this->loadLibrary('mpdf60/mpdf');



        ob_start();

        $this->loadView("report/report_inventory_pdf", $data);

        $html = ob_get_contents();

        ob_end_clean();



        $mpdf = new mPDF();

        $mpdf->WriteHTML($html);

        $mpdf->Output();



    }else {

       header("Location: ".BASE_URL);

   }

}

}

