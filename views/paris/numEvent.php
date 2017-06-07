<?php
if(isset($error) && $error != "null")
{?>
    <div id="pseudo-alert" class="alert alert-danger col-sm-12"><?php echo $error ?></div><?php
}

if(isset($valid) && $valid != "null")
{?>
    <div id="pseudo-alert" class="alert alert-danger col-sm-12" style="background-color: green; color: white;"><?php echo $valid ?></div><?php
}

foreach($event as $affEvent){
    ?>
    <div class="container">
        <div class="card">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">

                        <div class="preview-pic tab-content">
                            <img alt="logo" src="<?= $affEvent['logo1'] ?>" class="tailleImg"/>
                            <img alt="logo" src="<?= $affEvent['logo2'] ?>" class="tailleImg"/>
                        </div>


                    </div>
                    <div class="details col-md-6">
                        <div class="taille">
                            <h2 class="title1"><?= $affEvent['team1'] ?></h2>
                            <p class="desc">Cote : <?=$affEvent['cote1']?></p>
                        </div>

                        <div class="taille">
                            <h2 class="title2"><?=$affEvent['team2']?></h2>
                            <p class="desc">Cote : <?=$affEvent['cote2']?></p>
                        </div>


                        <div class="choixTeam">
                            <form method="post">
                                <select name="choix_team">
                                    <option value="0">Chosir une team</option>
                                    <option value="1"><?= $affEvent['team1'] ?></option>
                                    <option value="2"><?= $affEvent['team2'] ?></option>
                                </select>
                                <input type="number" name="mise_cote" min="1" max="<?= $jetons ?>">
                                <input type="submit" name="valid_mise">
                            </form>
                        </div>
                        <div>
                            <p>Date de debut des paris : <?= $affEvent['date_debut'] ?></p>
                            <p>Date de fin des paris : <?= $affEvent['date_fin'] ?></p>
                            <?php if(isset($admin) && $admin == 1)
                            {?>
                                <form method="post" id="colorB">
                                    <select name="final_choix">
                                        <option value="0">Chosir une team</option>
                                        <option value="1"><?= $affEvent['team1'] ?></option>
                                        <option value="2"><?= $affEvent['team2'] ?></option>
                                    </select>
                                    <button name="fin_event" value="<?=$_GET['p1'];?>">Mettre fin au paris</button>
                                </form>


                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>