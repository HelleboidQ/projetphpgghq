<?php

/**
 * Sample layout.
 */
use Helpers\Assets;
use Helpers\Hooks;
use Helpers\Url;

//initialise hooks
$hooks = Hooks::get();
?>
<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
    <head>

        <!-- Site meta -->
        <meta charset="utf-8">
        <?php
        //hook for plugging in meta tags
        $hooks->run('meta');
        ?>
        <title><?php echo $data['title'] . ' - ' . SITETITLE; //SITETITLE defined in app/Core/Config.php    ?></title>

        <!-- CSS -->
        <?php
        Assets::css([
            '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
            URL . 'app/templates/default/css/style.css',
        ]);

        //hook for plugging in css
        $hooks->run('css');
        ?>

    </head>
    <body>
        <?php
//hook for running code after body tag
        $hooks->run('afterBody');
        ?>
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle collapsed" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button> 

                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li >
                            <a href="<?= URL; ?>">Accueil</a>
                        </li> 
                    </ul> 
                    <ul class="nav navbar-nav navbar-right"> 
                        <li><a href="<?php echo URL . 'login'; ?>">Login</a></li>
                        <li><a href="<?php echo URL . 'login/register'; ?>">Inscription</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="container"> 