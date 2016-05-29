<?php

namespace models;

class Modele extends \Core\Model {

    function __construct() {
        parent::__construct();
    }

    public function findById($id) {
        return $this->db->select('SELECT *
            FROM modele
            WHERE id = :id', array(':id' => $id));
    }

    public function findByProduit($id) {
        return $this->db->select('SELECT mo.nom, mo.prix, mo.id, mo.stock
            FROM modele AS mo 
            JOIN produits AS pr ON `pr`.`id` = `mo`.`id_produit`
            WHERE mo.id_produit = :id', array(':id' => $id));
    }

    public function update($data,$where) {
        $this->db->update(PREFIX.'modele',$data, $where);
    }

    public function create($data) {
        $this->db->insert(PREFIX.'modele', $data);
        return $this->db->lastInsertId('id');
    }
}
