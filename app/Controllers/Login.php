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
    private $users;

    function __construct() {
        parent::__construct();
        $this->users = new \Models\Users();
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

    public function compte() {
        View::renderTemplate('header');
        View::render('login/compte');
        View::renderTemplate('footer');
    }

    function newUsers() {

        $pseudo = htmlentities($_POST['pseudo']);
        $mail = htmlentities($_POST['mail']);
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["feedback_negative"][] = "Mail non valide";
            return false;
        }
        $pass = $_POST['pass'];

        $postdata = array(
            'pseudo' => $pseudo,
            'mail' => $mail,
            'pass' => $pass
        );

        if ($this->users->insertUsers($postdata)) {
            View::renderTemplate('header');
            View::render('login/login');
            View::renderTemplate('footer');
        } else {
            View::renderTemplate('header');
            View::render('login/register');
            View::renderTemplate('footer');
        }
    }

    function identification() {
        $pseudo = htmlentities($_POST['pseudo']);
        $pass = $_POST['pass'];

        $postdata = array(
            'pseudo' => $pseudo,
            'pass' => $pass
        );

        if ($this->users->login($postdata)) {
            View::renderTemplate('header');
            View::render('login/compte');
            View::renderTemplate('footer');
        } else {
            View::renderTemplate('header');
            View::render('login/index');
            View::renderTemplate('footer');
        }
    }

    public function logout() {
        \Helpers\Session::destroy();
        View::renderTemplate('header');
        View::render('login/index');
        View::renderTemplate('footer');
    }

    public function modifier($id) {
        
    }

}
