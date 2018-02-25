<?php 
class Permissions extends model{

	private $group;
	private $permissions;

	//Setar o grupo de Permissão
	public function setGroup($id, $id_company){
		$this->group = $id;
		$this->permissions = array();

		$sql = $this->db->prepare("SELECT params FROM permission_groups WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$row = $sql->fetch();

			if (empty($row['params'])) {
			$row['params'] = '0';
			}

			$params = $row['params'];

			$sql = $this->db->prepare("SELECT name FROM permission_params WHERE id IN($params)");
			$sql->execute();

			if ($sql->rowCount() > 0) {
				foreach ($sql->fetchAll() as $item) {
					$this->permissions[] = $item['name'];
				}
			}
		}
	}

	// Confirmar a Permissão
	public function hasPermission($name){
		if (in_array($name, $this->permissions)) {
			return true;
		} else{
			return false;
		}
	}

	//Listar as Permissões
	public function getList(){
		$array  = array();

		$sql = $this->db->prepare("SELECT * FROM permission_params");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}
	// Listar os grupos de Permissões
	public function getGroupList($id_company){

		$array = array();

		$sql  = $this->db->prepare("SELECT * FROM permission_groups WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

			if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;

	}

	public function getGroup($id, $id_company){

		$array = array();

		$sql  = $this->db->prepare("SELECT * FROM permission_groups WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

			if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
			$array['params'] = explode(',', $array['params']);
		}

		return $array;
	}

	//Adicionar uma Nova Permissão
	public function add($name, $id_company){

		$sql = $this->db->prepare("INSERT INTO permission_params SET name = :name");

		$sql->bindValue(":name", $name);
		$sql->execute();
	}
	//Deletar uma permissão
	public function delete($id){

		$sql = $this->db->prepare("DELETE FROM permission_params WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

	// Adicionar um novo Grupo de Permissões 
	public function addGroup($name, $plist, $id_company){
		$params = implode(',', $plist);

		$sql = $this->db->prepare("INSERT INTO permission_groups SET name = :name, id_company = :id_company, params = :params");

		$sql->bindValue(":name", $name);
		$sql->bindValue(":params", $params);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

	}

	// Deletar Grupo
	public function deleteGroup($id){

		$u = new Users();

		if ($u->findUserInGroup($id) == false)  {
			$sql = $this->db->prepare("DELETE FROM permission_groups WHERE id = :id");
		$sql->bindValue(":id", $id);
		$sql->execute();

		}
	}

	// Editar Grupo
		public function editGroup($name, $plist, $id, $id_company){
		$params = implode(',', $plist);
		$sql = $this->db->prepare("UPDATE permission_groups SET name = :name, id_company = :id_company, params = :params WHERE id = :id");

		$sql->bindValue(":name", $name);
		$sql->bindValue(":id_company", $id_company);
		$sql->bindValue(":params", $params);
		$sql->bindValue(":id", $id);
		$sql->execute();
	}

}


	
