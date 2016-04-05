<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of News
 *
 * @author quentin
 */

namespace Controllers;

use Core\Controller;
use Core\View;

class News extends Controller { 

    function __construct() {
        parent::__construct(); 
    }

       public function index($id) {  
        $data['list'] = $id;
        
        View::renderTemplate('header');
        View::render('news/index',$data);
        View::renderTemplate('footer');
    }

}
