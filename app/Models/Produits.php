<?php 
namespace models;

class Produits extends \Core\Model {
	
	function __construct(){
		parent::__construct();
	}

	public function findAll()
	{
		return $this->db->select('SELECT p.*, u.nom as nomUnivers, m.prix, m.nom as nomModele
                                          FROM produits p
                                            JOIN univers u ON p.id_univers=u.id
                                            JOIN auteur a ON a.id_auteur=p.id_auteur
                                            JOIN modele m ON m.id_produit=p.id');
	}

	public function findByUnivers($univers_id)
	{
		return $this->db->select('SELECT * FROM produits WHERE univers_id = ' . $univers_id);
	}
	
}