<?php 
namespace models;

class Produits extends \Core\Model {
	
	function __construct(){
		parent::__construct();
	}

	public function findAll()
	{
		return $this->db->select('SELECT p.* 
                                          FROM produits p
                                            JOIN univers u ON p.id_univers=u.id
                                            JOIN auteur a ON a.id_auteur=p.id_auteur');
	}

	public function findByUnivers($univers_id)
	{
		return $this->db->select('SELECT * FROM produits WHERE univers_id = ' . $univers_id);
	}
	
}