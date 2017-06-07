<?php

class Event extends Model
{
	protected $table = "event";
	private $date_debut;
	private $date_fin;
	private $team1;
	private $team2;
	private $cote1;
	private $cote2;
	private $logo1;
	private $logo2;
	private $error;
	private $valid;

	public function verifInfoAdmin($team1, $team2, $cote1, $cote2, $date_debut, $date_fin, $logo1 = "null", $logo2 = "null", $error = "null", $valid = "null")
	{
		$this->date_debut = htmlspecialchars($date_debut);
		$this->date_fin = htmlspecialchars($date_fin);
		$this->team1 = htmlspecialchars($team1);
		$this->team2 = htmlspecialchars($team2);
		$this->cote1 = htmlspecialchars($cote1);
		$this->cote2 = htmlspecialchars($cote2);
		$this->logo1 = htmlspecialchars($logo1);
		$this->logo2 = htmlspecialchars($logo2);
		$this->error = $error;
		$this->valid = $valid;

		if($this->teamName() && $this->dateEvent() && $this->coteEvent())
		{
			$this->insertEvent($tab = array($this->team1, $this->team2, $this->cote1, $this->cote2, $this->date_debut, $this->date_fin, $this->logo1, $this->logo2));

			$this->valid = "Evenement cree";

			return true;
		}
	}

	public function insertEvent($tab)
	{
		$sql = "INSERT INTO event(team1, team2, cote1, cote2, date_debut, date_fin, logo1, logo2) VALUES (?,?,?,?,?,?,?,?)";
		$query = self::$_pdo->prepare($sql);
        $query->execute($tab);
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

	public function teamName()
	{
		$longueur1 = strlen($this->team1);
		$longueur2 = strlen($this->team2);

		if(!empty($this->team1) || !empty($this->team2))
		{
			if($longueur1 < 11 || $longueur2 < 11)
			{
				return true;
			}
			else
			{
				$this->error = "Les noms des equipes ne peuvent exceder 10 caracteres";
				return false;
			}
		}
		else
		{
			$this->error = "Veuillez remplir les noms des equipes";
			return false;
		}
	}

	public function dateEvent()
	{
		$today = date('Y-m-j H:i');
		
		if(!empty($this->date_debut) || !empty($this->date_fin))
		{
			if($this->date_debut >= $today && $this->date_fin > $this->date_debut)
			{
				return true;
			}
			else
			{
				$this->error = "La date donnee est inferieur a la date d'aujourd'hui";
				return false;
			}
		}
		else
		{
			$this->error = "Veuillez remplir la/les date(s)";
			return false;
		}
	}

	public function coteEvent()
	{
		if(!empty($this->cote1) || !empty($this->cote2))
		{
			if($this->cote1 < 201 || $this->cote2 < 201)
			{
				if($this->cote1 < 1 || $this->cote2 < 1)
				{
					$this->error = "La cote minimum est de 1";
				}
				else
				{
					return true;
				}
			}
			else
			{
				$this->error = "La cote ne peut exceder 200";
				return false;
			}
		}
	}

}


?>