<?php

class Pari extends Model
{
    private $id_user;
    private $id_event;
    private $choix_team;
    private $jetons;
    private $valid;
    private $error;

    public function choixEquipe($id_user ,$id_event, $choix_team, $jetons, $error = "null", $valid = "null")
    {
        $this->id_user = $id_user;
        $this->id_event = htmlspecialchars($id_event);
        $this->choix_team = htmlspecialchars($choix_team);
        $this->jetons = htmlspecialchars($jetons);
        $this->error = $error;
        $this->valid = $valid;

        if($this->verifTeam() && $this->verifJetons())
        {
            $this->insertChoix($tab = array($this->id_user, $this->id_event, $this->choix_team, $this->jetons));
            $this->valid = "Merci de votre participation.";
        }
    }

    public function insertChoix($tab)
    {
        $sql = "INSERT INTO paris(id_user, id_event, choix_team, jetons) VALUES (?,?,?,?)";
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

    public function verifTeam()
    {
        if(!empty($this->choix_team))
        {
            return true;
        }
        else
        {
            $this->error = "Veuillez selectionnez une equipe.";
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
        }
    }

}