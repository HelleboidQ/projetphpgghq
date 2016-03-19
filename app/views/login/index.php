<div class="container">
    <div class="jumbotron">
        <h1>Login</h1>

        <form class="form-horizontal" role="form" action="<?php echo URL; ?>Login/identification" method="post">

            <div class="form-group">
                <label for="pseudo" class="col-sm-2 control-label">Nom login : </label>

                <div class="col-sm-10">
                    <input type="text" class="form-control" id="pseudo" name="pseudo">
                </div>
            </div>
            <div class="form-group">
                <label for="pass" class="col-sm-2 control-label">Mot de passe : </label>

                <div class="col-sm-10">
                    <input type="password" class="form-control" id="pass" name="pass">
                </div>
            </div>
             
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="login">
                        Valide
                    </button>
                </div>
            </div>
        </form>
    </div>

