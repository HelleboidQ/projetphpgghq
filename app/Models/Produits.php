<?php

namespace models;

class Produits extends \Core\Model {

    function __construct() {
        parent::__construct();
    }

    public function findAll() {
        return $this->db->select('SELECT * FROM produits');
    }

    public function findByUnivers($univers_id) {
        return $this->db->select('SELECT * FROM produits WHERE visible=1 AND id_univers = ' . $univers_id . ' ORDER BY id DESC');
    }

    public function findByUniversLast($univers_id) {
        return $this->db->select('SELECT * FROM produits WHERE visible=1 AND  id_univers = ' . $univers_id . ' ORDER BY id DESC LIMIT 4');
    }

    public function findAllLast($number) {
        return $this->db->select('SELECT * 
                                FROM produits 
                                ORDER BY id DESC LIMIT ' . $number);
    }

    public function findById($id) {
        return $this->db->select('SELECT * FROM produits WHERE id='.$id);
    }

    public function getProduitById($id) {
        return $this->db->select('SELECT p.*, 
                                    u.nom as nomUnivers, 
                                    m.prix, m.nom as nomModele,
                                    a.nom as nomAuteur
                                  FROM produits p
                                    JOIN univers u ON p.id_univers=u.id
                                    JOIN auteur a ON a.id_auteur=p.id_auteur
                                    JOIN modele m ON m.id_produit=p.id 
                                  WHERE p.id='.$id);
    }

    public function update($data,$where) {
        $this->db->update(PREFIX.'produits',$data, $where);
    }

    public function create($data) {
        $this->db->insert(PREFIX.'produits', $data);
        return $this->db->lastInsertId('id');
    }

    public function findProduitImage($id)
    {
        return $this->db->select('SELECT * FROM produits_image WHERE id_produit=' . $id);
    }

}
