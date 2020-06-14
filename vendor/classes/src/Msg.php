<?php 

namespace NS;

class Msg{

public function getmsg(){

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$tel = $_POST['telefone'];
	$mensagem = $_POST['msg'];

	$data = [
		'nome'=> $nome,
		'email'=> $email,
		'tel'=> $tel,
		'menssagem'=> $mensagem
	];
	
	return $data;
	//var_dump($data);
	//exit;

}


}

 ?>