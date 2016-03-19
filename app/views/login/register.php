<div class="container">


    <div class="jumbotron">
        <h1>Inscription</h1>
        <!-- register form -->
        <form method="post" action="<?php echo URL; ?>Login/newUsers" class="form-horizontal"  role="form" name="registerform">
            <!-- the user name input field uses a HTML5 pattern check -->
            <div class="form-group">
                <label for="user_name" class="col-sm-2 control-label">Nom login : </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="user_name" name="pseudo" pattern="[a-zA-Z0-9]{2,64}" required>
                </div>
            </div>
             <div class="form-group">
                <label for="user_name" class="col-sm-2 control-label">Mail : </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="mail" name="mail" required>
                </div>
            </div>

            <div class="form-group">
                <label for="pass" class="col-sm-2 control-label">Mot de passe : </label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="pass" name="pass" required>
                </div>
            </div>  
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default" name="register" value="register">
                        Valider
                    </button>
                </div>
            </div>

        </form>
    </div>

</div> 