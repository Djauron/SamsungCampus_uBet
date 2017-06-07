<?php	

$header = "MIME-Version: 1.0\r\n";
$header.= 'From:"u_bet"<sinan.epitech@gmail.com>'."\n";
$header.= 'Content-Type:text/html; charset="utf-8"'."\n";
$header.= 'Content-Transfer-Encoding: 8bit';

$message='
<html>
	<body>
		<div align="center">
			<a href="http://207.154.207.98/B.E.T/user/confirmation/'.$pseudo.'/'.$token.'"> Confimez votre compte </a>
		</div>
	</body>
</html>		
';	

mail($mail, "Confimation de compte", $message, $header);


?>