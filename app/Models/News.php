<?php

namespace models;

class News extends \Core\Model {

    function __construct() {
        parent::__construct();
    } 

    public function findByUnivers($univers_id) {
        return $this->db->select('SELECT * FROM news WHERE id_univers = ' . $univers_id);
    }

    public function findByUniversLast($univers_id) {
        return $this->db->select('SELECT * FROM news WHERE id_univers = ' . $univers_id.' LIMIT 5');
    }

}
