<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Admin extends Controller {

    private $_user;
    private $_produits;
    private $_univers;

    function __construct() {
        parent::__construct();
        $this->_user = new \Models\Users();
        $this->_produits = new \Models\Produits();
        $this->_univers = new \Models\Univers();
    }

    public function news() {
        //$listeProduits = $this->_produits->findByUnivers(2);
        //$listeProduits = $this->_produits->findAll();
        //$data['list'] = $listeProduits;

        View::renderTemplate('header');
        //View::render('produits/index',$data);
        View::render('admin/news');
        View::renderTemplate('footer');
    }

    public function produit() {
        $listeProduits = $this->_produits->findAll();
        $data['list'] = $listeProduits;

        $listeUnivers = $this->_univers->findAll();
        $data['univers'] = $listeUnivers;


        View::renderTemplate('header');
        View::render('admin/produit', $data);
        View::renderTemplate('footer');
    }

    public function users() {
        //$listeProduits = $this->_produits->findByUnivers(2);
        //$listeProduits = $this->_produits->findAll();
        //$data['list'] = $listeProduits;

        View::renderTemplate('header');
        //View::render('produits/index',$data);
        View::render('admin/users');
        View::renderTemplate('footer');
    }

    public function recherche_user() {
        $name = htmlentities($_POST['nom']);
        ;

        $personne = $this->_user->getUsersByName($name);
        if (sizeof($personne) != 0) {
            ?>
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Pseudo</th>
                        <th>Mail</th>
                        <th>Admin</th>
                        <th>Modifier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($personne as $p) {
                        ?>
                        <tr>
                            <td><?= $p->id ?></td>
                            <td><?= $p->pseudo ?></td>
                            <td><?= $p->mail ?></td>
                            <td><?= $p->admin ?></td> 
                            <td><button type="button" class="btn btn-info  " data-toggle="modal" data-target="#modal<?= $p->id ?>">Modifier <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td>
                        </tr>
                    <div id="modal<?= $p->id ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Modifer profil</h4>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="login/modifier/<?= $p->id ?>" >
                                        <p>Some text in the modal.</p>

                                        <div class="modal-footer"> 
                                            <button type="submit" name="editProfil" class="btn btn-success">Valider</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>                                                               
                                        </div>
                                    </form> 
                                </div>
                            </div>

                        </div>
                    </div>
                    <?php
                }
                ?>
            </tbody>
            </table>
            <?php
        }
    }

}
