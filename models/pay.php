<?php 

class pay extends model {

	public function getListPay($offset, $id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM bills_to_pay WHERE id_company = :id_company  ORDER BY date_maturity ASC LIMIT $offset, 10");

		$sql->bindValue(":id_company", $id_company);
		$sql->execute();


		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();

		}

		return $array;
	}

	public function getCount($status, $id_company){
		$r = 0;
		$sql = $this->db->prepare("SELECT COUNT(*) as b FROM bills_to_pay WHERE status = :status AND id_company = :id_company");
		$sql->bindValue(":status", $status);
		$sql->bindValue(":id_company", $id_company);

		$sql->execute();

		$row = $sql->fetch();

		$r = $row['b'];

		return $r;
	}
	public function getCountAll($id_company){
		$r = 0;
		$sql = $this->db->prepare("SELECT COUNT(*) as b FROM bills_to_pay WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		$row = $sql->fetch();

		$r = $row['b'];

		return $r;
	}
	public function getPayFiltered($status,$offset,  $id_company){

		$array = array();

		$array = array();

		$sql = $this->db->prepare("SELECT * FROM bills_to_pay WHERE status = :status AND id_company = :id_company LIMIT $offset, 10");
		$sql->bindValue(":status", $status);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();


		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();

		}

		return $array;
	}


	public function changeStatusPay($id_company){

		$array = array();

		
		$sql = $this->db->prepare("SELECT status FROM bills_to_pay WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();
		
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
			
			$sql = $this->db->prepare("UPDATE bills_to_pay SET status = '1' WHERE id_company = :id_company AND date_maturity < NOW() AND  status != '2'");
			$sql->bindValue(":id_company", $id_company);

			$sql->execute();


		}

		return $array;

	}


	public function getInfoPay($id, $id_company){
		
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM bills_to_pay WHERE id = :id AND id_company = :id_company");

		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();

		}

		return $array;

	}

	
	
	public function add($id_company, $document, $description, $date_document, $date_maturity, $obs, $price, $status){

		$sql = $this->db->prepare("INSERT INTO bills_to_pay SET id_company = :id_company, document = :document, description = :description, date_document = :date_document, date_maturity = :date_maturity, obs = :obs, price = :price, status = :status, cod_pay = :cod_pay");

		$sql->bindValue(":id_company", $id_company);
		$sql->bindValue(":document", $document);
		$sql->bindValue(":description", $description);
		$sql->bindValue(":date_document", $date_document);
		$sql->bindValue(":date_maturity", $date_maturity);
		$sql->bindValue(":obs", $obs);
		$sql->bindValue(":price", $price);
		$sql->bindValue(":cod_pay", '0');
		$sql->bindValue(":status", $status);

		$sql->execute();



		$id_pay = $this->db->lastInsertId();

		$sql = $this->db->prepare("SELECT MAX(cod_pay)+1 FROM bills_to_pay WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {

			$cod =  $sql->fetch();

			foreach ($cod as $cod_result) {


				$cod_pay = $cod_result;

			} 

			$sqlu = $this->db->prepare("UPDATE bills_to_pay SET cod_pay = $cod_pay WHERE id = $id_pay AND id_company = :id_company");
			$sqlu->bindValue(":id_company", $id_company);
			$sqlu->execute();
		}





	}

	public function edit($document, $description, $date_document, $date_maturity, $obs, $price, $status, $id, $id_company){

		$sql = $this->db->prepare("UPDATE bills_to_pay SET  document = :document, description = :description, date_document = :date_document, date_maturity = :date_maturity, obs = :obs, price = :price, status = :status WHERE id = :id AND id_company = :id_company");

		$sql->bindValue(":document", $document);
		$sql->bindValue(":description", $description);
		$sql->bindValue(":date_document", $date_document);
		$sql->bindValue(":date_maturity", $date_maturity);
		$sql->bindValue(":obs", $obs);
		$sql->bindValue(":price", $price);
		$sql->bindValue(":status", $status);
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);

		$sql->execute();

	}

	public function getTotalMaturity($id_company){

		$float = 0;

		$sql = $this->db->prepare("SELECT SUM(price) as total FROM bills_to_pay WHERE id_company = :id_company AND status = '1'");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		$n = $sql->fetch();
		$float = $n['total'];



		return $float;

	}

	public function getTotalPayOpen($id_company){

		$float = 0;

		$sql = $this->db->prepare("SELECT SUM(price) as total FROM bills_to_pay WHERE id_company = :id_company AND status = '0'");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		$n = $sql->fetch();
		$float = $n['total'];

		
		return $float;
	}


	public function delete($id, $id_company){

		$sql = $this->db->prepare("DELETE FROM bills_to_pay WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id",$id);
		$sql->bindValue(":id_company",$id_company);
		$sql->execute();
	}

	public function getTotalPayCheck($id_company){

		$float = 0;

		$sql = $this->db->prepare("SELECT SUM(price) as total FROM bills_to_pay WHERE id_company = :id_company AND status = '2'");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		$n = $sql->fetch();
		$float = $n['total'];

		return $float;
	}




	public function getTotalPay($id_company){

		$float = 0;

		$sql = $this->db->prepare("SELECT SUM(price) as total FROM bills_to_pay WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		$n = $sql->fetch();
		$float = $n['total'];

		return $float;
	}

	public function getMaturity($id_company){

		$array = array();

		$sql = $this->db->prepare("SELECT * FROM bills_to_pay WHERE id_company = :id_company AND status = '1' ORDER BY date_maturity ASC LIMIT 5");

		$sql->bindValue(":id_company", $id_company);
		$sql->execute();


		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();

		}

		return $array;

	}
}
