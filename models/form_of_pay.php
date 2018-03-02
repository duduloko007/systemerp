<?php 


class form_of_pay extends model {



	public function getList($id_company){
		$array = array();
		$sql = $this->db->prepare("SELECT * FROM form_of_pay WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function getInfo($id, $id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM form_of_pay WHERE id = :id AND id_company = :id_company");

		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		return $array;

	}


	public function add($name_pay = '', $number_of_installments = '', $range_of_plots = '', $pay_receive = '',$pay_document = '',$pay_obs = '', $id_company){


		$sql = $this->db->prepare("INSERT INTO form_of_pay SET name_pay = :name_pay, number_of_installments = :number_of_installments, range_of_plots = :range_of_plots, pay_receive = :pay_receive, pay_document = :pay_document, pay_obs = :pay_obs, id_company = :id_company, cod_pay = :cod_pay");
		$sql->bindValue(":name_pay", $name_pay);
		$sql->bindValue(":number_of_installments", $number_of_installments);
		$sql->bindValue(":range_of_plots", $range_of_plots);
		$sql->bindValue(":pay_receive", $pay_receive);
		$sql->bindValue(":pay_document", $pay_document);
		$sql->bindValue(":pay_obs", $pay_obs);
		$sql->bindValue(":id_company", $id_company);
		$sql->bindValue(":cod_pay", '0');
		$sql->execute();

		$id_pay = $this->db->lastInsertId();

		$sql = $this->db->prepare("SELECT MAX(cod_pay)+1 FROM form_of_pay WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {

			$cod =  $sql->fetch();

			foreach ($cod as $cod_result) {


				$cod_pay = $cod_result;

			} 

			$sqlu = $this->db->prepare("UPDATE form_of_pay SET cod_pay = $cod_pay WHERE id = $id_pay AND id_company = :id_company");
			$sqlu->bindValue(":id_company", $id_company);
			$sqlu->execute();
		}
	}

	public function edit($id, $name_pay = '', $number_of_installments = '', $range_of_plots = '', $pay_receive = '',$pay_document = '',$pay_obs = '', $id_company){


		$sql = $this->db->prepare("UPDATE form_of_pay SET name_pay = :name_pay, number_of_installments = :number_of_installments, range_of_plots = :range_of_plots, pay_receive = :pay_receive,pay_document = :pay_document, pay_obs = :pay_obs WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":name_pay", $name_pay);
		$sql->bindValue(":number_of_installments", $number_of_installments);
		$sql->bindValue(":range_of_plots", $range_of_plots);
		$sql->bindValue(":pay_receive", $pay_receive);
		$sql->bindValue(":pay_document", $pay_document);
		$sql->bindValue(":pay_obs", $pay_obs);
		$sql->bindValue(":id_company", $id_company);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	

	
}



?>