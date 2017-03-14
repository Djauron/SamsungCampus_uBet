<div class="container form-admin"> 

            <?php
            if(isset($error) && $error != "null")
            {?>
                <div id="pseudo-alert" class="alert alert-danger col-sm-12"><?php echo $error ?></div><?php
            }

            if(isset($valid) && $valid != "null")
            {?>
                <div id="pseudo-alert" class="alert alert-danger col-sm-12" style="background-color: green; color: white;"><?php echo $valid ?></div><?php 
            }?>

    <form id="loginform" class="form-horizontal" method="POST">

        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 admin-box">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Equipe 1</div>
                </div>     
                <div style="padding-top:30px" class="panel-body" >

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="team1" type="text" class="form-control" name="team1" value="" placeholder="Team name">            
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-signal"></i></span>
                        <input id="cote1" type="text" class="form-control" name="cote1" placeholder="Cote team 1">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                        <input type="text" name="logo1" id="logo1" class="form-control" placeholder="Lien logo"/>
                    </div>
                </div>                     
            </div>  
        </div>

        <div id="admin-2" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 admin-box">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Equipe 2</div>
                </div>     
                <div style="padding-top:30px" class="panel-body" >

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="team2" type="text" class="form-control" name="team2" value="" placeholder="Team name">                                        
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-signal"></i></span>
                        <input id="cote2" type="text" class="form-control" name="cote2" placeholder="Cote team 2">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
                        <input type="text" name="logo2" id="logo2" class="form-control" placeholder="Lien logo"/>
                    </div>
                </div>                     
            </div>  
        </div>

        <div id="admin-dates" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 admin-box">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Dates</div>
                </div>     
                <div style="padding-top:30px" class="panel-body" >

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input class="form-control" type="text" name="date_debut" placeholder="date debut YYYY-MM-JJ HH:MM" pattern="20\d{2}(-|\/)((0[1-9])|(1[0-2]))(-|\/)((0[1-9])|([1-2][0-9])|(3[0-1]))(T|\s)(([0-1][0-9])|(2[0-3])):([0-5][0-9])">                                        
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input class="form-control" type="text" name="date_fin" placeholder="date fin YYYY-MM-JJ HH:MM" pattern="20\d{2}(-|\/)((0[1-9])|(1[0-2]))(-|\/)((0[1-9])|([1-2][0-9])|(3[0-1]))(T|\s)(([0-1][0-9])|(2[0-3])):([0-5][0-9])">
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <input type="submit" name="valid-admin" id="valid-admin"/>
                    </div>

                </div>                     
            </div>  
        </div>

    </form>
</div>	