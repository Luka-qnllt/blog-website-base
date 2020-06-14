<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="sqr container" >

		<form method="POST" class="form-group" action="/adm/servicos/update/<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" enctype="multipart/form-data" >

			<br><br><h1 class="container">Editar Post "<?php echo htmlspecialchars( $titulo, ENT_COMPAT, 'UTF-8', FALSE ); ?>"</h1>

			<div class="container">

			    <input type="hidden" class="form-control " id="ID" name="ID" value="<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>" readonly="readonly"><br>

				<label for="novotitulo">Novo Titulo</label>
			    <input type="text" class="form-control" id="novotitulo" name="novotitulo" value="<?php echo htmlspecialchars( $titulo, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><br>

			    <label for="subtitulo">Novo Subtitulo</label>
			    <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="<?php echo htmlspecialchars( $subtitulo, ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><br>

				 <label for="p1">Novo Parágrafo 1</label>
			    <textarea class="form-control" id="p1" name="p1"><?php echo htmlspecialchars( $p1, ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea> <br>

			    <label for="p2">Novo Parágrafo 2</label>
			    <textarea class="form-control" id="p2" name="p2"><?php echo htmlspecialchars( $p2, ENT_COMPAT, 'UTF-8', FALSE ); ?></textarea> <br>

			    <input type="file" name="dirfoto" value="<?php echo htmlspecialchars( $dirfoto, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><br><br>

			    <img style="width: 150px " src="<?php echo htmlspecialchars( $dirfoto, ENT_COMPAT, 'UTF-8', FALSE ); ?>"> <input type="hidden" name="dirfotoorig" readonly="readonly" value="<?php echo htmlspecialchars( $dirfoto, ENT_COMPAT, 'UTF-8', FALSE ); ?>"><br><br>
			    <div>
			   		<input type="submit" name="enviar" class="btn btn-success" value="Enviar">

			   	<a method="POST" class="btn btn-danger" href="/adm/servicos/delete/<?php echo htmlspecialchars( $ID, ENT_COMPAT, 'UTF-8', FALSE ); ?>">Deletar</a>
			   	
			    </div><br><br>

			   

			</div>

		</form>
	</div>

