<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Admin extends Controller {

    private $_user;
    private $_produits;
    private $_univers;
    private $_news;
    private $_medias;

    function __construct() {
        parent::__construct();
        $this->_user = new \Models\Users();
        $this->_produits = new \Models\Produits();
        $this->_univers = new \Models\Univers();
        $this->_news = new \Models\News();
        $this->_medias = new \Models\Medias();
    }

    public function index()
    {
        View::renderTemplate('header');

        $actions_disponibles = array('index', 'medias','commandes','sav','news','users','produits');

        $data['action'] = $_GET['action'] ? $_GET['action'] : 'index';
        if(in_array($data['action'], $actions_disponibles)){

            View::render('admin/menu',$data);

            $data['reponse'] = array();

            switch($data['action'])
            {
                case "adresses":
                    $liste_adresses = $this->adresses->findByUser($user_id);
                    $data['reponse']['listeAdresses'] = $liste_adresses;
                break;

                case "index":
                    
                break;

                case "commandes":
                    $listeRaw = $this->commandes->findByUser($user_id);
                    $liste_commandes = array();

                    foreach($listeRaw as $produit)
                    {
                        $liste_commandes[$produit->id_commande]['infos'] = array('date' => $produit->time);
                        $liste_commandes[$produit->id_commande]['produits'][] = array('nom' => $produit->nom, 'prix' => $produit->prix);
                    }

                    $data['reponse']['listeCommandes'] = $liste_commandes;
                break;

                case "sav":
                    
                break;

                case "medias":
                    $this->medias();
                break;

                case "news":
                    $this->news_index();
                break;

                case "produits":
                    $this->produit();
                break;
            }
            View::renderTemplate('footer');
        }
        else
        {
            echo 'balancer 404 ici';
        }

        
    }

    public function medias()
    {
        $data['medias'] = $this->_medias->findLast(20);
        View::render('admin/list_medias',$data);
    }

    public function news_index() {
        $data = array();

        $univers = $this->_univers->findAll();
        foreach($univers as $u)
        {
            $data['univers'][$u->id] = array('univers' => $u, 'news' => array());
            $data['univers'][$u->id]['news'] = $this->_news->findByUnivers($u->id);
        }

        View::render('admin/list_news',$data);
    }

    public function produit() {
        $listeProduits = $this->_produits->findAll();
        $data['list'] = $listeProduits;

        $listeUnivers = $this->_univers->findAll();
        $data['univers'] = $listeUnivers;

        View::render('admin/produit', $data);
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
