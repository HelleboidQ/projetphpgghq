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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <?php
        //hook for plugging in meta tags
        $hooks->run('meta');
        ?>

        <!-- CSS -->
        <?php
        Assets::css([
            '//cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css',
            URL . 'app/templates/default/css/style.css',
        ]);

        //hook for plugging in css
        $hooks->run('css');
        ?>

        <?php
        Assets::js([
            Url::templatePath().'js/jquery.js'
        ]);
        ?>
        <title><?php echo $data['title'] . ' - ' . SITETITLE; //SITETITLE defined in app/Core/Config.php ?></title>

        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
    </head>

    <body>
        <?php $hooks->run('afterBody'); ?>

        <ul id="dropdown1" class="dropdown-content">
            <li>
                <a href="<?php echo URL; ?>admin/news">News</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>admin/produit">Produits</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>admin/users">Utilisateur</a>
            </li>
        </ul>

        <nav>
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">&nbsp;<?php echo SITETITLE; ?></a>
                <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                <?php
                    if (\Helpers\Session::get('admin') == "1") {
                        ?>
                <ul class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Admin<i class="material-icons right">arrow_drop_down</i></a></li> 
                </ul>

                <?php
                    }
                if (\Helpers\Session::get('user_logged_in') == true) {
                ?>
                <ul class="right hide-on-med-and-down">
                    <li>
                        <a href="<?php echo URL; ?>login/compte">Mon profil</a>
                    </li> 
                    <li>
                        <a href="<?php echo URL; ?>login/logout">Logout</a>
                    </li>
                </ul>
                <?php
                }
                else
                {
                    ?>
                    <ul class="right hide-on-med-and-down">
                        <li>
                            <a href="<?php echo URL . 'login'; ?>">Login</a>
                        </li>
                        <li>
                            <a href="<?php echo URL . 'login/register'; ?>">Inscription</a>
                        </li>
                    </ul>
                    <?php
                }
                ?>
                <ul class="right hide-on-med-and-down">
                    <li><a href="<?php echo URL . 'univers'; ?>">Univers</a></li>
                    <li><a href="<?php echo URL . 'produits'; ?>">Produits</a></li>
                </ul>

                <ul class="side-nav" id="mobile-demo">
                    <?php
                        if (\Helpers\Session::get('user_logged_in') == true) {
                    ?>
                    <li>
                        <a href="<?php echo URL; ?>login/compte">Mon profil</a>
                    </li> 
                    <li>
                        <a href="<?php echo URL; ?>login/logout">Logout</a>
                    </li>
                    <?php
                    }
                    else
                    {
                        ?>
                    <li>
                        <a href="<?php echo URL . 'login'; ?>">Login</a>
                    </li>
                    <li>
                        <a href="<?php echo URL . 'login/register'; ?>">Inscription</a>
                    </li>
                        <?php
                    }
                    if (\Helpers\Session::get('admin') == "1") {
                        ?>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Admin<i class="material-icons right">arrow_drop_down</i></a></li> 
                        <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <div class="container"> 