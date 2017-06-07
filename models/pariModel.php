<?php

class Pari extends Model
{
    protected $table = 'paris';
    private $id_user;
    private $id_event;
    private $choix_team;
    private $jetons;
    private $cote_equipe;
    private $valid;
    private $error;

    public function choixEquipe($id_user ,$id_event, $choix_team, $jetons, $cote_equipe,$error = "null", $valid = "null")
    {
        $this->id_user = $id_user;
        $this->id_event = htmlspecialchars($id_event);
        $this->choix_team = htmlspecialchars($choix_team);
        $this->jetons = htmlspecialchars($jetons);
        $this->cote_equipe = htmlspecialchars($cote_equipe);
        $this->error = $error;
        $this->valid = $valid;


        if($this->verifTeam() && $this->verifJetons())
        {
            $this->insertChoix($tab = array($this->id_user, $this->id_event, $this->choix_team, $this->jetons, $this->cote_equipe));
            return true;
        }
    }

    public function insertChoix($tab)
    {
        $sql = "INSERT INTO paris(id_user, id_event, choix_team, jetons, cote_equipe) VALUES (?,?,?,?,?)";
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

    public function verifTeam()
    {
        if(!empty($this->choix_team) && $this->choix_team > 0)
        {
            return true;
        }
        else
        {
            $this->error = "Veuillez selectionnez une equipe.";
            return false;
        }
    }

    public function verifJetons()
    {
        if(!empty($this->jetons))
        {
            return true;
        }
        else
        {
            $this->error = "Veuillez misez des jetons.";
            return false;
        }
    }

    public function finEvent($tab)
    {
        $sql = "UPDATE paris SET victoire = ? where id_event = ?";
        $query = self::$_pdo->prepare($sql);
        $query->execute($tab);
    }
}