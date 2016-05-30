<?php
namespace Controllers;

use Core\Controller;
use Core\View;

class Panier extends Controller {

    private $_panier;
    private $_produits;
    private $_users;
    private $_modele;

    function __construct() {
        parent::__construct();
        $this->_produits = new \Models\Produits();
        $this->_users = new \Models\Users();
        $this->_panier = new \Models\Panier();
        $this->_modele = new \Models\Modele();
    }

    public function add() {
        $qte = $_POST['qte'];

        $panier = $this->_panier->findByUserAndModele($_SESSION['id'],$_POST['mod']);

        $modele = $this->_modele->findById($_POST['mod']);
        $stock = $modele[0]->stock;

        if(empty($panier))
        {
            if($_POST['qte'] <= $stock || $stock === null)
            {
                $postdata = array(
                    'id_users'      =>  $_SESSION['id'],
                    'id_produit'    =>  $_POST['prod'],
                    'id_modele'     =>  $_POST['mod'],                                 
                    'quantite'      =>  $_POST['qte']
                );
                $this->_panier->create($postdata);

                if($stock !== null)
                {
                    $postdata2 = array(
                            'stock'         =>  ($stock-$_POST['qte'])
                    );
                    $where2 = array('id' => $_POST['mod']);
                    $this->_modele->update($postdata2,$where2);
                    echo json_encode('Panier vide, quantite ok');
                }

            }
            else
            {
                echo json_encode('Panier vide, quantite non valide');
            }            
        }
        else
        {
            if($_POST['qte'] <= $stock || $stock === null)
            {
                $qteInit = $panier[0]->quantite;
                $id = $panier[0]->id;

                $postdata = array(
                    'quantite'        =>  $_POST['qte'] + $qteInit                   
                );

                $where = array('id' => $id);
                $this->_panier->update($postdata, $where);

                if($stock !== null)
                {
                    $postdata2 = array(
                            'stock'         =>  ($stock-$_POST['qte'])
                    );
                    $where2 = array('id' => $_POST['mod']);
                    $this->_modele->update($postdata2,$where2);
                    echo json_encode('Mise à jour stock');
                }
            }
        }        
    }
}
