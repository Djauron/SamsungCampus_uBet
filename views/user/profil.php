<div class="container">
    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title"><?=$pseudo;?></h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class=" col-md-9 col-lg-9 profil-center"> 
                            <table class="table table-user-information">
                                <tbody>
                                    <tr>
                                        <td>Nom:</td>
                                        <td><?=$nom;?></td>
                                    </tr>
                                    <tr>
                                        <td>Prenom:</td>
                                        <td><?=$prenom;?></td>
                                    </tr>
                                    <tr>
                                        <td>Date de naissance</td>
                                        <td><?=$date_naissance;?></td>
                                    </tr>

                                    <tr>
                                        <tr>
                                            <td>Sexe</td>
                                            <td><?=$sexe;?></td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td><a href="mailto:info@support.com"><?=$email;?></a></td>
                                        </tr>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="panel-footer">        
                    <a href="editProfil" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>

                    <form method="post">
                        <button class="btn btn-sm btn-danger" id="remove" name="remove">
                            <i class="glyphicon glyphicon-remove"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>