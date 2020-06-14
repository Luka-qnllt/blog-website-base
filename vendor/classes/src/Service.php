<?php 

namespace NS;

use NS\Sql;

class Service
{
	public const SUCCESS = 'SUCESSO';

	public static function setService($title, $subtitle, $dirfoto, $p1, $p2)
	{
		$sql = new Sql();

		$sql-> select("INSERT INTO tb_services (title, subtitle, dirfoto, p1, p2) 
						VALUES (:title, :subtitle, :dirfoto, :p1, :p2);", 
						array(
							':title' => $title,
							':subtitle' => $subtitle,
							':dirfoto' => $dirfoto,
							':p1' => $p1,
							':p2' => $p2
						));
		
	}



	public static function getServiceByID($ID)
	{
		$sql = new Sql();

		$result = array();

		$result = $sql->select("SELECT * FROM tb_services WHERE ID = :ID;", [
			':ID'=>$ID
		]);

		return ($result[0]);
	}

	public static function getService($title)
	{
		$sql = new Sql();

		$result = array();

		$result = $sql->select("SELECT * FROM tb_services WHERE title = :title;", [
			':title'=>$title
		]);

		return ($result[0]);
	}

	public static function delete($ID)
	{
		$sql = new Sql();

		$sql->select("DELETE FROM tb_services WHERE ID = :ID;", [
			':ID'=>$ID
		]);
	}

	public static function listAll($limit = false)
	{
		$sql = new Sql();

		if ($limit === false) {

			$results = $sql->select("SELECT * FROM tb_services ORDER BY ID DESC;");
			
		} else if ($limit === true) {

			$results = $sql->select("SELECT * FROM tb_services ORDER BY ID DESC LIMIT 4");

		}

		return $results;
	}

	public static function updateService($ID, $newtitle, $subtitle, $dirfoto, $p1, $p2)
	{
		$sql = new Sql();

		$sql-> select("UPDATE tb_services SET title = :newtitle, subtitle = :subtitle, dirfoto = :dirfoto, p1 = :p1, p2 = :p2  WHERE ID = :ID;", 
						array(
							':ID' => $ID,
							':newtitle' => $newtitle,
							':subtitle' => $subtitle,
							':dirfoto' => $dirfoto,
							':p1' => $p1,
							':p2' => $p2
						));

	}

	public static function setSuccess($msg)
	{

		$_SESSION[Service::SUCCESS] = $msg;

	}

	public static function getSuccess()
	{

		$msg = (isset($_SESSION[Service::SUCCESS]) && $_SESSION[Service::SUCCESS]) ? $_SESSION[Service::SUCCESS] : '';

		Service::clearSuccess();

		return $msg;

	}

	public static function clearSuccess()
	{

		$_SESSION[Service::SUCCESS] = NULL;

	}
}



 ?>