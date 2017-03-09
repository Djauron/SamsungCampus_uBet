<?php

class Users extends Model
{
	protected $table = 'user';
	private $nom;
	private $prenom;
	private $date_naissance;
	private $email;
	private $pseudo;
	private $mdp;
	private $remdp;
	private $sexe;
	private $error;
	private $valid;



	public function verifInscription($nom,$prenom,$date_naissance,$email,$pseudo, $mdp, $remdp, $sexe,$error="null",$valid="null")
	{
		$this->nom = htmlspecialchars($nom);
		$this->prenom = htmlspecialchars($prenom);
		$this->date_naissance = htmlspecialchars($date_naissance);
		$this->email = htmlspecialchars($email); 
		$this->pseudo = htmlspecialchars($pseudo);
		$this->mdp = md5(htmlspecialchars($mdp));
		$this->remdp = md5(htmlspecialchars($remdp));
		$this->error = $error;
		$this->valid = $valid;
		$this->sexe = htmlspecialchars($sexe);


		if($this->pseudo() && $this->mdp() && $this->email() && $this->sexe() && $this->date_n())
		{
			$longueur_token = 8;
			$token = "";
			for($i=1; $i < $longueur_token; $i++)
			{
				$token .= mt_rand(0,15);
			}

			$this->insertUsers($tab = array($this->nom,$this->prenom,$this->pseudo,$this->mdp,$this->email, $this->date_naissance, $this->sexe, $token));

			$this->valid = "Veuillez confirmer votre inscription avec le mail que vous avez recu.";

			return true;
		}
	}

	public function getError()
    {
    	if(isset($this->error))
    	{
    		return $this->error;
    	}
    }

    public function getValid()
    {
    	if(isset($this->valid))
    	{
    		return $this->valid;
    	}
    }

	public function insertUsers($tab)
	{
		$sql = "INSERT INTO user(nom, prenom, pseudo ,mdp , email, date_naissance, sexe, token) VALUES (?,?,?,?,?,?,?,?)";
		$query = self::$_pdo->prepare($sql);
        $query->execute($tab);
	}

	public function pseudo()
	{
		$longueur = strlen($this->pseudo);
		$sql = "SELECT * FROM membre WHERE pseudo = '$this->pseudo'";
		$query = self::$_pdo->prepare($sql);
		$query->fetchAll();

		if(!empty($this->pseudo))
		{
			if($longueur <= 20 && empty($prisLog))
			{
				return true;
			}
			else
			{
				$this->error = " Votre pseudo comprends plus de 20 caractéres et/ou est déjà pris par un autre membre !";
				return false;
			}
		}
		else
		{
			$this->error = "veuillez remplir tout les champs !";
			return false;
		}
	}
      
    public function mdp()
	{
		if(!empty($this->mdp))
		{
			if($this->mdp == $this->remdp)
			{
				return true;       
			}
			else
			{
				$this->error = "Vos mots de passes sont différent, veuillez les retapez à l'indentique.";
				return false;
			}
		}
		else
		{
			$this->error = "veuillez remplir tout les champs !";
			return false;
		}       
	}

	public function date_n()
	{
		if(!empty($this->date_naissance))
		{
			$age = (time() - strtotime($this->date_naissance)) / 3600 / 24 / 365;
			if(floor($age) >= 18)
			{
				return true;
			}
			else
			{
				$this->error = "Vous devez etre majeur pour vous inscrire ! ";
				return false;
			}
		}
		else
		{
			$this->error = "veuillez remplir tout les champs !";
			return false;
		}
	}
       
    public function email()
    {
    	if(!empty($this->email))
    	{
		    if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $this->email))
		    {
				return true;
		    }
		    else
		    {
		    	$this->error = 'L\'adresse ' . $this->email . ' n\'est pas valide !';
		    	return false;
		    }
		}
		else
		{
			$this->error = "veuillez remplir tout les champs 3!";
			return false;
		}
    }

    public function sexe()
    {
    	if(!empty($this->sexe))
    	{
	    	if($this->sexe == "homme" || $this->sexe == "femme" || $this->sexe == "autre")
	    	{
	    		return true;
	    	}
	    	else
	    	{
	    		$this->error = "Veuillez selectionner un sexe !";
				return false;
	    	}
	    }
	    else
	    {
	    	$this->error = "veuillez remplir tout les champs !";
	    	return false;
	    }
    }


	public function Verifconnexion($pseudo, $mdp)
	{
		$this->pseudo = htmlspecialchars($pseudo);
		$this->mdp = md5(htmlspecialchars($mdp));

		$verifco = $this->RequeteVerifConnexion($tab = array($this->pseudo , $this->mdp));

      	if(!empty($this->pseudo) && !empty($this->mdp))
      	{
			if($verifco == 1)
			{
				$userinfo = $this->RequeteInfoUser($tab = array($this->pseudo , $this->mdp));
				if($userinfo['confirme'] == 1)
				{
					if($userinfo['active'] == 0)
					{
						$_SESSION['id'] = $userinfo['id'];
						$_SESSION['pseudo'] = $userinfo['pseudo'];
						$_SESSION['email'] = $userinfo['email'];
						$_SESSION['nom'] = $userinfo['nom'];
						$_SESSION['prenom'] = $userinfo['prenom'];
						$_SESSION['avatar'] = $userinfo['avatar'];
						$_SESSION['naissance'] = $userinfo['date_naissance'];
						header("Location: index.php?page=profile");
						return true;
					}
					else
					{
						$this->error = "Ce compte n'existe plus !";
						return false;
					}
				}
				else
				{
						$this->error = "Veuillez confirmer votre compte !";
						return false;
				}
	    	}
			else
			{
				$this->error = "Pseudo ou Mot de passe incorrect ! " ;
				return false;
			}
		}
		else
		{
			$this->error = "Un des deux champs est vide !";
		}
	}

	public function RequeteVerifConnexion($tab)
	{
		$sql = "SELECT * FROM membre WHERE pseudo = ? AND mdp = ?";
		$query = self::$_pdo->prepare($sql);
        $query->execute($tab);
      	return $query->rowCount();
	}

	public function RequeteInfoUser($tab)
	{
		$sql = "SELECT * FROM user WHERE pseudo = ? AND mdp = ?";
		$query = self::$_pdo->prepare($sql);
        $query->execute($tab);
      	return $query->fetch();
	}

	public function requeteRecupKey($tab)
	{
		$sql = "SELECT * FROM user WHERE pseudo = ? AND token = ?";
		$query = self::$_pdo->prepare($sql);
		$query->execute($tab);
      	return $query->fetch();
	}

	public function requeteConfirmKey($tab)
	{
		$sql = "UPDATE user SET confirme = '1' where pseudo = ?";
		$query = self::$_pdo->prepare($sql);
		return $query->execute($tab);
	}
}

?>