<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Accueil
 *
 * @author quentin
 */

namespace Controllers;

use Core\Controller;
use Core\View;

class Accueil extends Controller {

    private $_news;
    private $_produits;
    private $_univers;
    private $_users;

    function __construct() {
        parent::__construct();
        $this->_produits = new \Models\Produits();
        $this->_news = new \Models\News();
        $this->_univers = new \Models\Univers();
        $this->_users = new \Models\Users();
    }

    public function index($id) {
        $recupId = explode("-", $id);
        $id = $recupId[0];

        $listeNews = $this->_news->findByUniversLast($id,5);
        $data['news'] = array();

        foreach($listeNews as $news)
        {
            $imgObjet = $this->_news->findNewsImage($news->id);
            $imgObjet = $imgObjet[0];

            $auteurObjet = $this->_users->getUsersById($news->auteur);
            $auteurObjet = $auteurObjet[0];

            $data['news'][] = array('news' => $news, 'auteur' => $auteurObjet, 'image' => $imgObjet);
        }

        $listeProduits = $this->_produits->findByUnivers($id);
        $data['produits'] = $listeProduits;

        $data['univers'] = $this->_univers->findById($id);

        $data['settings']['dontShowContainer'] = 1; // On passe cette variable au template header pour que le container soit déclaré après la bannière (afin qu'elle puisse prendre la largeur entière)

        View::renderTemplate('header',$data);
        View::renderTemplate('banner',$data);
        View::render('accueil/index', $data);
        View::renderTemplate('footer');
    }

}
