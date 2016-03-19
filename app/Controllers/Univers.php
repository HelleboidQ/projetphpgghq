<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Univers extends Controller {
    
    private $_univers;

    function __construct() {
        parent::__construct();
        $this->_univers = new \Models\Univers();
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
