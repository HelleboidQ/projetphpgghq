<?php

namespace models;

class Commentaires extends \Core\Model {

    function __construct() {
        parent::__construct();
    }

    public function findByNews($id) {
        return $this->db->select('SELECT * FROM commentaire WHERE news = 2 AND id_produit = :id ORDER BY id DESC',array(':id' => $id)); 
    }
}
