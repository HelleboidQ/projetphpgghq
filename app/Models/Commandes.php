<?php

namespace models;

class Commandes extends \Core\Model {

    function __construct() {
        parent::__construct();
    }

    public function findByUser($id) {
        return $this->db->select('SELECT * FROM commande AS c 
            INNER JOIN commande_detail AS cd ON `cd`.`id_commande` = `c`.`id`
            INNER JOIN produits AS pr ON `cd`.`id_produit` = `pr`.`id`
            WHERE c.id_users = :id', array(':id' => $id));
    }

}
