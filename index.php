<?php 

require_once("vendor/autoload.php");
session_start();

use NS\Page;
use NS\PageAdmin;
use Slim\Slim;
use NS\Mailer;
use NS\Service;
use NS\User;

$app = new Slim();

$app -> config('debug', true);

$app->get("/", function(){

	$page = new Page();

	$img = "/views/img/imprimais.logo.png";
	$p1 = "P1 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";
	$p2 = "P2 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

	$p3 = "P3 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

	$result = Service::listAll(true);

	$page -> setTpl("index", [
							'img' => $img,
							'p1' => $p1,
							'p2' => $p2,
							'p3' => $p3,
							'result' => $result
	]);

});

//------------------ contato -----------------------------

$app->get("/contato/", function(){

 	$_SESSION['msg'] = ' ';

	$page = new Page();

	$msg = Service::getSuccess('Mensagem enviada com secesso!');
	
	$page -> setTpl("contato",[ 'msg'=> $_SESSION['msg'] ]);


	
});

//-------------------- contato send ------------------------

$app->post("/contato/send/", function(){

	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$tel = $_POST['telefone'];
	$mensagem = $_POST['msg'];

	$mailer = new Mailer();

	$mailer -> enviar( array( 
		"nome" => $nome,
		"email" => $email,
		"tel" => $tel,
		"mensagem" => $mensagem,
	));

	$mailer->send();

	header("Location: /contato/");
	exit;

});


// ------------------------- tamplates ----------------------

$app->get("/servicos/:ID/", function($ID){

	$page = new Page();

	$dados = Service::getServiceByID($ID);

	$result = Service::listAll();

	$page -> setTpl("servicos", ['ID' => $dados['ID'],
								'img' => $dados['dirfoto'],
								'titulo' => $dados['title'],
								'subtitulo' => $dados['subtitle'],
								'desc' => $dados['p2'],
								'result' => $result
		]);

});

$app->get("/servicos/", function(){

	$page = new Page();

	$result = Service::listAll();

	$ID = $result[0]["ID"];

	$dados = Service::getServiceByID($ID);

	$page -> setTpl("servicos", ['ID' => $dados['ID'],
								'img' => $dados['dirfoto'],
								'titulo' => $dados['title'],
								'subtitulo' => $dados['subtitle'],
								'desc' => $dados['p2'],
								'result' => $result
		]);

});


//------------------ ADM LOGIN -----------------------------------

$app->get("/adm/login/", function(){

	$page = new PageAdmin([
		'header'=>false,
		'footer'=>false
	]);

	$page->setTpl("login");

});

$app->post("/adm/login/", function(){

	User::login($_POST["login"], $_POST["password"]);

	header("location: /adm/servicos/");

	exit;

});

//----------- LOGOUT ----------------------------
$app->get("/adm/logout/", function(){

	User::verifyLogin();

	User::logout();

	header("location: /adm/login/");

	exit;

});


//-------------------- ADM SERVICES UPDATE ------------------------
$app->get("/adm/servicos/update/:ID/", function($ID){

	User::verifyLogin();

	$dados = Service::getServiceByID($ID);

	$page = new Page();

	$page -> setTpl("adm-services-update", ['dirfoto' => $dados['dirfoto'],
								'titulo' => $dados['title'],
								'subtitulo' => $dados['subtitle'],
								'p1' => $dados['p1'],
								'p2' => $dados['p2'],
								'ID' => $dados['ID']
		]);

});

// ---------------- ADM SERVICES SEND UPDATE -------------------
$app->post("/adm/servicos/update/:ID", function($ID){

	User::verifyLogin();

	$novotitulo = $_POST['novotitulo'];
	$titulo = $_POST['novotitulo'];
	$subtitulo = $_POST['subtitulo'];
	$p1 = $_POST['p1'];
	$p2 = $_POST['p2'];
	$ID = $_POST['ID'];

	if (isset($_FILES['dirfoto']) && $_FILES['dirfoto']['name'] > "") {
		
		$ext =  strtolower( substr($_FILES['dirfoto']['name'], -4) );
		$novo_nome = md5(time()) . $ext;
		$diretorio = "fotosservicos/";

		move_uploaded_file($_FILES['dirfoto']['tmp_name'], $diretorio.$novo_nome);

		$dirfoto = "/".$diretorio.$novo_nome;
	} else {

		$ext =  strtolower( substr($_FILES['dirfoto']['name'], -4) );
		$dirfoto = $_POST['dirfotoorig'] . $ext;
	}


	Service::updateService($ID, $novotitulo, $subtitulo, $dirfoto, $p1, $p2);

	header("Location: /adm/servicos/");
	exit;
});


//------------------ ADM SEERVICE DELETE -----------------

$app->get("/adm/servicos/delete/:ID", function($ID){

	User::verifyLogin();

	Service::delete($ID);

	header("Location: /adm/servicos/");
	exit;
});


// ---------------- ADM SERVICES SEND -------------------
$app->post("/adm/servicos/send/", function(){

	User::verifyLogin();

	$titulo = $_POST['titulo'];
	$subtitulo = $_POST['subtitulo'];
	$p1 = $_POST['p1'];
	$p2 = $_POST['p2'];

	if (isset($_FILES['dirfoto'])) {
		
		$ext =  strtolower( substr($_FILES['dirfoto']['name'], -4) );
		$novo_nome = md5(time()) . $ext;
		$diretorio = "fotosservicos/";

		move_uploaded_file($_FILES['dirfoto']['tmp_name'], $diretorio.$novo_nome);
	} 

	$dirfoto = "/".$diretorio.$novo_nome;

	Service::setService($titulo, $subtitulo, $dirfoto, $p1, $p2);

	$_SESSION['msg'] = "Post criado com Sucesso!";

	header("Location: /adm/servicos/");
	exit;
});

//-------------------- ADM SERVICES ------------------------
$app->get("/adm/servicos/", function(){

	User::verifyLogin();

	$page = new Page();

	$result = Service::listAll();

	$msg = $_SESSION['msg'];

	$page -> setTpl("adm-services", ['result' => $result,
									 'msg' => $msg]);

	$_SESSION['msg'] = '';
});




$app->run();

 ?>