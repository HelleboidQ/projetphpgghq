<?php namespace models;
class Univers extends \Core\Model {
	
	function __construct(){
		parent::__construct();
	}

	public function findAll()
	{
		return $this->db->select('SELECT * FROM univers');
	}
	
}