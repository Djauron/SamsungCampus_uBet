<?php

class Achat extends Controller
{

    public function valide()
    {
        $modelsUser = $this->loadModel('Users');
        $infoUser = $modelsUser->readInfo("pseudo = ?", $tab = array($_SESSION['pseudo']));

        $this->layout = "connected";
        $data = array(
            'admin'=>$infoUser['rank'],
            'jetons'=>$infoUser['jetons']);

        $this->render("valide",$data);
    }

    public function annule()
    {
        $modelsUser = $this->loadModel('Users');
        $infoUser = $modelsUser->readInfo("pseudo = ?", $tab = array($_SESSION['pseudo']));

        $this->layout = "connected";
        $data = array(
            'admin'=>$infoUser['rank'],
            'jetons'=>$infoUser['jetons'],);

        $this->render("annule",$data);
    }

    public function validation(){
        $req = 'cmd=_notify-validate';

        foreach ($_POST as $key => $value) {
            $value = urlencode(stripslashes($value));
            $req .= "&$key=$value";
        }
        $header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
        $header .= "Content-Type: application/x-www-form-urlencoded\r\n";
        $header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
        $fp = fsockopen ('www.sandbox.paypal.com', 80, $errno, $errstr, 30);
        $item_name = $_POST['item_name'];
        $item_number = $_POST['item_number'];
        $payment_status = $_POST['payment_status'];
        $payment_amount = $_POST['mc_gross'];
        $payment_currency = $_POST['mc_currency'];
        $txn_id = $_POST['txn_id'];
        $receiver_email = $_POST['receiver_email'];
        $payer_email = $_POST['payer_email'];
        $id_user = $_POST['custom'];
        if (!$fp) {

        } else {
            if ( $payment_status == "Completed") {
                if ( "sinansnake-facilitator@hotmail.fr" == $receiver_email) {
                    $modelsuser = $this->loadModel("Users");
                    $modelsuser->updateMembre("jetons = ( jetons + ? ) WHERE id = ?",$tab = array(intval($payment_amount),$id_user));
                }
            }
            else if ($payment_status != "Completed") {

            }
            fclose ($fp);
        }

    }
}

?>