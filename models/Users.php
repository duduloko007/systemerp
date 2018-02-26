<?php 

class users extends model {

	private $userInfo;
	private $permissions;

	public function isLogged(){

		if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){

			return true;

		} else{
			
			return false;
		}
	}

	public function doLogin($user, $password){

		$sql = $this->db->prepare("SELECT * FROM users WHERE user = :user AND password = :password AND status = :status");

		$sql->bindValue(':user', $user);
		$sql->bindValue(':password', md5($password));
		$sql->bindValue(':status', '0');
		$sql->execute();

		if ($sql->rowCount() > 0) {

			$row = $sql->fetch();

			$_SESSION['ccUser'] = $row['id'];

			return true;
		} else{
			return false; 
		}
	}

	public function setLoggedUser(){
		
		if(isset($_SESSION['ccUser']) && !empty($_SESSION['ccUser'])){

			$id = $_SESSION['ccUser'];

			$sql = $this->db->prepare("SELECT * FROM users WHERE id = :id");
			$sql->bindValue(':id', $id);
			$sql->execute();

			if ($sql->rowCount() > 0) {
				
				$this->userInfo = $sql->fetch();
				$this->permissions = new permissions();
				$this->permissions->setGroup($this->userInfo['id_group'], $this->userInfo['id_company']);
			}
		}

	}
	public function getCompany(){
		if (isset($this->userInfo['id_company'])) {

			return $this->userInfo['id_company'];

		} else{
			return 0;
		}
	}

	public function getEmail(){
		if (isset($this->userInfo['email'])) {

			return $this->userInfo['email'];

		} else{
			return 0;
		}
	}

	public function getNameUser(){
		if (isset($this->userInfo['name_user'])) {

			return $this->userInfo['name_user'];

		} else{
			return 0;
		}
	}

	public function getId(){
		if (isset($this->userInfo['id'])) {

			return $this->userInfo['id'];

		} else{
			return 0;
		}
	}

	public function getInfo($id, $id_company){
		$array = array();
		$sql = $this->db->prepare("SELECT * FROM users WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}
		return $array;
	}
	public function getPer($id_company, $id){

		$array = array();
		$sql = $this->db->prepare("SELECT permission_groups.name FROM users LEFT JOIN permission_groups ON permission_groups.id = users.id_group WHERE users.id_company = :id_company AND users.id = :id");
		$sql->bindValue(":id_company", $id_company);
		$sql->bindValue(":id", $id);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			
			 $array = $sql->fetchAll();

		}
		return $array;
	}

	public function logout(){
		unset($_SESSION['ccUser']);
		session_destroy();
	}

	public function hasPermission($name){
		return $this->permissions->hasPermission($name);
	}

	// Deletar o grupo de Permissões do Usuario
	public function findUserInGroup($id){

		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE id_group = :id_group");
		$sql->bindValue("id_group", $id);
		$sql->execute();
		$row = $sql->fetch();
		if ($row['c'] == '0') {
			return false;
		} else{
			return true;
		}
	}

	public function getList($id_company){

		$array = array();
		$sql = $this->db->prepare("SELECT 
			users.id, 
			users.email,
			users.user,
			users.status,
			users.name_user,
			permission_groups.name 
			FROM users 
			LEFT JOIN permission_groups ON permission_groups.id = users.id_group
			WHERE users.id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			
			$array = $sql->fetchAll();
		}
		return $array;
	}

	public function add($email, $user, $pass, $group, $name, $id_company){

		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM users WHERE user = :user");
		$sql->bindValue(":user",$user);
		$sql->execute();
		$row = $sql->fetch();

		if ($row['c'] == '0') {
			
			$sql = $this->db->prepare("INSERT INTO users SET email = :email, user = :user, password = :password, id_group = :id_group, name_user = :name, id_company = :id_company, status = :status");
			$sql->bindValue(":email",$email);
			$sql->bindValue(":user",$user);
			$sql->bindValue(":password",md5($pass));
			$sql->bindValue(":id_group",$group);
			$sql->bindValue(":name",$name);
			$sql->bindValue(":id_company",$id_company);
			$sql->bindValue(":status", '0');
			$sql->execute();

			

			return '1';

		} else {
			return '0';
		}
	}

	public function edit($email, $pass, $group, $id, $name, $user, $status, $id_company){


		$sql = $this->db->prepare("UPDATE users SET email = :email, id_group = :id_group, name_user = :name, status= :status WHERE id =:id AND id_company = :id_company");
		$sql->bindValue(":email",$email);
		$sql->bindValue(":id_group",$group);
		$sql->bindValue(":name",$name);
		$sql->bindValue(":status",$status);
		$sql->bindValue(":id",$id);
		$sql->bindValue(":id_company",$id_company);
		$sql->execute();


		if (!empty($user)) {
			$sql = $this->db->prepare("UPDATE users SET user = :user WHERE id =:id AND id_company = :id_company");
			$sql->bindValue(":user",$user);
			$sql->bindValue(":id",$id);
			$sql->bindValue(":id_company",$id_company);
			$sql->execute();	
		}
		if (!empty($pass)) {
			$sql = $this->db->prepare("UPDATE users SET password = :password WHERE id =:id AND id_company = :id_company");
			$sql->bindValue(":password",md5($pass));
			$sql->bindValue(":id",$id);
			$sql->bindValue(":id_company",$id_company);
			$sql->execute();
		}
	}

	public function delete($id, $id_company){

		$sql = $this->db->prepare("DELETE FROM users WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id",$id);
		$sql->bindValue(":id_company",$id_company);
		$sql->execute();
	}
}