<body id="PageInscription">
<div id="signupbox" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="panel-title">Inscription</div>
			<div id="divsing">
				<a id="signinlink" href="connexion">Connexion</a>
			</div>
		</div>
		<div class="panel-body">

			<?php
			if(isset($error) && $error != "null")
			{?>
				<div id="pseudo-alert" class="alert alert-danger col-sm-12"><?php echo $error ?></div><?php
			}

			if(isset($valid) && $valid != "null")
			{?>
				<div id="pseudo-alert" class="alert alert-danger col-sm-12" style="background-color: green; color: white;"><?php echo $valid ?></div><?php 
			}?>

			<form id="signupform" class="form-horizontal" method="post">
				<div class="form-group">
					<label id="nom" class="col-md-3 control-label">Nom</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="nom" placeholder="Nom">
					</div>

				</div>
				<div class="form-group">
					<label id="prenom" class="col-md-3 control-label">Prenom</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="prenom" placeholder="Prenom">
					</div>
				</div>

				<div class="form-group">
					<label id="sexe" class="col-md-3 control-label">Sexe</label>
					<div class="col-md-9">
						<select name="sexe">
							<option value="">Selectinnez un sexe</option>
							<option value="homme">Homme</option>
							<option value="femme">Femme</option>
							<option value="autre">Autre...</option>
						</select>
					</div>
				</div>					

				<div class="form-group">
					<label id="date_naissance" class="col-md-3 control-label">Date de naissance</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="date_naissance" placeholder="AAAA-MM-JJ" pattern="(?:19|20)[0-9]{2}-(?:(?:0[1-9]|1[0-2])-(?:0[1-9]|1[0-9]|2[0-9])|(?:(?!02)(?:0[1-9]|1[0-2])-(?:30))|(?:(?:0[13578]|1[02])-31))">
					</div>
				</div>

				<div class="form-group">
					<label id="email" class="col-md-3 control-label">Email</label>
					<div class="col-md-9">
						<input type="email" class="form-control" name="email" placeholder="Adresse email">
					</div>
				</div>

				<div class="form-group">
					<label id="pseudo" class="col-md-3 control-label">pseudo</label>
					<div class="col-md-9">
						<input type="text" class="form-control" name="pseudo" placeholder="pseudo">
					</div>
				</div>           

				<div class="form-group">
					<label id="password" class="col-md-3 control-label">Mot de passe</label>
					<div class="col-md-9">
						<input type="password" class="form-control" name="mdp" placeholder="Mot de passe">
					</div>
				</div>

				<div class="form-group">
					<label id="remdp" class="col-md-3 control-label">Confirmation mot de passe</label>
					<div class="col-md-9">
						<input type="password" class="form-control" name="remdp" placeholder="Confirmation mot de passe">
					</div>
				</div>
				<div class="form-group">                   
					<div class="col-md-offset-3 col-md-9">
						<button id="btn-signup" type="submit" name="valid" class="btn btn-info"><i class="icon-hand-right"></i>S'inscrire</button>
					</div>
				</div>  
			</form>
		</div>
	</div>
</div>
</body>