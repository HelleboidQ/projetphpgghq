<?php

namespace models;

class Users extends \Core\Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUsers() {
        return $this->db->select('SELECT * FROM users');
    }

    public function getUsersByName($name) {
        return $this->db->select('SELECT * FROM users WHERE pseudo LIKE :pseudo', array(':pseudo' => $name."%"));
    }

    public function getUsersById($id) {
        return $this->db->select('SELECT * FROM users WHERE id = :id', array(':id'  => $id));
    }

    public function insertUsers($postdata) {
        $pseudoExist = $this->db->select("SELECT * FROM users WHERE pseudo = :pseudo", array(':pseudo' => $postdata['pseudo']));

        if (empty($pseudoExist)) {
            $postdata['pass'] = password_hash($postdata['pass'], PASSWORD_BCRYPT);

            $this->db->insert('users', $postdata);
            return true;
        } else {
            return false;
        }
    }

    public function login($postdata) {
        $users = $this->db->select("SELECT * FROM users WHERE pseudo = :pseudo", array(':pseudo' => $postdata['pseudo']));

        if (password_verify($postdata['pass'], $users['0']->pass)) {
            \Helpers\Session::set('user_logged_in', true);
            \Helpers\Session::set('id', $users['0']->id);
            \Helpers\Session::set('pseudo', $users['0']->pseudo);
            \Helpers\Session::set('mail', $users['0']->mail);
            \Helpers\Session::set('admin', $users['0']->admin);
            return true;
        }
        return false;
    }

}
