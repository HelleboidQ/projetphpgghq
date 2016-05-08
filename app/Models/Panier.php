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

    public function findByUserAndModele($id,$modele) {
        return $this->db->select('SELECT * FROM panier WHERE id_users = :id AND id_modele = :id2' , array(':id' => $id, 'id2' => $modele));
    }

    public function create($data) {
        $this->db->insert(PREFIX.'panier', $data);
        return $this->db->lastInsertId('id');
    }

    public function update($data,$where) {
        $this->db->update(PREFIX.'panier',$data, $where);
    }

}
