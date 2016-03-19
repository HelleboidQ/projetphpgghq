<?php

namespace models;

class Users extends \Core\Model {

    public function __construct() {
        parent::__construct();
    }

    public function getUsers() {
        return $this->db->select('SELECT * FROM users');
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
            \Helpers\Session::set('admin', $res_recup['0']->admin);
            return true;
        }
        return false;
    }


}
