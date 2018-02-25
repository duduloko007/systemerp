<?php
class supplier extends model{


	public function getList( $offset, $id_company){

		$array = array();
		$sql = $this->db->prepare("SELECT * FROM supplier WHERE id_company = :id_company LIMIT $offset, 10");

		$sql->bindValue(":id_company", $id_company);
		$sql->execute();
		
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function getInfoSales($id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM supplier WHERE  id_company = :id_company");

		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;

	}
	public function getInfo($id, $id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM supplier WHERE id = :id AND id_company = :id_company");

		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		return $array;

	}

	public function getCount($id_company){
		$r = 0;
		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM supplier WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		$row = $sql->fetch();
		$r = $row['c'];
		return $r;
	}

	public function add($id_company, $name, $email = '', $phone = '', $stars = '3',  $internal_obs = '', $address_zipcode = '', $address = '', $address_number = '',  $address2 = '', $address_neighb = '',  $address_city = '', $address_state = '', $address_country = '', $cpf_cnpj = '', $inscri_estadual= ''){

		$sql = $this->db->prepare("INSERT INTO supplier SET id_company = :id_company, name = :name, email = :email, phone = :phone, stars = :stars, internal_obs = :internal_obs, address_zipcode = :address_zipcode, address = :address, address_number = :address_number, address2 = :address2, address_neighb = :address_neighb, address_city = :address_city, address_state = :address_state, address_country = :address_country, cpf_cnpj = :cpf_cnpj, inscri_estadual = :inscri_estadual, cod_supplier = :cod_supplier");

		$sql->bindValue(":name", $name);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":phone", $phone);
		$sql->bindValue(":stars", $stars);
		$sql->bindValue(":internal_obs", $internal_obs);
		$sql->bindValue(":address_zipcode", $address_zipcode);
		$sql->bindValue(":address", $address);
		$sql->bindValue(":address_number", $address_number);
		$sql->bindValue(":address2", $address2);
		$sql->bindValue(":address_neighb", $address_neighb);
		$sql->bindValue(":address_city", $address_city);
		$sql->bindValue(":address_state", $address_state);
		$sql->bindValue(":address_country", $address_country);
		$sql->bindValue(":cpf_cnpj", $cpf_cnpj);
		$sql->bindValue(":inscri_estadual", $inscri_estadual);
		$sql->bindValue(":cod_supplier", '0');
		$sql->bindValue(":id_company", $id_company);

		$sql->execute();

		$id_supplier = $this->db->lastInsertId();

		$sql = $this->db->prepare("SELECT MAX(cod_supplier)+1 FROM supplier WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {

			$cod =  $sql->fetch();

			foreach ($cod as $cod_result) {


				$cod_supplier = $cod_result;

			} 

			$sqlu = $this->db->prepare("UPDATE supplier SET cod_supplier = $cod_supplier WHERE id = $id_supplier AND id_company = :id_company");
			$sqlu->bindValue(":id_company", $id_company);
			$sqlu->execute();
		}




	}
	public function edit($id, $id_company, $name, $email, $phone, $stars,  $internal_obs, $address_zipcode, $address, $address_number,  $address2, $address_neighb,  $address_city, $address_state, $address_country, $cpf_cnpj, $inscri_estadual){

		$sql = $this->db->prepare("UPDATE supplier SET id_company = :id_company, name = :name, email = :email, phone = :phone, stars = :stars, internal_obs = :internal_obs, address_zipcode = :address_zipcode, address = :address, address_number = :address_number, address2 = :address2, address_neighb = :address_neighb, address_city = :address_city, address_state = :address_state, address_country = :address_country, cpf_cnpj = :cpf_cnpj, inscri_estadual = :inscri_estadual WHERE id = :id AND id_company = :id_company2");

		$sql->bindValue(":name", $name);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":phone", $phone);
		$sql->bindValue(":stars", $stars);
		$sql->bindValue(":internal_obs", $internal_obs);
		$sql->bindValue(":address_zipcode", $address_zipcode);
		$sql->bindValue(":address", $address);
		$sql->bindValue(":address_number", $address_number);
		$sql->bindValue(":address2", $address2);
		$sql->bindValue(":address_neighb", $address_neighb);
		$sql->bindValue(":address_city", $address_city);
		$sql->bindValue(":address_state", $address_state);
		$sql->bindValue(":address_country", $address_country);
		$sql->bindValue(":cpf_cnpj", $cpf_cnpj);
		$sql->bindValue(":inscri_estadual", $inscri_estadual);
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company2", $id_company);
		$sql->execute();
	}

	public function del($id, $id_company){

		$sql = $this->db->prepare("DELETE FROM supplier WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

	}

	public function search_clientsByName($name, $id_company){

		$array = array();
		$sql = $this->db->prepare("SELECT name, id FROM supplier WHERE name LIKE :name LIMIT 10");
		$sql->bindValue(':name','%'.$name.'%');
		$sql->execute();
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;

	}
}
