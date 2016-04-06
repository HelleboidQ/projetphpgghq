<?php

namespace models;

class Adresses extends \Core\Model {

    function __construct() {
        parent::__construct();
    } 

    public function findByUser($user_id) {
        return $this->db->select('SELECT * FROM users_adresse WHERE id_users = ' . $user_id .' ORDER BY id DESC');
    }
}
