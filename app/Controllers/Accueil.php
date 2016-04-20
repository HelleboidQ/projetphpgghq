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

    function __construct() {
        parent::__construct();
        $this->_produits = new \Models\Produits();
        $this->_news = new \Models\News();
        $this->_univers = new \Models\Univers();
    }

    public function index($id) {
        $recupId = explode("-", $id);
        $id = $recupId[0];

        $listeNews = $this->_news->findByUniversLast($id);
        $data['news'] = $listeNews;

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
