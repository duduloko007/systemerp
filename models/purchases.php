<?php
class purchases extends model{


	public function getList($id_company){

		$array = array();

		$sql = $this->db->prepare("
			SELECT 
			purchases.id,
			purchases.cod_purchases,
			purchases.date_sale, 
			purchases.total_price,
			supplier.name 
			FROM purchases  
			LEFT JOIN supplier ON supplier.id = purchases.id_client
			
			WHERE 
			purchases.id_company = :id_company 
			ORDER BY purchases.date_sale DESC");

		$sql->bindValue(":id_company", $id_company);

		$sql->execute();

		if ($sql->rowCount() > 0) {

			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function price($id){
		$dados = array();

		$sql = $this->db->prepare("SELECT * FROM inventory WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();


		if($sql->rowCount() > 0){
			$dados = $sql->fetch();
		}

		return $dados;
	}

	public function getlistPurchases($id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM inventory WHERE status_sales = 'normal' AND id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function getlistPurchases1($id_company){
		$array = array();




		$sql = $this->db->prepare("SELECT * FROM inventory WHERE status_sales = 'afechar' AND id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function addPurchases($id_company, $id_client, $id_user, $quant, $date_sale, $discount, $obs){
		$i = new inventory();



		$sql = $this->db->prepare("INSERT INTO purchases SET id_company = :id_company, id_client = :id_client, id_user = :id_user, date_sale = :date_sale, total_price = :total_price, obs = :obs, discount = :discount, cod_purchases = :cod_purchases");


		$sql->bindValue(":id_company", $id_company);
		$sql->bindValue(":id_client", $id_client);
		$sql->bindValue(":id_user", $id_user);
		$sql->bindValue(":date_sale", $date_sale);
		$sql->bindValue(":obs", $obs);
		$sql->bindValue(":discount", $discount);
		$sql->bindValue(":cod_purchases", '0');
		$sql->bindValue(":total_price", '0');

		$sql->execute();

		$id_sale = $this->db->lastInsertId();


		$sql = $this->db->prepare("SELECT MAX(cod_purchases)+1 FROM purchases WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {

			$cod =  $sql->fetch();

			foreach ($cod as $cod_result) {


				$cod_purchases = $cod_result;

			} 

			$sqlu = $this->db->prepare("UPDATE purchases SET cod_purchases = $cod_purchases WHERE id = $id_sale AND id_company = :id_company");
			$sqlu->bindValue(":id_company", $id_company);
			$sqlu->execute();
		}






		$total_price = 0;
		foreach ($quant as $id_prod => $quant_prod) {
			$sql = $this->db->prepare("SELECT price_cust FROM inventory WHERE id = :id AND id_company = :id_company");
			$sql->bindValue(":id", $id_prod);
			$sql->bindValue(":id_company", $id_company);
			$sql->execute();
			if ($sql->rowCount() > 0 ) {
				
				$row = $sql->fetch();
				$price = $row['price_cust'];

				$sqlp = $this->db->prepare("INSERT INTO purchases_products SET id_company = :id_company, id_sale = :id_sale, id_product = :id_product, quant = :quant, sale_price = :sale_price");

				$sqlp->bindValue(":id_company", $id_company);
				$sqlp->bindValue(":id_sale", $id_sale);
				$sqlp->bindValue(":id_product", $id_prod);
				$sqlp->bindValue(":quant", $quant_prod);
				$sqlp->bindValue(":sale_price", $price);

				$sqlp->execute();

				$i->acresc($id_prod, $id_company, $quant_prod, $id_user);



				$total_price += ($price * $quant_prod) - $discount;

			}	
		}

		$sql = $this->db->prepare("UPDATE purchases SET total_price = :total_price WHERE id = :id");
		$sql->bindValue(":total_price",$total_price);
		$sql->bindValue(":id", $id_sale);
		$sql->execute();



	}

	public function status_product($quant){
		foreach ($quant as $id_prod => $quant_prod) {
			$sql = $this->db->prepare("UPDATE inventory SET status_sales = 'normal' WHERE id = :id");
			$sql->bindValue(":id",$id_prod);
			$sql->execute();

		}
	}


	public function editPurchases($id, $id_company, $id_client, $id_user, $quant, $date_sale, $discount, $obs){
		$i = new inventory();



		$sql = $this->db->prepare("UPDATE purchases SET id_company = :id_company, id_client = :id_client, id_user = :id_user, date_sale = :date_sale, total_price = :total_price, obs = :obs WHERE id = :id");


		$sql->bindValue(":id_company", $id_company);
		$sql->bindValue(":id_client", $id_client);
		$sql->bindValue(":id_user", $id_user);
		$sql->bindValue(":date_sale", $date_sale);
		$sql->bindValue(":obs", $obs);
		$sql->bindValue(":id", $id);
		$sql->bindValue(":total_price", '0');

		$sql->execute();

		$id_sale = $this->db->lastInsertId();

		$total_price = 0;
		foreach ($quant as $id_prod => $quant_prod) {
			$sql = $this->db->prepare("SELECT price_cust FROM inventory WHERE id = :id AND id_company = :id_company");
			$sql->bindValue(":id", $id_prod);
			$sql->bindValue(":id_company", $id_company);
			$sql->execute();
			if ($sql->rowCount() > 0 ) {
				
				$row = $sql->fetch();
				$price = $row['price_cust'];

				$sqlp = $this->db->prepare("INSERT INTO purchases_products SET id_company = :id_company, id_sale = :id_sale, id_product = :id_product, quant = :quant, sale_price = :sale_price");

				$sqlp->bindValue(":id_company", $id_company);
				$sqlp->bindValue(":id_sale", $id_sale);
				$sqlp->bindValue(":id_product", $id_prod);
				$sqlp->bindValue(":quant", $quant_prod);
				$sqlp->bindValue(":sale_price", $price);

				$sqlp->execute();

				$i->acresc($id_prod, $id_company, $quant_prod, $id_user);



				$total_price += $price * $quant_prod;

			}	
		}

		$sql = $this->db->prepare("UPDATE purchases SET total_price = :total_price WHERE id = :id");
		$sql->bindValue(":total_price",$total_price);
		$sql->bindValue(":id", $id_sale);
		$sql->execute();



	}


	public function getInfo($id, $id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT *, (select supplier.name from supplier where supplier.id = purchases.id_client) as client_name FROM purchases WHERE id = :id AND id_company = :id_company");

		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array['info'] = $sql->fetch();
		}
		$sql = $this->db->prepare("
			SELECT 
			purchases_products.quant, 
			purchases_products.sale_price, 
			inventory.name,
			inventory.id,
			inventory.cod_bars		
			FROM purchases_products 
			LEFT JOIN inventory ON inventory.id = purchases_products.id_product
			WHERE 
			purchases_products.id_sale = :id_sale 
			AND purchases_products.id_company = :id_company");
		$sql->bindValue(":id_sale", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array['products'] = $sql->fetchAll();
		}
		return $array;
	}

	


	
}
