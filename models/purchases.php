<?php 

class purchases extends model {


	
	public function add($id,$quant,$fornecedor,$preco,$data,$id_company){
		$dados = array();
		$sql = $this->db->prepare("SELECT * FROM inventory WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		if($sql->rowCount() > 0){
			$dados =  $sql->fetch();
			$estoque = $dados['quant'] + $quant;

			$sql = $this->db->prepare("UPDATE inventory SET quant = :estoque WHERE id = :id");
			$sql->bindValue(":estoque", $estoque);
			$sql->bindValue(":id", $id);
			$sql->execute();

			$sql = $this->db->prepare("INSERT INTO purchasses_products  SET fornecedor = :fornecedor, produto = :id, quant = :quant, purchasses_price = :preco, date_pucharses = :data, id_company = :id_company");
			$sql->bindValue(":fornecedor", $fornecedor);
			$sql->bindValue(":quant", $quant);
			$sql->bindValue(":preco", $preco);
			$sql->bindValue(":data", $data);
			$sql->bindValue(":id", $id);
			$sql->bindValue(":id_company", $id_company);
			$sql->execute();

		}

		
	}
	public function getlist($id_company){
		$dados = array();

		$sql = $this->db->prepare("SELECT purchasses_products.fornecedor,purchasses_products.quant, purchasses_products.produto,purchasses_products.purchasses_price,inventory.name,purchasses_products.date_pucharsses FROM purchasses_products INNER JOIN inventory ON inventory.id = purchasses_products.produto WHERE purchasses_products.id_company  = :id_company"); 
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0){
			$dados = $sql->fetchAll();
		}

		return $dados;
	}

	

}