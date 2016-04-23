<?php

namespace models;

class Panier extends \Core\Model {

    function __construct() {
        parent::__construct();
    }

    public function findByUser($id) {
        return $this->db->select('SELECT * 
                                FROM panier pa 
                                    JOIN produits AS pr ON `pr`.`id` = `pa`.`id_produit`
                                WHERE pa.id_users = :id', array(':id' => $id));
    }

}
