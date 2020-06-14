<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="sqr container" >
		<form method="post" class="form-group" action="/adm/servicos/send/" enctype="multipart/form-data">

			<br><br><h1 class="container">Adicionar Post</h1>

			<div class="container">
				<label for="titulo">Titulo</label>
			    <input type="text" class="form-control" id="titulo" name="titulo" ><br>

			    <label for="subtitulo">Subtitulo</label>
			    <input type="text" class="form-control" id="subtitulo" name="subtitulo" ><br>

				 <label for="p1">Parágrafo 1</label>
			    <textarea placeholder="Digite um texto breve" class="form-control" id="p1" name="p1"></textarea> <br>

			    <label for="p2">Parágrafo 2</label>
			    <textarea class="form-control" id="p2" name="p2"></textarea> <br>

			    <input type="file" name="dirfoto" required="required"><br><br>

			    <div>
			   		<input type="submit" name="enviar" class="btn btn-success" value="Enviar">
			   		<a href="/adm/logout/" class="btn btn-fail">Sair</a>

			    </div><br>

			    <?php if( $msg != '' ){ ?>
	   			<div class="alert alert-success" role="alert">
				  <?php echo htmlspecialchars( $msg, ENT_COMPAT, 'UTF-8', FALSE ); ?>
				</div> <br><br>
				<?php } ?>

			<br><br>

		</form>



			    <center><label style="font-size: 30px; color: #FFF"><strong>EDITAR</strong></label></center><br><br>

			    <div class="container">
				 	<div class="row">
				 	
					 	<?php $counter1=-1;  if( isset($result) && ( is_array($result) || $result instanceof Traversable ) && sizeof($result) ) foreach( $result as $key1 => $value1 ){ $counter1++; ?>

					  	<div class="col-md-4 col-sm-2">

					  		<div class="square container">
						  		<center><label class=""><strong><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></label><br>

						  		<a href="/adm/servicos/update/<?php echo htmlspecialchars( $value1["ID"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/"><img src="<?php echo htmlspecialchars( $value1["dirfoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="imagem" id="homeserv" alt="logotipo"></a><br>

						  		<p class="servicos"><?php echo htmlspecialchars( $value1["p1"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></center>

					  		</div><br>
					  		
					  	</div>
						<?php } ?>
				
				  	</div><br>
				</div>

			</div>


		
	</div>