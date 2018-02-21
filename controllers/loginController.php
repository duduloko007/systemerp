<?php 

class loginController extends controller {

	public function index(){
		$data = array();

		if (isset($_POST['user']) && !empty($_POST['user'])) {
			$user = addslashes($_POST['user']);
			$pass = addslashes($_POST['password']);

			$u = new Users();

			if ($u->doLogin($user, $pass)) {
				header("Location:".BASE_URL);
			} else {
				$data['error'] = 'E-mail e/ou senha errados.';
				
			}
		}

			$this->loadView('login', $data);
		}

		public function logout(){
			$u = new Users();
			$u->setLoggedUser();
			$u->logout();
			header("Location:".BASE_URL);
	
		}
}
