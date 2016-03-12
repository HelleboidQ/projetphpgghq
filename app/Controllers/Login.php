<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Login
 *
 * @author quentin
 */

namespace Controllers;

use Core\Controller;
use Core\View;

/**
 * Sample controller showing a construct and 2 methods and their typical usage.
 */
class Login extends Controller {

    //put your code here

    function __construct() {
        parent::__construct();
    }

    /**
     * Handles what happens when user moves to URL/index/index, which is the same like URL/index or in this
     * case even URL (without any controller/action) as this is the default controller-action when user gives no input.
     */
    public function index() { 
        View::renderTemplate('header');
        View::render('login/index');
        View::renderTemplate('footer');
    }

    public function register() {
        View::renderTemplate('header');
        View::render('login/register');
        View::renderTemplate('footer');
    }

}
