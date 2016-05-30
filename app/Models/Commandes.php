<?php

namespace models;

class Commandes extends \Core\Model {

    function __construct() {
        parent::__construct();
    }

    public function findByUser($id) {
        return $this->db->select('SELECT c.id as idcommande, c.id_users, c.time, pr.nom as pronom, mo.nom as monom, cd.prix, cd.quantite FROM commande AS c 
            INNER JOIN commande_detail AS cd ON `cd`.`id_commande` = `c`.`id`
            INNER JOIN modele AS mo ON `cd`.`id_produit` = `mo`.`id`
            INNER JOIN produits AS pr ON `mo`.`id_produit` = `pr`.`id`
            WHERE c.id_users = :id', array(':id' => $id));
    }

    public function findById($id)
    {
    	return $this->db->select('SELECT * FROM commande WHERE id = :id', array(':id' => $id));
    }

    public function findProduitsById($id)
    {
    	return $this->db->select('SELECT * FROM commande_detail WHERE id_commande = :id', array(':id' => $id));
    }


    public function create($data)
    {
    	$this->db->insert(PREFIX.'commande', $data);
        return $this->db->lastInsertId('id');
    }

    public function ajouterProduit($data)
    {
    	$this->db->insert(PREFIX.'commande_detail', $data);
        return $this->db->lastInsertId('id');
    }

}
