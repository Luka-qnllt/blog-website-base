<?php if(!class_exists('Rain\Tpl')){exit;}?>

<div class="container">
	<h1><?php echo htmlspecialchars( $nome, ENT_COMPAT, 'UTF-8', FALSE ); ?></h1>
	<h2><?php echo htmlspecialchars( $email, ENT_COMPAT, 'UTF-8', FALSE ); ?></h2>
	<h3><?php echo htmlspecialchars( $tel, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
	<p><?php echo htmlspecialchars( $mensagem, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
</div>