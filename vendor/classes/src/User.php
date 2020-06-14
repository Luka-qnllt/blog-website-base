<?php 

namespace NS;

use NS\Sql;
use NS\Model;

class User extends Model
{
	const SESSION = "User";
	const SECRET ="Imprimais_Secret";
	const SECRET_IV = "Imprimais_Secret_IV";
	const ERROR = "UserError";
	const ERROR_REGISTER  = "UserErrorRegister";
	const SUCCESS = "UserSucesss";

	public static function getFromSession()
	{

		$user = new User();

		if (isset($_SESSION[User::SESSION]) && (int)$_SESSION[User::SESSION]['iduser'] > 0) {

			$user->setData($_SESSION[User::SESSION]);

		}

		return $user;

	}
	
	public static function checkLogin()
	{
		if( !isset($_SESSION[User::SESSION])
			||
			!$_SESSION[User::SESSION]
			||
			!(int)$_SESSION[User::SESSION]["iduser"] > 0 ){

			return false;
		} else 

		{return true;}
	}

	public static function verifyLogin()
	{
		if(User::checkLogin() === false)
		{
			header("Location: /adm/login/");
			exit;
		}
	}

	public function login($login, $password)
	{
		$sql = new Sql();

		$results = $sql->select("SELECT * FROM tb_users WHERE login = :login", [':login' => $login]);

		if(count($results) === 0)
		{
			throw new Exception("Usuário ou Senha inválida.");
			
		}

		$data = $results[0];

		if(password_verify($password, $data['password']) === true)

		{
			$user = new User();

			$user->setData($data);

			$_SESSION[User::SESSION] = $user->getValues();

			return $user;
		} else {
			throw new \Exception("Usuário inexistente ou senha inválida.");
		}
	}

	
	public static function logout()
	{
		$_SESSION[User::SESSION] = NULL;
	}

	public function cadastrar($login, $password){

		$sql = new Sql();

		$hash = password_hash($password, PASSWORD_DEFAULT, ['cost'=>12]);

		$sql->select("INSERT INTO tb_users (login, password) VALUES (:login, :hash)",['login'=>$login, 'hash'=>$hash]);
	}


}

 ?>