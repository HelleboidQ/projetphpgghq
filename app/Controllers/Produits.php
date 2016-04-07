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

    public function index($id) {
        $recupId = explode("-", $id);
        $id = $recupId[0];

        $listeProduits = $this->_produits->findByUnivers($id);
        $data['list'] = $listeProduits;

        View::renderTemplate('header');
        View::render('produits/index', $data);
        View::renderTemplate('footer');
    }

    public function detail($id) {
        $recupId = explode("-", $id);
        $id = $recupId[0];

        $produitDetail = $this->_produits->getProduitById($id);
        $data['list'] = $produitDetail;

        View::renderTemplate('header');
        View::render('produits/detail', $data);
        View::renderTemplate('footer');
    }

}
