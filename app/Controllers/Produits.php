<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Produits extends Controller {
   private $_produits;

    function __construct() {
        parent::__construct();
        $this->_produits = new \Models\Produits();
    }

    public function index() { 
        //$listeProduits = $this->_produits->findByUnivers(2);
        $listeProduits = $this->_produits->findAll();
        $data['list'] = $listeProduits;
        
        View::renderTemplate('header');
        View::render('produits/index',$data);
        View::renderTemplate('footer');
    }

}
