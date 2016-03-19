<?php namespace models;
class Produits extends \Core\Model {
	
	function __construct(){
		parent::__construct();
	}

	public function findAll()
	{
		return $this->db->select('SELECT p.id, p.nom AS nom_prod, prix, u.id, u.nom AS nom_univ FROM produits AS p INNER JOIN univers AS u ON `p`.`univers_id` = `u`.`id`');
	}

	public function findByUnivers($univers_id)
	{
		return $this->db->select('SELECT * FROM produits WHERE univers_id = ' . $univers_id);
	}
	
}