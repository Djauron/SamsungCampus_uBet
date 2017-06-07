<?php

class Paris extends Controller
{

    public function numEvent()
    {

        if(!isset($_SESSION['pseudo']))
        {
            header("Location: connexion");
        }
        else
        {
            $modelsEvent = $this->loadModel('Event');
            $modelsUser = $this->loadModel('Users');
            $modelsParis = $this->loadModel('Pari');

            $infoUser = $modelsUser->readInfo("pseudo = ?", $tab = array($_SESSION['pseudo']));
            $infoEvent = $modelsEvent->readInfoAll("id_event = ?", $tab = array($_GET['p1']));

            if(isset($_POST['valid_mise']))
            {
                    $choix = $modelsEvent->readInfo("id_event = ?", $tab = array($_GET['p1']));

                    if($_POST['choix_team'] == 1)
                    {
                        $modelsParis->choixEquipe($_SESSION['id'], $_GET['p1'], $_POST['choix_team'], $_POST['mise_cote'], $choix['cote1']);
                    }
                    elseif($_POST['choix_team'] == 2)
                    {
                        $modelsParis->choixEquipe($_SESSION['id'], $_GET['p1'], $_POST['choix_team'], $_POST['mise_cote'], $choix['cote2']);
                    }

                    $modelsUser->updateMembre("jetons = ( jetons - ? ) WHERE id = ?", $tab = array($_POST['mise_cote'], $_SESSION['id']));
                    header("Location: " . WEBROOT . "paris/validemise");
            }

            if(isset($_POST['final_choix']))
            {
                $modelsParis->finEvent($tab = array($_POST['final_choix'], $_GET['p1']));

                $parieur = $modelsParis->readInfoAll("id_event = ?", $tab = array($_GET['p1']));

                foreach($parieur as $check)
                {
                    if ($check['victoire'] == $check['choix_team'])
                    {
                        $gain = $check['cote_equipe'] * $check['jetons'];
                        $modelsUser->updateMembre("jetons = ( jetons + ? ) WHERE id = ?", $tab = array($gain, $check['id_user']));
                        $modelsEvent->update("terminer = ? where id_event = ?", $tab = array(1, $_GET['p1']));
                    }
                }
            }

            if($infoEvent[0]['terminer'] != null)
            {
                header("Location: ".WEBROOT."paris/terminer");
            }

            if($infoEvent == false)
            {
                header("Location: ".WEBROOT."user/home");
            }

            $data = array(
                'event'=>$infoEvent,
                'admin'=>$infoUser['rank'],
                'jetons'=>$infoUser['jetons'],
                'error'=>$modelsParis->getError());

            $this->layout = "connected";
            $this->render('numEvent', $data);
        }
    }

    public function validemise()
    {
        if(!isset($_SESSION['pseudo']))
        {
            header("Location: connexion");
        }
        else
        {
            $modelsUser = $this->loadModel('Users');

            $infoUser = $modelsUser->readInfo("pseudo = ?", $tab = array($_SESSION['pseudo']));

            $data = array(
                'admin'=>$infoUser['rank'],
                'jetons'=>$infoUser['jetons']);

            $this->layout = "connected";
            $this->render('validemise', $data);
        }
    }

    public function terminer()
    {
        if(!isset($_SESSION['pseudo']))
        {
            header("Location: connexion");
        }
        else
        {
            $modelsUser = $this->loadModel('Users');

            $infoUser = $modelsUser->readInfo("pseudo = ?", $tab = array($_SESSION['pseudo']));

            $data = array(
                'admin'=>$infoUser['rank'],
                'jetons'=>$infoUser['jetons']);

            $this->layout = "connected";
            $this->render('terminer', $data);
        }
    }
}


?>