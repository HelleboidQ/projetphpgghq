<?php

namespace Controllers;

use Core\Controller;
use Core\View;

class Admin extends Controller {
   private $_produits;

    function __construct() {
        parent::__construct();
        //$this->_produits = new \Models\Admin();
    }

    public function news() { 
        //$listeProduits = $this->_produits->findByUnivers(2);
        //$listeProduits = $this->_produits->findAll();
        //$data['list'] = $listeProduits;
        
        View::renderTemplate('header');
        //View::render('produits/index',$data);
        View::render('admin/news');
        View::renderTemplate('footer');
    }
     public function produit() { 
         //$listeProduits = $this->_produits->findByUnivers(2);
        //$listeProduits = $this->_produits->findAll();
        //$data['list'] = $listeProduits;
        
        View::renderTemplate('header');
        //View::render('produits/index',$data);
        View::render('admin/produit');
        View::renderTemplate('footer');
    }
     public function users() { 
         //$listeProduits = $this->_produits->findByUnivers(2);
        //$listeProduits = $this->_produits->findAll();
        //$data['list'] = $listeProduits;
        
        View::renderTemplate('header');
        //View::render('produits/index',$data);
        View::render('admin/users');
        View::renderTemplate('footer');
    }
   
}