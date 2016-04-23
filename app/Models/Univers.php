<?php namespace models;
class Univers extends \Core\Model {
	
	function __construct(){
		parent::__construct();
	}

	public function findAll()
	{
		return $this->db->select('SELECT * FROM univers');
	}

	public function findById($id)
	{
		return $this->db->select('SELECT * FROM univers WHERE id = :id',array(':id' => $id));
	}
	
}