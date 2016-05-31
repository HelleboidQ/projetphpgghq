<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Users extends Controller {

    private $_users;
    private $_panier;
    private $_univers;
    private $_modele;
    private $_produit;
    private $_commandes;
    private $_adresses;

    function __construct() {
        parent::__construct();
        $this->_users = new \Models\Users();
        $this->_panier = new \Models\Panier();
        $this->_univers = new \Models\Univers();
        $this->_modele = new \Models\Modele();
        $this->_produit = new \Models\Produits();
        $this->_commandes = new \Models\Commandes();
        $this->_adresses = new \Models\Adresses();
    }

    public function update() {
        $id = $_POST['user_id'];

        $postdata = array(
            'pseudo' => $_POST['pseudo'],
            'mail' => $_POST['email'],
            'prenom' => $_POST['first_name'],
            'nom' => $_POST['last_name'],
            'admin' => ($_POST['admin'] == 'on') ? 1 : 0
        );

        $where = array('id' => $id);
        $this->_users->update($postdata, $where);

        \Helpers\Url::previous();
    }

    public function panier() {
        $id_user = \Helpers\Session::get('id');
        
        $panier_raw = $this->_panier->findByUser($id_user);
        $panier = array();

        foreach($panier_raw as $p)
        {
            $panier[$p->id_modele] = array('produit' => array(), 'stock' => $p->quantite);
            
            $detail_modeles = $this->_modele->findById($p->id_modele);
            $produit = $this->_produit->findById($p->id_produit);
            $detail_univers = $this->_univers->findById($produit[0]->id_univers);
            $detail_produit = array('id' => $produit[0]->id, 'nom' => $produit[0]->nom, 'univers' => $detail_univers[0], 'modele' => $detail_modeles[0]);
            $panier[$p->id_modele]['produit'] = $detail_produit;
        }

        $data["panier"] = $panier;

        View::renderTemplate('header');
        View::render('login/panier', $data);
        View::renderTemplate('footer');
    }

    public function commande()
    {
        $panier = array();
        $panier_user = $this->_panier->findByUser($_SESSION['id']);

        $adresses = $this->_adresses->findByUserDefault($_SESSION['id']);

        foreach($panier_user as $article)
        {
            $produit_detail = $this->_produit->findById($article->id_produit);
            $modele_detail = $this->_modele->findById($article->id_modele);

            $panier[] = array('id_panier' => $article->id, 'article' => $produit_detail[0], 'modele' => $modele_detail[0], 'quantite' => $article->quantite);
        }


        
        $dataCommande = array('id_users' => $_SESSION['id'], 'id_adresse' => $adresses[0]->id);
        $commandeID = $this->_commandes->create($dataCommande);

        // Supprimer des articles du panier
        foreach($panier as $p)
        {
            var_dump($p);

            $data = array('id' => $p['id_panier']);
            $this->_panier->delete($data);

            //$quantite = $p['modele']->quantite;
            //echo $p['quantite'];
            //echo '<hr>';

            $data2 = array('id_produit' => $p['modele']->id, 'id_commande' => $commandeID, 'prix' => $p['modele']->prix, 'quantite' => $p['quantite']); // id produit mais il s'agit bien du modèle (lié au produit de toute façon)
            $this->_commandes->ajouterProduit($data2);
        }


    }

}
