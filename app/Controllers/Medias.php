<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Medias extends Controller {
    private $_medias;

    function __construct() {
        parent::__construct();
        $this->_medias = new \Models\Medias();
    }

    public function search() {
        $nom = $_POST['nom'];
        $data = $this->_medias->findByNom($nom);
        View::render('medias/liste', $data);
    }

    public function add() {
        $data = array();
        View::render('medias/add', $data);
    }

    public function create() {
        var_dump($_FILES);

        $uploaddir = getcwd() . '\app\medias\\';
        $uploadfile = $uploaddir . basename($_FILES['image']['name']);
        echo $uploadfile;
        echo '<pre>';
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
            echo "Le fichier est valide, et a été téléchargé
                   avec succès. Voici plus d'informations :\n";
        } else {
            echo "Attaque potentielle par téléchargement de fichiers.
                  Voici plus d'informations :\n";
        }

        echo 'Voici quelques informations de débogage :';
        print_r($_FILES);

        echo '</pre>';
    }
}
