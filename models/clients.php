<?php
class clients extends model{


	public function getList($offset, $id_company){

		$array = array();
		$sql = $this->db->prepare("SELECT * FROM clients WHERE id_company = :id_company LIMIT $offset, 10");
		$sql->bindValue(":id_company", $id_company);
		
		$sql->execute();
		
		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}
	public function getInfoSales($id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM clients WHERE  id_company = :id_company");

		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;

	}
	public function getInfo($id, $id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM clients WHERE id = :id AND id_company = :id_company");

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
		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM clients WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		$row = $sql->fetch();

		$r = $row['c'];

		return $r;
	}

/*
	public function add($id_company,$id_user, $name, $email = '', $phone = '',$phone_fix = '', $stars = '3',  $internal_obs = '', $address_zipcode = '', $address = '', $address_number = '',  $address2 = '', $address_neighb = '',  $address_city = '', $address_state = '', $address_country = '', $cpf_cnpj = '', $identidade = '', $state_registration= '', $person_type, $municipal_registration = '', $name_fantasy = '', $date_birth_fund = ''){

		$sql = $this->db->prepare("INSERT INTO clients SET id_company = :id_company,id_user = :id_user, name = :name, email = :email, phone = :phone, phone_fix = :phone_fix, stars = :stars, internal_obs = :internal_obs, address_zipcode = :address_zipcode, address = :address, address_number = :address_number, address2 = :address2, address_neighb = :address_neighb, address_city = :address_city, address_state = :address_state, address_country = :address_country, cpf_cnpj = :cpf_cnpj, identidade = :identidade, state_registration = :state_registration, person_type = :person_type, municipal_registration = :municipal_registration, name_fantasy = :name_fantasy, date_birth_fund = :date_birth_fund, date_register = NOW(), cod_client = :cod_client");

		$sql->bindValue(":name", $name);

		$sql->bindValue(":email", $email);

		$sql->bindValue(":phone", $phone);

		$sql->bindValue(":phone_fix", $phone_fix);

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

		$sql->bindValue(":identidade", $identidade);

		$sql->bindValue(":state_registration", $state_registration);

		$sql->bindValue(":person_type", $person_type);

		$sql->bindValue(":municipal_registration", $municipal_registration);

		$sql->bindValue(":name_fantasy", $name_fantasy);

		$sql->bindValue(":date_birth_fund", $date_birth_fund);

		$sql->bindValue(":cod_client", '0');

		$sql->bindValue(":id_company", $id_company);

		$sql->bindValue(":id_user", $id_user);

		$sql->execute();


		$id_client = $this->db->lastInsertId();

		$sql = $this->db->prepare("SELECT MAX(cod_client)+1 FROM clients WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {

			$cod =  $sql->fetch();

			foreach ($cod as $cod_result) {


				$cod_client = $cod_result;

			} 

			$sqlu = $this->db->prepare("UPDATE clients SET cod_client = $cod_client WHERE id = $id_client AND id_company = :id_company");
			$sqlu->bindValue(":id_company", $id_company);
			$sqlu->execute();
		}




		return '1';
	}*/

	public function add($id_company, $id_user,$person_type, $name = '', $email = '', $phone = '',$phone_fix = '', $stars = '3',  $internal_obs = '', $address_zipcode = '', $address = '', $address_number = '',  $address2 = '', $address_neighb = '',  $address_city = '', $address_state = '', $address_country = '', $cpf_cnpj = '', $identidade = '', $date_birth_fund = '', $name_fantasy = '', $state_registration = '', $municipal_registration = ''){

		$sql = $this->db->prepare("INSERT INTO clients SET id_company = :id_company, id_user = :id_user, person_type = :person_type, name = :name, email = :email, phone = :phone, phone_fix = :phone_fix, stars = :stars, internal_obs = :internal_obs, address_zipcode = :address_zipcode, address = :address, address_number = :address_number, address2 = :address2, address_neighb = :address_neighb, address_city = :address_city, address_state = :address_state, address_country = :address_country, cpf_cnpj = :cpf_cnpj, identidade = :identidade, date_birth_fund = :date_birth_fund,name_fantasy = :name_fantasy, state_registration = :state_registration, municipal_registration = :municipal_registration, cod_client = :cod_client, date_register = NOW() AND id_company = :id_company");

		$sql->bindValue(":person_type", $person_type);

		$sql->bindValue(":name", $name);

		$sql->bindValue(":email", $email);

		$sql->bindValue(":phone", $phone);

		$sql->bindValue(":phone_fix", $phone_fix);

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

		$sql->bindValue(":identidade", $identidade);

		$sql->bindValue(":cod_client", '0');

		$sql->bindValue(":date_birth_fund", $date_birth_fund);

		$sql->bindValue(":state_registration", $state_registration);

		$sql->bindValue(":municipal_registration", $municipal_registration);

		$sql->bindValue(":name_fantasy", $name_fantasy);

		$sql->bindValue(":id_company", $id_company);

		$sql->bindValue(":id_user", $id_user);
		$sql->execute();


		$id_client = $this->db->lastInsertId();

		$sql = $this->db->prepare("SELECT MAX(cod_client)+1 FROM clients WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {

			$cod =  $sql->fetch();

			foreach ($cod as $cod_result) {


				$cod_client = $cod_result;

			} 

			$sqlu = $this->db->prepare("UPDATE clients SET cod_client = $cod_client WHERE id = $id_client AND id_company = :id_company");
			$sqlu->bindValue(":id_company", $id_company);
			$sqlu->execute();
		}



	}


	public function add_legal($id_company, $id_user,$person_type, $name = '', $email = '', $phone = '',$phone_fix = '', $stars = '3',  $internal_obs = '', $address_zipcode = '', $address = '', $address_number = '',  $address2 = '', $address_neighb = '',  $address_city = '', $address_state = '', $address_country = '', $cpf_cnpj = '', $state_registration= '', $municipal_registration = '', $name_fantasy = '', $date_birth_fund = ''){

		$sql = $this->db->prepare("INSERT INTO clients SET id_company = :id_company, id_user = :id_user, person_type = :person_type, name = :name, email = :email, phone = :phone, phone_fix = :phone_fix, stars = :stars, internal_obs = :internal_obs, address_zipcode = :address_zipcode, address = :address, address_number = :address_number, address2 = :address2, address_neighb = :address_neighb, address_city = :address_city, address_state = :address_state, address_country = :address_country, cpf_cnpj = :cpf_cnpj, state_registration = :state_registration, municipal_registration = :municipal_registration, name_fantasy = :name_fantasy, date_birth_fund = :date_birth_fund, cod_client = :cod_client, date_register = NOW() AND id_company = :id_company");

		$sql->bindValue(":name", $name);

		$sql->bindValue(":person_type", $person_type);

		$sql->bindValue(":email", $email);

		$sql->bindValue(":phone", $phone);

		$sql->bindValue(":phone_fix", $phone_fix);

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

		$sql->bindValue(":state_registration", $state_registration);

		$sql->bindValue(":municipal_registration", $municipal_registration);

		$sql->bindValue(":name_fantasy", $name_fantasy);

		$sql->bindValue(":date_birth_fund", $date_birth_fund);

		$sql->bindValue(":cod_client", '0');

		$sql->bindValue(":id_company", $id_company);

		$sql->bindValue(":id_user", $id_user);

		$sql->execute();


		$id_client = $this->db->lastInsertId();

		$sql = $this->db->prepare("SELECT MAX(cod_client)+1 FROM clients WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {

			$cod =  $sql->fetch();

			foreach ($cod as $cod_result) {


				$cod_client = $cod_result;

			} 

			$sqlu = $this->db->prepare("UPDATE clients SET cod_client = $cod_client WHERE id = $id_client AND id_company = :id_company");
			$sqlu->bindValue(":id_company", $id_company);
			$sqlu->execute();
		}






	}

	public function edit($id, $id_company, $name = '', $email = '', $phone = '',$phone_fix = '', $stars = '3',  $internal_obs = '', $address_zipcode = '', $address = '', $address_number = '',  $address2 = '', $address_neighb = '',  $address_city = '', $address_state = '', $address_country = '', $cpf_cnpj = '', $state_registration= '', $municipal_registration = '', $name_fantasy = '', $date_birth_fund = ''){

		$sql = $this->db->prepare("UPDATE clients SET name = :name, email = :email, phone = :phone, phone_fix = :phone_fix, stars = :stars, internal_obs = :internal_obs, address_zipcode = :address_zipcode, address = :address, address_number = :address_number, address2 = :address2, address_neighb = :address_neighb, address_city = :address_city, address_state = :address_state, address_country = :address_country, cpf_cnpj = :cpf_cnpj, state_registration = :state_registration, municipal_registration = :municipal_registration, name_fantasy = :name_fantasy, date_birth_fund = :date_birth_fund WHERE id = :id AND id_company = :id_company2");

		$sql->bindValue(":name", $name);

		$sql->bindValue(":email", $email);

		$sql->bindValue(":phone", $phone);

		$sql->bindValue(":phone_fix", $phone_fix);

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

		$sql->bindValue(":identidade", $identidade);

		$sql->bindValue(":state_registration", $state_registration);

		$sql->bindValue(":municipal_registration", $municipal_registration);

		$sql->bindValue(":name_fantasy", $name_fantasy);

		$sql->bindValue(":id", $id);

		$sql->bindValue(":date_birth_fund", $date_birth_fund);

		$sql->bindValue(":id_company2", $id_company);

		$sql->execute();

		
	}



	public function edit_legal($id, $id_company, $name, $email = '', $phone = '',$phone_fix = '', $stars = '3',  $internal_obs = '', $address_zipcode = '', $address = '', $address_number = '',  $address2 = '', $address_neighb = '',  $address_city = '', $address_state = '', $address_country = '', $cpf_cnpj = '', $state_registration= '', $municipal_registration = '', $name_fantasy = '', $date_birth_fund = ''){

		$sql = $this->db->prepare("UPDATE clients SET name = :name, email = :email, phone = :phone, phone_fix = :phone_fix, stars = :stars, internal_obs = :internal_obs, address_zipcode = :address_zipcode, address = :address, address_number = :address_number, address2 = :address2, address_neighb = :address_neighb, address_city = :address_city, address_state = :address_state, address_country = :address_country, cpf_cnpj = :cpf_cnpj, state_registration = :state_registration, municipal_registration = :municipal_registration, name_fantasy = :name_fantasy, date_birth_fund = :date_birth_fund WHERE id = :id AND id_company = :id_company2");

		$sql->bindValue(":name", $name);

		$sql->bindValue(":email", $email);

		$sql->bindValue(":phone", $phone);

		$sql->bindValue(":phone_fix", $phone_fix);

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

		$sql->bindValue(":state_registration", $state_registration);

		$sql->bindValue(":municipal_registration", $municipal_registration);

		$sql->bindValue(":name_fantasy", $name_fantasy);

		$sql->bindValue(":date_birth_fund", $date_birth_fund);

		$sql->bindValue(":id", $id);

		$sql->bindValue(":id_company2", $id_company);

		$sql->execute();

	}

	public function search_clientsByName($name, $id_company){

		$array = array();

		$sql = $this->db->prepare("SELECT name, id FROM clients WHERE name LIKE :name LIMIT 10");
		$sql->bindValue(':name','%'.$name.'%');

		$sql->execute();


		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;

	}
}
