<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Univers extends Controller {

    function __construct() {
        parent::__construct();
        $this->_univers = new \models\Univers();
    }

    public function index() { 
        //$listeUnivers = "lel";

        $listeUnivers = $this->_univers->findAll();
        $data['list'] = $listeUnivers;
        
        View::renderTemplate('header');
        View::render('univers/index',$data);
        View::renderTemplate('footer');
    }

}
