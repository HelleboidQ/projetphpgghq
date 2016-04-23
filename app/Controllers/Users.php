<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Users extends Controller {

    private $_users;
    private $_panier;

    function __construct() {
        parent::__construct();
        $this->_users = new \Models\Users();
        $this->_panier = new \Models\Panier();
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
        
        $panier = $this->_panier->findByUser($id_user);
        $data["panier"] = $panier;

        View::renderTemplate('header');
        View::render('login/panier', $data);
        View::renderTemplate('footer');
    }

}
