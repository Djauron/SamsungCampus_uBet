<div class="container">    
    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Connexion</div>
            </div>     
            <div style="padding-top:30px" class="panel-body" >

                <?php 
                if(isset($error)){ ?>
                    <div id="login-alert" class="alert alert-danger col-sm-12"> <?php echo $error ?> </div>
                <?php } 

                if(isset($valid) && $valid != "null" ){ ?>
                    <div id="login-alert" class="alert alert-danger col-sm-12"> <?php echo $valid ?> </div>
                <?php } ?> 


                <form id="loginform" class="form-horizontal" method="POST">

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="pseudo" value="" placeholder="pseudo">                                        
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="mdp" placeholder="mot de passe">
                    </div>

                    <div class="input-group">
                        <div class="checkbox">
                            <label>
                                <input id="login-remember" type="checkbox" name="remember" value="1">Remember me
                            </label>
                        </div>
                    </div>


                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                            <input id="btn-login" type="submit" class="btn btn-success" name="validerconnexion" value="login">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 control">
                            <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >Pas de compte ?!<a href="inscription">Inscrivez vous !</a>
                            </div>
                        </div>
                    </div>    
                </form>     
            </div>                     
        </div>  
    </div>
</div>	