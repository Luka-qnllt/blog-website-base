<?php if(!class_exists('Rain\Tpl')){exit;}?>	<div class="sqr container" >
		<form method="POST" class="form-group" action="/contato/send/" >

			<br>
			<br><h1 class="container">Nos envie uma mensagem</h1>

			<div class="container">
				<label for="nome">Nome</label>
			    <input type="text" class="form-control" id="nome" name="nome" ><br>

			    <label for="emailmsg">Email</label>
			    <input type="email" class="form-control" id="emailmsg" name="email" ><br>

				<label for="telefone">Telefone</label>
			    <input type="text" class="form-control" id="telefone" name="telefone"><br>

			    <label for="msg">Mensagem</label>
			    <textarea class="form-control" id="msg" name="msg"></textarea> <br>

			    <div>
			   		<input type="submit" name="enviar" class="btn btn-success" value="Enviar">
			   		
			    	<small id="placeemail" class="form-text text-muted float-right">contato@imprimaisdigital.com</small><br><br>
			    </div>

			<?php if( $msg != '' ){ ?>
   			<div class="alert alert-success" role="alert">
			  <?php echo htmlspecialchars( $msg, ENT_COMPAT, 'UTF-8', FALSE ); ?>
			</div> <br><br>
			<?php } ?>
			</div>

		</form>
	</div>