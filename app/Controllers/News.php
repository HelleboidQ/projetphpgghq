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

    private $_users;
    private $_news;
    private $_commentaires;

    function __construct() {
        parent::__construct();
        $this->_news = new \Models\News();
        $this->_commentaires = new \Models\Commentaires();
        $this->_users = new \Models\Users();
    }

    public function index($id) {
        $recupId = explode("-", $id);
        $id = $recupId[0];

        $listeNews = $this->_news->findByUnivers($id);
        $data['list'] = $listeNews;

        View::renderTemplate('header');
        View::render('news/index', $data);
        View::renderTemplate('footer');
    }

    public function detail($id) {
        $recupId = explode("-", $id);
        $id = $recupId[0];

        $news = $this->_news->getNewsById($id);
        $news = $news[0];
        $date = new \DateTime($news->date);
        $news->date = $date->format('d/m/Y \à H\hi');
        $data['news'] = $news;


        $commentaires = $this->_commentaires->findByNews($id);
        foreach($commentaires as $c)
        {
            $auteur = $this->_users->getUsersById($c->id_user);
            $auteur = $auteur[0];
            $date = new \DateTime($c->date);
            $c->date = $date->format('d/m/Y H\hi');
            $data['commentaires'][] = array('commentaire' => $c, 'auteur' => $auteur);
        }
        



        View::renderTemplate('header');
        View::render('news/detail', $data);
        View::renderTemplate('footer');
    }

}
