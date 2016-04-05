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

    function __construct() {
        parent::__construct();
        $this->_produits = new \Models\Produits();
        $this->_news = new \Models\News();
    }

    public function index($id) {
        $listeNews = $this->_news->findByUniversLast($id);
        $data['news'] = $listeNews;
        
        $listeProduits = $this->_produits->findByUnivers($id);
        $data['produits'] = $listeProduits;


        View::renderTemplate('header');
        View::render('accueil/index', $data);
        View::renderTemplate('footer');
    }

}
