<?php if(!class_exists('Rain\Tpl')){exit;}?>
<div class="sqr"><br>


	<div id="sld" class="carousel slide" data-ride="carousel">

		 <div class="carousel-inner">

		    <div class="carousel-item active" data-interval="5000">
		    	<div class="row">

		    		<div class="col-md-6 col-sm-6" id="sldimg">

				    	<label id="Ctitle"><strong><?php echo htmlspecialchars( $titulo, ENT_COMPAT, 'UTF-8', FALSE ); ?></strong></label><br>
				    	<label id="Csubtitle"><?php echo htmlspecialchars( $subtitulo, ENT_COMPAT, 'UTF-8', FALSE ); ?></label>

					    <div id="imagesservices">
					      	<img src="<?php echo htmlspecialchars( $img, ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="d-block w-100" alt="imagem 1">
				      	</div>

			      	</div>

		    		<div class="col-md-6">
			        	<p id="descrition"><?php echo htmlspecialchars( $desc, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
			        </div>
			    </div>
		    </div>

		 </div>
		

	<!--
	  <a class="carousel-control-prev" href="/servicos/<?php echo htmlspecialchars( $ID - 1, ENT_COMPAT, 'UTF-8', FALSE ); ?> " role="button" data-slide="prev" > 
	    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	    <span class="sr-only">Previous</span>
	  </a>
	  <a class="carousel-control-next" href="/servicos/<?php echo htmlspecialchars( $ID + 1, ENT_COMPAT, 'UTF-8', FALSE ); ?>" role="button" data-slide="next">
	    <span class="carousel-control-next-icon" aria-hidden="true"></span>
	    <span class="sr-only">Next</span>
	  </a>
	-->
	</div><br><br>

</div> <hr>

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
	
	  	</div><br><br>
	  </div>
