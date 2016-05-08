<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Produits extends Controller {

    private $_produits;
    private $_commentaire;
    private $_modele;

    function __construct() {
        parent::__construct();
        $this->_produits = new \Models\Produits();
        $this->_commentaire = new \Models\Commentaires();
        $this->_modele = new \Models\Modele();
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

        $modeles = $this->_modele->findByProduit($id);
        $data['modeles'] = $modeles;

        var_dump($data['modeles']);

        $comDetail = $this->_commentaire->findByProduit($id);
        $data['com'] = $comDetail;

        View::renderTemplate('header');
        View::render('produits/detail', $data);
        View::renderTemplate('footer');
    }

}
