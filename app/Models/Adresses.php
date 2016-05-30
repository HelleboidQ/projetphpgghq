<?php

namespace models;

class Adresses extends \Core\Model {

    function __construct() {
        parent::__construct();
    } 

    public function findByUser($user_id) {
        return $this->db->select('SELECT * FROM users_adresse WHERE id_users = ' . $user_id .' ORDER BY id DESC');
    }

    public function findById($id) {
        return $this->db->select('SELECT * FROM users_adresse WHERE id = ' . $id);
    }

    public function findByUserDefault($user_id)
    {
        return $this->db->select('SELECT * FROM users_adresse WHERE id_users = ' . $user_id .' ORDER BY id DESC');
    }

    public function update($data,$where) {
        $this->db->update(PREFIX.'users_adresse',$data, $where);
    }

    public function create($data) {
        $this->db->insert(PREFIX.'users_adresse', $data);
        return $this->db->lastInsertId('id');
    }

}
