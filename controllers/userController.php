<?php

class User extends Controller
{
	public function index()
	{
		$modelsUser = $this->loadModel('Users');
		$data['user'] = $modelsUser->read(1);
		$this->render('index', $data);
	}

	public function inscription()
	{
		$modelsUser = $this->loadModel('Users');
		$user = new Users;

		$data = array(
			'error'=>$user->getError(),
			'valid'=>$user->getValid());

		var_dump($data);


		if(isset($_POST['valid']))
		{
			$user->verifMembre($_POST['nom'],$_POST['prenom'],$_POST['date_naissance'],$_POST['email'],$_POST['pseudo'],$_POST['mdp'],$_POST['remdp'],$_POST['sexe']);
		}

		$this->render('header', $data);
		$this->render('inscription', $data);
		$this->render('end', $data);	
	}

	public function connexion()
	{
		$modelsUser = $this->loadModel('Users');
		$data = [];
		$this->render('header', $data);
		$this->render('connexion', $data);
		$this->render('end', $data);
	}
}

?>