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
        $users = $this->_user->getUsersByName($name);

        $data['users'] = $users;

        if (sizeof($data) != 0) 
        {    
            View::render('admin/recherche_user', $data);
        }
    }

    public function edit_user()
    {
        $id = $_POST['id_user'];

        $user = $this->_user->getUsersById($id);
        $data['user'] = $user[0];
        View::render('admin/edit_user',$data);
    }

}
