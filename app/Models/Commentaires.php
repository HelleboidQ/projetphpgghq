<?php

namespace models;

class Commentaires extends \Core\Model {

    function __construct() {
        parent::__construct();
    }

    public function findByNews($id) {
        return $this->db->select('SELECT * FROM commentaire WHERE news = 2 AND id_produit = :id ORDER BY id DESC', array(':id' => $id));
    }

    public function findByProduit($id) {
        return $this->db->select('SELECT * 
                                  FROM commentaire com
                                    JOIN avis a ON a.id_produit=com.id_produit
                                  WHERE com.news = 1 
                                    AND com.id_produit = :id 
                                  GROUP BY com.id_user', array(':id' => $id));
    }

}
