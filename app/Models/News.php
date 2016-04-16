<?php

namespace models;

class News extends \Core\Model {

    function __construct() {
        parent::__construct();
    }

    public function findByUnivers($univers_id) {
        return $this->db->select('SELECT *
                                FROM news
                                WHERE id_univers = ' . $univers_id . ' ORDER BY id DESC');
    
    }
    public function findByUniversLast($univers_id) {
        return $this->db->select('SELECT n.*,ni.url 
                                FROM news n
                                    JOIN news_image ni ON n.id=ni.id_news
                                WHERE id_univers = ' . $univers_id . ' ORDER BY id DESC LIMIT 4');
    }

    public function getNewsById($id) {
        return $this->db->select('SELECT n.*,ni.url, u.pseudo 
                                FROM news n
                                    JOIN news_image ni ON n.id=ni.id_news
                                    JOIN users u ON u.id = n.auteur
                                WHERE n.id=' . $id);
    }

    public function findById($id)
    {
        return $this->db->select('SELECT * FROM news WHERE id=' . $id);
    }

    public function update($data,$where) {
        $this->db->update(PREFIX.'news',$data, $where);
    }

    public function create($data) {
        $this->db->insert(PREFIX.'news', $data);
        return $this->db->lastInsertId('id');
    }

    public function findNewsImage($id)
    {
        return $this->db->select('SELECT * FROM news_image WHERE id_news=' . $id);
    }

}
