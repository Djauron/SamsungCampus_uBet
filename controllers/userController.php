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


//DEBUT INSCRIPTION
	public function inscription()
	{
		$modelsUser = $this->loadModel('Users');

		if(!isset($_SESSION['pseudo']))
		{
			if(isset($_POST['valid']))
			{
				if($modelsUser->verifInscription($_POST['nom'],$_POST['prenom'],$_POST['date_naissance'],$_POST['email'],$_POST['pseudo'],$_POST['mdp'],$_POST['remdp'],$_POST['sexe']))
				{
				
					$infoUser = $modelsUser->readInfo("pseudo = ?", $tab = array($_POST['pseudo']));
					$this->envoiMail($infoUser['email'], $infoUser['pseudo'], $infoUser['token']);
				}
			}
		}
		else
		{
			header("Location: home");
		}

		$data = array(
				'error'=>$modelsUser->getError(),
				'valid'=>$modelsUser->getValid());

		$this->render('inscription', $data);
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

	public function confirmation()
	{
		$modelsUser = $this->loadModel('Users');

		if(!isset($_SESSION['pseudo']))
		{
			if(isset($_GET['p1'],$_GET['p2']) && !empty($_GET['p1']) && !empty($_GET['p2']))
			{
				$modelsUser->verifMail($_GET['p1'], $_GET['p2']);
			}
		}
		$data = array(
				'error'=>$modelsUser->getError(),
				'valid'=>$modelsUser->getValid());

		$this->render('confirmation', $data);
	}

// FIN INSCRIPTION
// DEBUT CONNEXION

	public function connexion()
	{
		$modelsUser = $this->loadModel('Users');
		
		if(!isset($_SESSION['pseudo']))
		{
			if(isset($_POST['validerconnexion']))
			{
			    $log = $modelsUser->verifConnexion($_POST['pseudo'],$_POST['mdp']);
			}
		}
		else
		{
			header("Location: home");
		}

		$data = array(
				'error'=>$modelsUser->getError(),
				'valid'=>$modelsUser->getValid());

		$this->render('connexion', $data);

	}

// FIN CONNEXION
// PAGE HOME PRINCIPALE

	public function home()
	{
		$modelsUser = $this->loadModel('Users');

			if(!isset($_SESSION['pseudo']))
			{
				header("Location: connexion");
			}
			else
			{
				$admin = $modelsUser->verifAdmin($tab = array($_SESSION['pseudo']));

				$data = array('admin'=>$admin['rank']);
				$this->layout = "connected";
				$this->render('home', $data);
			}
	}

// FIN CONNEXION
// DEBUT DECONNEXION

	public function deconnexion()
	{
		$data = [];
		$this->render('deconnexion', $data);
	}
// FIN DECONNEXION
// DEBUT ADMIN
	public function admin()
	{
		$modelsUser = $this->loadModel('Users');
		$modelsEvent = $this->loadModel('Event');

		$admin = $modelsUser->verifAdmin($tab = array($_SESSION['pseudo']));

		if(!isset($_SESSION['pseudo']) || $admin['rank'] != 1)
		{
			header("Location: home");
		}
		else
		{
			if(isset($_POST['valid-admin']))
			{
				$modelsEvent->verifInfoAdmin($_POST['team1'], $_POST['team2'], $_POST['cote1'], $_POST['cote2'], $_POST['date_debut'], $_POST['date_fin'], $_POST['logo1'], $_POST['logo2']);
			}

				$data = array(
					'admin'=>$admin['rank'],
					'error'=>$modelsEvent->getError(),
					'valid'=>$modelsEvent->getValid());

				$this->layout = "connected";
				$this->render('admin', $data);
			}
	}
// FIN ADMIN
// DEBUT PROFILE

	public function profil()
	{

		$modelsUser = $this->loadModel('Users');
		$admin = $modelsUser->verifAdmin($tab = array($_SESSION['pseudo']));
		$infoUser = $modelsUser->readInfo("pseudo = ?", $tab = array($_SESSION['pseudo']));

		if(!isset($_SESSION['pseudo']))
		{
			header("Location: home");
		}
		else
		{
			if(isset($_POST['remove']))
			{
				$modelsUser->removeUtil($tab = array($_SESSION['pseudo']));
				header("Location: deconnexion");
			}

			$data = array(
				'admin'=>$admin['rank'],
				'nom'=>$infoUser['nom'],
				'prenom'=>$infoUser['prenom'],
				'pseudo'=>$infoUser['pseudo'],
				'email'=>$infoUser['email'],
				'date_naissance'=>$infoUser['date_naissance'],
				'sexe'=>$infoUser['sexe']);

			$this->layout = "connected";
			$this->render('profil', $data);
		}
	}

	public function editProfil()
	{

		$modelsUser = $this->loadModel('Users');
		$admin = $modelsUser->verifAdmin($tab = array($_SESSION['pseudo']));
		$infoUser = $modelsUser->readInfo("pseudo = ?", $tab = array($_SESSION['pseudo']));

		if(!isset($_SESSION['pseudo']))
		{
			header("Location: home");
		}
		else
		{

			if(isset($_POST['valid_edit']))
			{
				$modelsUser->updateMembre("nom = ?, prenom = ?, email = ? WHERE pseudo = ?",$tab = array($_POST['editNom'], $_POST['editPrenom'], $_POST['editEmail'], $_SESSION['pseudo']));
				header("Location: profil");
			}

			if(isset($_POST['valid_edit_mdp']))
			{
				$modelsUser->modifMdp($_POST['editMdp'], $_POST['editRemdp']);
			}

			$data = array(
				'admin'=>$admin['rank'],
				'nom'=>$infoUser['nom'],
				'prenom'=>$infoUser['prenom'],
				'email'=>$infoUser['email'],
				'error'=>$modelsUser->getError(),
				'valid'=>$modelsUser->getValid());

			$this->layout = "connected";
			$this->render('editProfil', $data);
		}
	}

// FIN PROFILE

}

?>