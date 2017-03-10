<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>U_BET</title>
	<script src="<?=WEBROOT ?>assets/js/jquery.js"></script>
	<link href="<?=WEBROOT ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=WEBROOT ?>assets/css/style.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 col-sm-3 sidebar2">
				<div class="logo text-center">
					<img src="<?=WEBROOT ?>assets/images/logo.png" class="img-responsive center-block" alt="Logo">
					<div class="coins">
						<i class="fa fa-dollar" aria-hidden="true"></i>
					</div>
					<p class="coins">Nombre de jetons : 2,342</p>
					<div>
						<button type="button" class="btn btn-default Add-friend">
							<i class="fa fa-rocket" aria-hidden="true"></i> Acheter des jetons !
						</button>
					</div>
				</div>
				<br>
				<div class="left-navigation">
					<ul class="list">
						<li><i class="fa fa-safari" aria-hidden="true"></i><a href="home">Home</a></li>
						<li><i class="fa fa-thumbs-up" aria-hidden="true"></i>Profile</li>
						<?php if($admin == 1)
						{?>
							<li><i class="fa fa-hand-o-right" aria-hidden="true"></i><a href="admin">Admin</a></li>
						<?php } ?>
					</ul>
				</div>
			</div>

			<div class="col-md-10 col-sm-10 droite">
				<?php echo $content_for_layout; ?>
			</div>
		</div>
	</div>
</body>
</html>