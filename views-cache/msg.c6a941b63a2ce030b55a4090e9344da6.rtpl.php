<?php if(!class_exists('Rain\Tpl')){exit;}?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../lib/bootstrap/css/bootstrap.min.css">
	<script src="https://kit.fontawesome.com/b88754c2b4.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="css/imprimais.css">
	
</head>
<body>

	<div class="camp container">

		<h1>Imprimais</h1>

		<br><br>
		<label id="nome">Dados do remetente:</label> <br>
		<label id="nome">Nome: <?php echo htmlspecialchars( $nome, ENT_COMPAT, 'UTF-8', FALSE ); ?></label> <br>
		<label id="email">E-mail: <?php echo htmlspecialchars( $email, ENT_COMPAT, 'UTF-8', FALSE ); ?></label><br>
		<label id="tel">Tel.: <?php echo htmlspecialchars( $tel, ENT_COMPAT, 'UTF-8', FALSE ); ?></label><br>
		<label>Mensagem:</label><br>
		<p id="msg"><?php echo htmlspecialchars( $mensagem, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
		<br><br>

	</div>

	<script src="../lib/jquery/jquery.min.js"></script>
	<script src="../lib/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>

<style type="text/css">

h1{
	font-size: 40px;
	position: relative;

}

label{
	font-size: 16px;
}

.camp{
	background-color: #666;
	border-radius: 6px;
	color: #FFF;
}

#logo1{

	margin-top: 30px;
	width: 90px;
}
</style>


