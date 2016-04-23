<?php namespace models;
class Medias extends \Core\Model {
	
	function __construct(){
		parent::__construct();
	}

	public function findAll()
	{
		return $this->db->select('SELECT * FROM medias');
	}

	public function findLast($number)
	{
		return $this->db->select('SELECT * FROM medias ORDER BY id DESC LIMIT ' . $number);
	}

	public function findById($id)
	{
		return $this->db->select('SELECT * FROM medias WHERE id = :id',array(':id' => $id));
	}

	public function findByNom($nom)
	{
		return $this->db->select('SELECT * FROM medias WHERE nom LIKE :nom',array(':nom' => $nom . '%'));
	}
	
}