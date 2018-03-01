<?php 

class inventory extends model{

	public function getList($id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM inventory WHERE id_company = :id_company");

		$sql->bindValue(":id_company", $id_company);
		$sql->execute();


		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function getListProduct($id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM inventory WHERE id_company = :id_company AND status_sales = 'normal' AND quant > 0");

		$sql->bindValue(":id_company", $id_company);
		$sql->execute();


		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getListHome($id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM inventory WHERE id_company = :id_company AND min_quant >= quant");

		$sql->bindValue(":id_company", $id_company);
		$sql->execute();


		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	} 

	public function getInfo($id, $id_company){
		
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM inventory WHERE id = :id AND id_company = :id_company");

		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();

		}

		return $array;

	}

	public function updateInvetorySales($id){
		$sql = $this->db->prepare("UPDATE inventory SET status_sales = 'afechar' WHERE id = :id");
		$sql->bindValue(":id",$id);
		$sql->execute();
	}
	public function updateInvetorySalesRemove($id){
		$sql = $this->db->prepare("UPDATE inventory SET status_sales = 'normal' WHERE id = :id");
		$sql->bindValue(":id",$id);
		$sql->execute();
	}

	/*public function setLog($id_product, $id_company, $id_user, $action){

		$sql = $this->db->prepare("INSERT INTO inventory_history SET id_company = :id_company, id_product = :id_product, id_user = :id_user, action = :action, date_action = NOW()");
		$sql->bindValue(":id_company", $id_company);
		$sql->bindValue(":id_product", $id_product);
		$sql->bindValue(":id_user", $id_user);
		$sql->bindValue(":action", $action);
		$sql->execute();

	}*/



	public function add($name, $price, $price_cust, $price_percentage, $quant, $min_quant, $cod_bars, $id_company, $id_user){



		$sqli = $this->db->prepare("INSERT INTO inventory SET name = :name, price = :price, price_cust = :price_cust, price_percentage = :price_percentage, quant =:quant, min_quant = :min_quant, cod_bars = :cod_bars, id_company = :id_company, status_sales = 'normal', cod_inventory = :cod_inventory");
		$sqli->bindValue(":name", $name);
		$sqli->bindValue(":price", $price);
		$sqli->bindValue(":price_cust", $price_cust);
		$sqli->bindValue(":price_percentage", $price_percentage);
		$sqli->bindValue(":quant", $quant);
		$sqli->bindValue(":min_quant", $min_quant);
		$sqli->bindValue(":cod_bars", $cod_bars);
		$sqli->bindValue(":cod_inventory", '0');
		$sqli->bindValue(":id_company", $id_company);
		$sqli->execute();

		$id_inventory = $this->db->lastInsertId();
		
		$sql = $this->db->prepare("SELECT MAX(cod_inventory)+1 FROM inventory WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {

			$cod =  $sql->fetch();

			foreach ($cod as $cod_result) {


				$cod_inventory = $cod_result;

			} 

			$sqlu = $this->db->prepare("UPDATE inventory SET cod_inventory = $cod_inventory WHERE id = $id_inventory AND id_company = :id_company");
			$sqlu->bindValue(":id_company", $id_company);
			$sqlu->execute();

			return '1';
		}


		//$id_product = $this->db->lastInsertId();
		//$this->setLog($id_product, $id_company, $id_user, 'add');

	}

	public function edit($id, $name, $price, $price_cust, $price_percentage, $quant, $min_quant, $cod_bars, $id_company, $id_user){

		$sql = $this->db->prepare("UPDATE inventory SET name = :name, price = :price, price_cust = :price_cust, price_percentage = :price_percentage, quant =:quant, min_quant = :min_quant,cod_bars = :cod_bars WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":name", $name);
		$sql->bindValue(":price", $price);
		$sql->bindValue(":price_cust", $price_cust);
		$sql->bindValue(":price_percentage", $price_percentage);
		$sql->bindValue(":quant", $quant);
		$sql->bindValue(":min_quant", $min_quant);
		$sql->bindValue(":cod_bars", $cod_bars);
		$sql->bindValue(":id_company", $id_company);
		$sql->bindValue(":id", $id);

		$sql->execute();
		return '1';
		

		//$this->setLog($id, $id_company, $id_user, 'edit');
	}

	public function delete($id, $id_company /*,$id_user*/){

		$sql = $this->db->prepare("DELETE FROM inventory WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();
	

		//$this->setLog($id, $id_company, $id_user, 'del');
	}


	public function searchProductsByName($name, $id_company){

		$array = array();

		$sql = $this->db->prepare("SELECT name, price, id FROM inventory WHERE name LIKE :name AND id_company = :id_company LIMIT 10");
		$sql->bindValue(':name','%'.$name.'%');
		$sql->bindValue(':id_company', $id_company);
		$sql->execute();


		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;

	}

	public function decrease($id_prod, $id_company, $quant_prod, $id_user){

		$sql = $this->db->prepare("UPDATE inventory SET quant = quant - $quant_prod WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id_prod);
		$sql->bindValue(':id_company', $id_company);
		$sql->execute();



		//$this->setLog($id_prod, $id_company, $id_user, 'dwn');
	}

	public function acresc($id_prod, $id_company, $quant_prod){

		$sql = $this->db->prepare("UPDATE inventory SET quant = quant + $quant_prod WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id_prod);
		$sql->bindValue(':id_company', $id_company);
		$sql->execute();
		//$this->setLog($id_prod, $id_company, $id_user, 'dwn');
	}

	public function getInventoryFiltered($id_company){

		$array = array();

		$sql = $this->db->prepare("SELECT *, (min_quant-quant) as dif FROM inventory WHERE quant <= min_quant AND id_company = :id_company ORDER BY dif DESC");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	public function getProductFiltered($cod_bars, $id_company){

		$array = array();

		$sql = $this->db->prepare("SELECT * FROM inventory WHERE cod_bars = :cod_bars AND id_company = :id_company AND status_sales = 'normal'");
		$sql->bindValue(":cod_bars", $cod_bars);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();


		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
}
/*
		$sqlp = $this->db->prepare("SELECT form_pay FROM sales WHERE form_pay = '7' AND id_company = :id_company");
		$sqlp->bindValue(":id_company", $id_company);
		$sqlp->execute();


		if ($sqlp->rowCount() > 0) {
			
			$sql = $this->db->prepare("UPDATE inventory SET quant = quant + $quant_prod WHERE id = :id AND id_company = :id_company");
			$sql->bindValue(":id", $id_prod);
			$sql->bindValue(':id_company', $id_company);
			$sql->execute();
		}*/