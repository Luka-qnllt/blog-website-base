<?php if(!class_exists('Rain\Tpl')){exit;}?><div id="divhr"></div>
<div id="banner"></div> <br>
<hr>
	<br><center><strong><label style="font-size: 30px; color: #222222">Sobre Nós</label></strong></center><br>

	<div class="home container row">
		
		<div class="col-lg-12">
			<div class="row">
				<div class="col-6">
					<img src="<?php echo htmlspecialchars( $img, ENT_COMPAT, 'UTF-8', FALSE ); ?>" style="width: 200px; height: 200px; margin-top: -40px">
				</div>
				<div class="col-6">
					<p><?php echo htmlspecialchars( $p1, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
				</div>
					<p><?php echo htmlspecialchars( $p2, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
					<p><?php echo htmlspecialchars( $p3, ENT_COMPAT, 'UTF-8', FALSE ); ?></p><br><br>
				</div>
			</div>
		</div>

	<hr>

	<div class="cont">

			<br><center><strong><label style="font-size: 30px; color: #222222">Alguns Serviços</label></strong></center><br>

	  <div class="container">
	 	<div class="row">
	 	
		 	<?php $counter1=-1;  if( isset($result) && ( is_array($result) || $result instanceof Traversable ) && sizeof($result) ) foreach( $result as $key1 => $value1 ){ $counter1++; ?>

		  	<div class="col-md-3 col-sm-6">

		  		<div class="square container">
			  		<center><label class=""><strong><?php echo htmlspecialchars( $value1["title"], ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></label><br>
			  		<a href="/servicos/<?php echo htmlspecialchars( $value1["ID"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/"><img src="<?php echo htmlspecialchars( $value1["dirfoto"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="imagem" id="homeserv" alt="logotipo"></a><br>

			  		<p class="servicos"><?php echo htmlspecialchars( $value1["p1"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></center>
		  		</div><br>
		  		
		  	</div>
			<?php } ?>
	
	  	</div>
	  </div><br><br>

	</div> <hr><!-- end container -->
