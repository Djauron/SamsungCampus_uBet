<div class="container">
            <?php
            if(isset($error) && $error != "null")
            {?>
                <div id="pseudo-alert" class="alert alert-danger col-sm-12"><?php echo $error ?></div><?php
            }

            if(isset($valid) && $valid != "null")
            {?>
                <div id="pseudo-alert" class="alert alert-danger col-sm-12" style="background-color: green; color: white;"><?php echo $valid ?></div><?php 
            }?>

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">EDITER LE PROFIL</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class=" col-md-9 col-lg-9 profil-center"> 
                        	<form method="post">
	                            <table class="table table-user-information">
	                                <tbody>
	                                    <tr>
	                                        <td>Nom:</td>
	                                        <td><input type="text" name="editNom" id="editNom" value="<?=$nom;?>"></td>
	                                    </tr>
	                                    <tr>
	                                        <td>Prenom:</td>
	                                        <td><input type="text" name="editPrenom" id="editPrenom" value="<?=$prenom;?>"></td>
	                                    </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td><input type="text" name="editEmail" id="editEmail" value="<?=$email;?>"></td>
                                        </tr>

	                                    <tr>
	                                    	<td colspan="2"><input type="submit" name="valid_edit" id="valid_edit"></td>
	                                    </tr>
	                                </tbody>
	                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Changer le mot de passe</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class=" col-md-9 col-lg-9 profil-center"> 
                        	<form method="post">
	                            <table class="table table-user-information">
	                                <tbody>
	                                    <tr>
	                                    	<td>New MDP :</td>
	                                    	<td><input type="password" name="editMdp" id="editMdp" placeholder="Nouveau MDP"></td>
	                                    </tr>

	                                    <tr>
	                                    	<td>Confirmer MDP :</td>
	                                    	<td><input type="password" name="editRemdp" id="editRemdp" placeholder="Confirmer MDP"></td>
	                                    </tr>

	                                    <tr>
	                                    	<td colspan="2"><input type="submit" name="valid_edit_mdp" id="valid_edit_mdp"></td>
	                                    </tr>
	                                </tbody>
	                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>