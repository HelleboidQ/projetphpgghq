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
            'https://fonts.googleapis.com/css?family=Montserrat:400,700'
        ]);

        //hook for plugging in css
        $hooks->run('css');
        ?>

        <?php
        Assets::js([
            Url::templatePath() . 'js/jquery.js'
        ]);
        ?>
        <title><?php echo $data['title'] . ' - ' . SITETITLE; //SITETITLE defined in app/Core/Config.php           ?></title>

        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">    
    </head>

    <body>
        <?php $hooks->run('afterBody'); ?>

        <ul id="dropdown1" class="dropdown-content">
            <li>
                <a href="<?php echo URL; ?>admin/news_index">News</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>admin/produit">Produits</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>admin/users">Utilisateur</a>
            </li>
        </ul>

        <ul id="dropdown2" class="dropdown-content">
            <li>
                <a href="<?php echo URL; ?>accueil/index/1-film">Accueil</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>produits/index/1-film">Produit</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>news/index/1-film">News</a>
            </li>
        </ul>
        <ul id="dropdown3" class="dropdown-content">
            <li>
                <a href="<?php echo URL; ?>accueil/index/2-serie">Accueil</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>produits/index/2-serie">Produit</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>news/index/2-serie">News</a>
            </li>
        </ul>
        <ul id="dropdown4" class="dropdown-content">
           <li>
                <a href="<?php echo URL; ?>accueil/index/3-jeuxvideo">Accueil</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>produits/index/3-jeuxvideo">Produit</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>news/index/3-jeuxvideo">News</a>
            </li>
        </ul>
        <ul id="dropdown5" class="dropdown-content">
           <li>
                <a href="<?php echo URL; ?>accueil/index/4-musique">Accueil</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>produits/index/4-musique">Produit</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>news/index/4-musique">News</a>
            </li>
        </ul>
        <ul id="dropdown6" class="dropdown-content">
          <li>
                <a href="<?php echo URL; ?>accueil/index/5-bd">Accueil</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>produits/index/5-bd">Produit</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>news/index/5-bd">News</a>
            </li>
        </ul>
        <ul id="dropdown7" class="dropdown-content">
            <li>
                <a href="<?php echo URL; ?>login/compte?action=infos">Modifer le compte</a>
            </li>
            <li>
                <a href="<?php echo URL; ?>user/commande">Commande</a>
            </li> 
        </ul>


        <nav>
            <div class="nav-wrapper teal lighten-2">
                <a href="<?php echo URL; ?>" class="brand-logo">&nbsp;<?php echo SITETITLE; ?></a>
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
                            <a href="<?php echo URL; ?>users/panier">Mon panier</a>
                        </li> <li>
                            <a href="<?php echo URL; ?>login/logout">Logout</a>
                        </li>
                    </ul>
                    <?php
                } else {
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


                <ul class="side-nav" id="mobile-demo">
                    <?php
                    if (\Helpers\Session::get('user_logged_in') == true) {
                        ?>

                        <li>
                            <a href="<?php echo URL; ?>user/panier">Mon panier</a>
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>login/logout">Logout</a>
                        </li>
                        <?php
                    } else {
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
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo URL; ?>admin/list_news">News</a>
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>admin/produit">Produits</a>
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>admin/users">Utilisateur</a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
                <?php
                if (\Helpers\Session::get('user_logged_in') == true) {
                    ?>
                    <ul class="right hide-on-med-and-down">
                        <li><a class="dropdown-button" href="#!" data-activates="dropdown7">Mon profil<i class="material-icons right">arrow_drop_down</i></a></li> 
                    </ul>
                <?php }
                ?>

                <ul class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown6">BD<i class="material-icons right">arrow_drop_down</i></a></li> 
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown5">Musique<i class="material-icons right">arrow_drop_down</i></a></li> 
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown4">Jeux Vidéo<i class="material-icons right">arrow_drop_down</i></a></li> 
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown3">Séries<i class="material-icons right">arrow_drop_down</i></a></li> 
                </ul>
                <ul class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown2">Film<i class="material-icons right">arrow_drop_down</i></a></li> 
                </ul>

            </div>
        </nav>

        <?php if(!isset($data['settings']['dontShowContainer']))
        {
            ?>
                <div class="container"> 
            <?php
        }
        ?>