<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Produits extends Controller {

    private $_produits;
    private $_commentaire;
    private $_modele;
    private $_univers;

    function __construct() {
        parent::__construct();
        $this->_produits = new \Models\Produits();
        $this->_commentaire = new \Models\Commentaires();
        $this->_modele = new \Models\Modele();
        $this->_univers = new \Models\Univers();
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

        $produitDetail = $this->_produits->findById($id);
        $data['list'] = $produitDetail;

        $image = $this->_produits->findProduitImage($id);
        $data['image'] = $image;

        $modeles = $this->_modele->findByProduit($id);
        $data['modeles'] = $modeles;

        $comDetail = $this->_commentaire->findByProduit($id);
        $data['com'] = $comDetail;

        View::renderTemplate('header');
        View::render('produits/detail', $data);
        View::renderTemplate('footer');
    }

    public function create()
    {

        // Gestion du produit en lui-même
        $postdata = array(
            'nom'           =>  $_POST['nom'],
            'annee'         =>  substr($_POST['annee'],0,4),
            'id_univers'    =>  $_POST['univers'],
            'titre'         =>  $_POST['titre'],                                 
            'id_auteur'     =>  $_SESSION['id'],
            'type'          =>  $_POST['type'],
            'lien_ws'       =>  $_POST['ws']           
        );
        $idproduit = $this->_produits->create($postdata);

        foreach($_POST['modeles'] as $modele)
        {
            // Gestion des modèles du produit
            $postdataModeles = array(
                'nom'   =>  $modele['nom'],
                'prix'  =>  $modele['prix'],
                'stock' =>  $modele['stock'],
                'id_produit'    =>  $idproduit
            );
            $this->_modele->create($postdataModeles);
        }
        

        \Helpers\Url::previous();
    }

    public function edit($id) 
    {
        $produit = $this->_produits->findById($id);
        $data['produit'] = $produit[0];

        $listeUnivers = $this->_univers->findAll();
        $data['univers'] = $listeUnivers;


        View::render('produits/edit', $data);
    }

    public function update($id)
    {
        $postdata = array(
            'nom'        =>  $_POST['nom'],                                
            'titre'         =>  $_POST['titre'],
            'type'          =>  $_POST['type'],
            'lien_ws'       =>  $_POST['ws'],
            'annee'         =>  $_POST['annee']                    
        );

        $where = array('id' => $id);
        $this->_produits->update($postdata, $where);


        // Gérer l'éventuel ajout de nouveaux modèles
        foreach($_POST['modeles'] as $modele)
        {
            if($modele['nom'] != '' && $modele['prix'] != '' && $modele['stock'] != '')
            {
                // Gestion des modèles du produit
                $postdataModeles = array(
                    'nom'   =>  $modele['nom'],
                    'prix'  =>  $modele['prix'],
                    'stock' =>  $modele['stock'],
                    'id_produit'    =>  $id
                );
                $this->_modele->create($postdataModeles);
            }        
        }

        \Helpers\Url::previous();
    }

}
