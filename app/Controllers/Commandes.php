<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Commandes extends Controller {

    private $_commandes;

    function __construct() {
        parent::__construct();
        $this->_commandes = new \Models\Commandes();
    }
}
