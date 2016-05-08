<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Users extends Controller {

    private $_users;
    private $_panier;
    private $_univers;
    private $_modele;

    function __construct() {
        parent::__construct();
        $this->_users = new \Models\Users();
        $this->_panier = new \Models\Panier();
        $this->_univers = new \Models\Univers();
        $this->_modele = new \Models\Modele();
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
            $detail_univers = $this->_univers->findById($p->id_univers);
            $detail_modeles = $this->_modele->findById($p->id_modele);
            $detail_produit = array('id' => $p->id, 'nom' => $p->nom, 'univers' => $detail_univers[0], 'modele' => $detail_modeles[0]);
            $panier[$p->id_modele]['produit'] = $detail_produit;
        }

        $data["panier"] = $panier;

        View::renderTemplate('header');
        View::render('login/panier', $data);
        View::renderTemplate('footer');
    }

}
