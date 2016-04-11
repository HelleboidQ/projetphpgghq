<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Admin extends Controller {

    private $_user;
    private $_produits;
    private $_univers;
    private $_news;

    function __construct() {
        parent::__construct();
        $this->_user = new \Models\Users();
        $this->_produits = new \Models\Produits();
        $this->_univers = new \Models\Univers();
        $this->_news = new \Models\News();
    }

    public function news_index() {
        $data = array();

        $univers = $this->_univers->findAll();
        foreach($univers as $u)
        {
            $data['univers'][$u->id] = array('univers' => $u, 'news' => array());
            $data['univers'][$u->id]['news'] = $this->_news->findByUnivers($u->id);
        }

        View::renderTemplate('header');
        View::render('admin/list_news',$data);
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
        $token = isset($_POST['token_user']) ? $_POST['token_user'] : '0';

        $user = $this->_user->getUsersById($id);
        $data['user'] = $user[0];

        $hash = hash('sha1',$data['user']->id . $data['user']->pseudo);

        if($hash == $token)
        {
            View::render('admin/edit_user',$data);
        }
        else
        {
            echo 'Bah alors, on essaye de faire le D4RK H4CK3R ? (hash AJAX incorrect)';
        }
        
    }

}
