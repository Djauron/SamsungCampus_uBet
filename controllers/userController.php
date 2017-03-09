<?php

class User extends Controller
{
	public function index()
	{
		if(isset($_SESSION['id']))
		{
			header("Location: user/home");
		}
		else
		{
			header("Location: user/inscription");
		}
	}

	public function inscription()
	{
		$modelsUser = $this->loadModel('Users');

		if(isset($_POST['valid']))
		{
			if($modelsUser->verifInscription($_POST['nom'],$_POST['prenom'],$_POST['date_naissance'],$_POST['email'],$_POST['pseudo'],$_POST['mdp'],$_POST['remdp'],$_POST['sexe']))
			{
			
				$infoUser = $modelsUser->readInfo("pseudo = ?", $tab = array($_POST['pseudo']));


				$this->envoiMail($infoUser['email'], $infoUser['pseudo'], $infoUser['token']);
			}
			
		}

		$data = array(
					'error'=>$modelsUser->getError(),
					'valid'=>$modelsUser->getValid());

		$this->render('inscription', $data);
	}

	public function connexion()
	{
		$modelsUser = $this->loadModel('Users');
		echo "1";
		if(!isset($_SESSION['pseudo']))
		{
			echo "2";
			if(isset($_POST['validerconnexion']))
			{
				echo "3";
			    $modelsUser->verifConnexion($_POST['pseudo'],$_POST['mdp']);
			    echo "4";
			}
		}

		$data = array(
			'error'=>$modelsUser->getError(),
			'valid'=>$modelsUser->getValid());


		$this->render('connexion', $data);

	}

	public function confirmation()
	{
		$modelsUser = $this->loadModel('Users');

		if(isset($_GET['p1'],$_GET['p2']) && !empty($_GET['p1']) && !empty($_GET['p2']))
		{

			$infouser = $modelsUser->requeteRecupKey($tab = array($_GET['p1'],$_GET['p2']));
			
			if($infouser == true)
			{
				if($infouser['confirme'] == 0)
				{
					$modelsUser->requeteConfirmKey($tab = array($_GET['p1']));
					$affiche = "Votre compte est maintenant Valide ! ";
				} 
				else
				{
					$affiche = "Utilisateur Deja Valide";
				}
			}
			else
			{	
				$affiche = "Utilisateur Inexistant !";
			}
			
			$data = array(
				'affiche'=>$affiche);

			$this->render('confirmation', $data);

		}
	}

	public function envoiMail($mail, $pseudo, $token)
	{
		$pseudo = htmlspecialchars($pseudo);

		$data = array(
			'mail'=>$mail,
			'pseudo'=>$pseudo,
			'token'=>$token);

		$this->render('email', $data);
	}
}

?>