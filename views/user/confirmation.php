<div id="confirmation">
	<p class="se_connecter"><a href="<?=WEBROOT?>user/connexion">Se connecter</a></p>
	<p class="se_connecter se_connecter_top">
		<?php  
			if(isset($error) && !empty($error)){
				echo $error;
			}
			if(isset($valid) && !empty($valid)){
				echo $valid;
			}
		?>
	</p>
</div>
