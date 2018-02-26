<?php
class receive extends model{


	public function getList($offset, $id_company){

		$array = array();

		$sql = $this->db->prepare("
			SELECT 
				sales.id,
				sales.cod_sales,
				sales.date_sale, 
			 	sales.total_price,
			 	sales.form_pay,
			 	clients.name,
			 	clients.cod_client  
			FROM sales  
			LEFT JOIN clients ON clients.cod_client = sales.id_client
			
			WHERE 
				sales.id_company = :id_company 
			
			 AND form_pay = '2'  LIMIT $offset, 10");
		$sql->bindValue(":id_company", $id_company);

		$sql->execute();

if ($sql->rowCount() > 0) {
	
	$array = $sql->fetchAll();
}

		return $array;
	}

			public function getCount($id_company){
		$r = 0;
		$sql = $this->db->prepare("SELECT COUNT(*) as s FROM sales WHERE id_company = :id_company AND form_pay = '2'");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		$row = $sql->fetch();

		$r = $row['s'];

		return $r;
	}

	public function getReceiveFiltered($cod_venda, $id_company){

		$array = array();

		$sql = $this->db->prepare("
			SELECT 
				sales.id,
				sales.cod_sales,
				sales.date_sale, 
			 	sales.total_price,
			 	sales.status,
			 	clients.name,
			 	clients.cod_client 
			FROM sales  
			LEFT JOIN clients ON clients.cod_client = sales.id_client
			
			WHERE 
				sales.cod_sales = :cod_venda
				AND sales.id_company = :id_company");
		$sql->bindValue(":cod_venda", $cod_venda);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getInfo($id, $id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT *, (select clients.name from clients where clients.cod_client = sales.id_client) as client_name FROM sales WHERE id = :id AND id_company = :id_company");

		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array['info'] = $sql->fetch();
		}
		$sql = $this->db->prepare("
			SELECT 
			sales_products.quant, 
			sales_products.sale_price, 
			inventory.name		
			FROM sales_products 
			LEFT JOIN inventory ON inventory.id = sales_products.id_product
			WHERE 
			sales_products.id_sale = :id_sale 
			AND sales_products.id_company = :id_company");
		$sql->bindValue(":id_sale", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array['products'] = $sql->fetchAll();
		}
		return $array;
	}
	

	
    public function changeStatus($status, $id, $id_company){

        $sql = $this->db->prepare("UPDATE sales SET form_pay = :form_pay WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":form_pay", $status);
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();


    }

    public function getTotalReceive($id_company){

		$float = 0;

		$sql = $this->db->prepare("SELECT SUM(total_price) as total FROM sales WHERE id_company = :id_company AND form_pay = '2'");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		$n = $sql->fetch();
		$float = $n['total'];

		return $float;
}
}
